@extends('layouts.app')

@section('content')
<div class="vault-page">
    <div class="vault-grid" aria-hidden="true"></div>

    <div class="vault-shell">

        {{-- Top bar --}}
        <header class="dash-header">
            <div class="dash-header-left">
                <div class="dash-badge">
                    <span class="dash-badge-dot"></span>
                    <span>VAULT</span>
                </div>
                <h1 class="dash-title">Your secure files</h1>
                <p class="dash-subtitle">AES-256 encrypted · SHA-256 verified on download</p>
            </div>
            <div class="dash-user">
                <svg class="user-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                <span>{{ auth()->user()->name }}</span>
            </div>
        </header>

        {{-- Upload section --}}
        <section class="vault-section" style="animation-delay:0.05s">
            <div class="section-label">
                <svg class="section-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                Upload new file
            </div>

            <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data" class="upload-form">
                @csrf
                <label for="file" class="dropzone" id="dropzone-label">
                    <div class="dropzone-inner">
                        <svg class="dropzone-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="8" y="12" width="32" height="28" rx="3"/>
                            <path d="M24 28V20M24 20L20 24M24 20L28 24"/>
                            <path d="M16 12V10a2 2 0 012-2h12a2 2 0 012 2v2"/>
                        </svg>
                        <p class="dropzone-text">Tap to browse or drag a file here</p>
                        <p class="dropzone-hint" id="file-name-hint">Encrypted with AES-256 · Hashed with SHA-256</p>
                    </div>
                    <input id="file" type="file" name="file" required class="file-input" />
                </label>
                <button type="submit" class="btn btn-primary btn-upload">
                    <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                    Encrypt &amp; upload
                </button>
            </form>
        </section>

        {{-- Files section --}}
        <section class="vault-section" style="animation-delay:0.12s">
            <div class="section-label">
                <svg class="section-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                Uploaded files
            </div>

            @if ($files->isEmpty())
                <div class="empty-state">
                    <svg class="empty-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.2">
                        <rect x="10" y="8" width="28" height="34" rx="3"/>
                        <path d="M16 20h16M16 27h10"/>
                    </svg>
                    <p class="empty-title">No files yet</p>
                    <p class="empty-body">Upload a file above to get started.</p>
                </div>
            @else

                {{-- Mobile card list (hidden on wide screens) --}}
                <div class="file-cards">
                    @foreach ($files as $file)
                    <div class="file-card">
                        <div class="file-card-top">
                            <div class="fc-name">
                                <svg class="file-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg>
                                <span>{{ $file->original_name }}</span>
                            </div>
                            <a href="{{ route('files.download', $file) }}" class="btn-download">
                                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                Download
                            </a>
                        </div>
                        <div class="file-card-meta">
                            <span class="meta-chip">{{ number_format($file->size / 1024, 2) }} KB</span>
                            <span class="meta-hash" title="{{ $file->hash }}">{{ $file->hash }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Desktop table (hidden on small screens) --}}
                <div class="table-shell">
                    <table class="vault-table">
                        <thead>
                            <tr>
                                <th>Filename</th>
                                <th>Size</th>
                                <th>SHA-256 hash</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td class="td-name">
                                    <svg class="file-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg>
                                    {{ $file->original_name }}
                                </td>
                                <td class="td-size">{{ number_format($file->size / 1024, 2) }} KB</td>
                                <td class="td-hash">
                                    <span class="hash-text" title="{{ $file->hash }}">{{ $file->hash }}</span>
                                </td>
                                <td class="td-action">
                                    <a href="{{ route('files.download', $file) }}" class="btn-download">
                                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                        Download
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

:root {
    --bg: #0a0b0d; --surface: #10121a; --surface-2: #161924;
    --border: rgba(255,255,255,0.07); --border-hi: rgba(255,255,255,0.13);
    --amber: #f59e0b; --amber-dim: rgba(245,158,11,0.1);
    --text: #e8eaf0; --muted: #6b7280;
    --mono: 'JetBrains Mono', monospace; --sans: 'Syne', sans-serif;
}

