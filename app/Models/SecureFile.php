<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecureFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_name',
        'stored_name',
        'mime_type',
        'size',
        'hash',
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
