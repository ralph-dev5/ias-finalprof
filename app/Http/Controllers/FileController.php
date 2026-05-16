<?php

namespace App\Http\Controllers;

use App\Models\SecureFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function dashboard()
    {
        $files = Auth::user()->files()->latest()->get();

        return view('dashboard', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:10240'],
        ]);

        $uploadedFile = $request->file('file');
        $fileContents = file_get_contents($uploadedFile->getRealPath());
        $fileHash = hash('sha256', $fileContents);
        $storedName = Str::random(40) . '.bin';

        Storage::disk('local')->put($storedName, Crypt::encryptString($fileContents));

        SecureFile::create([
            'user_id' => Auth::id(),
            'original_name' => $uploadedFile->getClientOriginalName(),
            'stored_name' => $storedName,
            'mime_type' => $uploadedFile->getClientMimeType() ?: 'application/octet-stream',
            'size' => $uploadedFile->getSize() ?: strlen($fileContents),
            'hash' => $fileHash,
        ]);

        return back()->with('success', 'File uploaded securely with encryption and integrity hashing.');
    }

    public function download(SecureFile $secureFile)
    {
        abort_unless($secureFile->user_id === Auth::id(), 403);

        $encryptedContents = Storage::disk('local')->get($secureFile->stored_name);
        $decryptedContents = Crypt::decryptString($encryptedContents);

        if (hash('sha256', $decryptedContents) !== $secureFile->hash) {
            abort(500, 'File integrity check failed.');
        }

        return response($decryptedContents, 200, [
            'Content-Type' => $secureFile->mime_type,
            'Content-Disposition' => 'attachment; filename="' . basename($secureFile->original_name) . '"',
            'Content-Length' => strlen($decryptedContents),
        ]);
    }
}