.vault-page * { box-sizing: border-box; margin: 0; padding: 0; }
.vault-page { font-family: var(--sans); color: var(--text); position: relative; }

.vault-grid {
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image:
        linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
    background-size: 48px 48px;
}

.vault-shell {
    position: relative; z-index: 1;
    max-width: 1100px; margin: 0 auto;
    padding: 1.25rem 1rem 3rem;
    display: flex; flex-direction: column; gap: 1.25rem;
}
@media (min-width: 600px) { .vault-shell { padding: 2.5rem 1.5rem 4rem; gap: 1.5rem; } }

/* ── Header ── */
.dash-header {
    display: flex; align-items: flex-start;
    justify-content: space-between; flex-wrap: wrap; gap: 1rem;
    padding: 1.25rem;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 1rem;
    animation: fadeUp 0.5s ease both;
}
@media (min-width: 600px) { .dash-header { padding: 1.5rem 1.75rem; border-radius: 1.25rem; } }

.dash-header-left { display: flex; flex-direction: column; gap: 0.35rem; }
.dash-badge {
    display: inline-flex; align-items: center; gap: 0.4rem;
    font-family: var(--mono); font-size: 0.6rem; letter-spacing: 0.12em; color: var(--amber);
}
.dash-badge-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: var(--amber); box-shadow: 0 0 6px var(--amber);
    animation: pulse 2s infinite;
}
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
@keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }

.dash-title { font-size: clamp(1.2rem, 5vw, 1.6rem); font-weight: 700; color: #fff; letter-spacing: -0.02em; }
.dash-subtitle { font-size: 0.72rem; color: var(--muted); }
.dash-user {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 0.45rem 0.9rem; border-radius: 99px;
    background: var(--surface-2); border: 1px solid var(--border);
    font-size: 0.78rem; color: var(--text); white-space: nowrap;
}
.user-icon { width: 14px; height: 14px; color: var(--amber); flex-shrink: 0; }

/* ── Section wrapper ── */
.vault-section {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 1rem; padding: 1.25rem;
    animation: fadeUp 0.5s ease both;
}
@media (min-width: 600px) { .vault-section { padding: 1.75rem; border-radius: 1.25rem; } }

.section-label {
    display: flex; align-items: center; gap: 0.5rem;
    font-family: var(--mono); font-size: 0.62rem; letter-spacing: 0.1em;
    color: var(--muted); margin-bottom: 1rem; text-transform: uppercase;
}
.section-icon { width: 13px; height: 13px; color: var(--amber); flex-shrink: 0; }

/* ── Upload form ── */
.upload-form { display: flex; flex-direction: column; gap: 0.85rem; }
.dropzone {
    display: flex; align-items: center; justify-content: center;
    border: 2px dashed var(--border-hi); border-radius: 0.875rem;
    padding: 1.5rem 1rem; cursor: pointer;
    transition: border-color 0.2s, background 0.2s; position: relative;
}
@media (min-width: 480px) { .dropzone { padding: 2rem; } }
.dropzone:hover { border-color: rgba(245,158,11,0.4); background: var(--amber-dim); }
.dropzone-inner { display: flex; flex-direction: column; align-items: center; gap: 0.5rem; pointer-events: none; text-align: center; }
.dropzone-icon { width: 36px; height: 36px; color: var(--muted); }
.dropzone-text { font-size: 0.85rem; color: var(--text); font-weight: 600; }
.dropzone-hint { font-family: var(--mono); font-size: 0.62rem; color: var(--muted); letter-spacing: 0.04em; }
.file-input { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }

.btn { display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.7rem 1.25rem; border-radius: 0.5rem; font-family: var(--sans); font-size: 0.875rem; font-weight: 600; text-decoration: none; transition: all 0.15s; border: 1px solid transparent; cursor: pointer; white-space: nowrap; }
.btn-primary { background: var(--amber); color: #0a0a0a; border-color: var(--amber); }
.btn-primary:hover { background: #fbbf24; box-shadow: 0 0 20px rgba(245,158,11,0.35); }
.btn-upload { align-self: flex-start; }
.btn-icon { width: 15px; height: 15px; flex-shrink: 0; }

/* ── Mobile file cards (show below 700px) ── */
.file-cards { display: flex; flex-direction: column; gap: 0.6rem; }
.file-card {
    background: var(--surface-2); border: 1px solid var(--border);
    border-radius: 0.75rem; padding: 0.85rem 1rem;
    transition: border-color 0.15s;
}
.file-card:hover { border-color: var(--border-hi); }
.file-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 0.75rem; }
.fc-name { display: flex; align-items: flex-start; gap: 0.5rem; flex: 1; min-width: 0; font-size: 0.83rem; font-weight: 600; color: var(--text); word-break: break-word; }
.file-card-meta { display: flex; align-items: center; gap: 0.5rem; margin-top: 0.6rem; flex-wrap: wrap; }
.meta-chip { font-family: var(--mono); font-size: 0.65rem; color: var(--muted); background: rgba(255,255,255,0.04); border: 1px solid var(--border); border-radius: 99px; padding: 0.15rem 0.5rem; white-space: nowrap; }
.meta-hash { font-family: var(--mono); font-size: 0.62rem; color: #6b7280; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex: 1; min-width: 0; }

/* ── Desktop table (show at 700px+) ── */
.table-shell { border-radius: 0.875rem; border: 1px solid var(--border); overflow: hidden; overflow-x: auto; display: none; }
@media (min-width: 700px) {
    .file-cards  { display: none; }
    .table-shell { display: block; }
}

.vault-table { width: 100%; border-collapse: collapse; font-size: 0.82rem; }
.vault-table thead { background: var(--surface-2); }
.vault-table th {
    padding: 0.75rem 1rem; text-align: left;
    font-family: var(--mono); font-size: 0.62rem; letter-spacing: 0.08em;
    color: var(--muted); font-weight: 500; text-transform: uppercase;
    border-bottom: 1px solid var(--border);
}
.vault-table tbody tr { border-bottom: 1px solid var(--border); transition: background 0.12s; }
.vault-table tbody tr:last-child { border-bottom: none; }
.vault-table tbody tr:hover { background: var(--surface-2); }
.vault-table td { padding: 0.9rem 1rem; color: var(--text); vertical-align: middle; }
.td-name { display: flex; align-items: center; gap: 0.5rem; font-weight: 600; }
.file-icon { width: 14px; height: 14px; color: var(--amber); flex-shrink: 0; }
.td-size { color: var(--muted); font-family: var(--mono); font-size: 0.75rem; white-space: nowrap; }
.td-hash { max-width: 220px; }
.hash-text { display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-family: var(--mono); font-size: 0.68rem; color: #9ca3af; letter-spacing: 0.02em; }

.btn-download {
    display: inline-flex; align-items: center; gap: 0.35rem;
    padding: 0.4rem 0.8rem; border-radius: 0.4rem;
    background: var(--surface-2); border: 1px solid var(--border);
    font-size: 0.73rem; font-family: var(--sans); font-weight: 600;
    color: var(--text); text-decoration: none;
    transition: all 0.15s; white-space: nowrap;
}
.btn-download:hover { border-color: var(--amber); color: var(--amber); }
.btn-download svg { width: 13px; height: 13px; flex-shrink: 0; }

/* ── Empty state ── */
.empty-state { display: flex; flex-direction: column; align-items: center; padding: 2.5rem 1rem; gap: 0.6rem; text-align: center; }
.empty-icon { width: 44px; height: 44px; color: var(--border-hi); }
.empty-title { font-size: 0.95rem; font-weight: 600; color: var(--text); }
.empty-body  { font-size: 0.8rem; color: var(--muted); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('file');
    const hint  = document.getElementById('file-name-hint');
    if (input && hint) {
        input.addEventListener('change', () => {
            if (input.files.length) {
                hint.textContent = input.files[0].name;
                hint.style.color = '#f59e0b';
            } else {
                hint.textContent = 'Encrypted with AES-256 · Hashed with SHA-256';
                hint.style.color = '';
            }
        });
    }
});
</script>
@endsection