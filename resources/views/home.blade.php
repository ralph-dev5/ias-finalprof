@extends('layouts.app')

@section('content')
<div class="vault-page">
    <div class="vault-grid" aria-hidden="true"></div>
    <div class="vault-glow" aria-hidden="true"></div>

    <div class="vault-shell">
        <div class="home-card">

            <div class="home-eyebrow">
                <span class="eyebrow-line"></span>
                <span class="eyebrow-text">Secure File Sharing System</span>
                <span class="eyebrow-line"></span>
            </div>

            <h1 class="home-title">
                Your files, encrypted.<br>
                <span class="home-title-accent">Always.</span>
            </h1>

            <p class="home-body">
                Upload securely, protect with encryption, and download only when authenticated.
                A zero-trust vault for the files that matter.
            </p>

            <div class="home-actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z"/></svg>
                        Open vault
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Log in
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-ghost">Create account</a>
                @endauth
            </div>

            <div class="home-divider">
                <div class="divider-line"></div>
                <span class="divider-label">System features</span>
                <div class="divider-line"></div>
            </div>

            <ul class="feature-list">
                <li class="feature-item">
                    <div class="feature-num">01</div>
                    <div class="feature-body">
                        <p class="feature-title">Authentication gates every action</p>
                        <p class="feature-desc">Uploads and downloads require verified identity — no exceptions.</p>
                    </div>
                    <svg class="feature-check" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </li>
                <li class="feature-item">
                    <div class="feature-num">02</div>
                    <div class="feature-body">
                        <p class="feature-title">AES-256 encryption at rest</p>
                        <p class="feature-desc">Files are encrypted before they hit storage — never stored in plaintext.</p>
                    </div>
                    <svg class="feature-check" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </li>
                <li class="feature-item">
                    <div class="feature-num">03</div>
                    <div class="feature-body">
                        <p class="feature-title">SHA-256 integrity hashing</p>
                        <p class="feature-desc">Applied to every file on upload; verified on every download.</p>
                    </div>
                    <svg class="feature-check" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </li>
                <li class="feature-item">
                    <div class="feature-num">04</div>
                    <div class="feature-body">
                        <p class="feature-title">Owner-only download policy</p>
                        <p class="feature-desc">Downloads are permitted only for the authenticated file owner.</p>
                    </div>
                    <svg class="feature-check" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </li>
            </ul>

        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

:root {
    --bg: #0a0b0d; --surface: #10121a; --surface-2: #161924;
    --border: rgba(255,255,255,0.07); --border-hi: rgba(255,255,255,0.13);
    --amber: #f59e0b; --amber-dim: rgba(245,158,11,0.12);
    --text: #e8eaf0; --muted: #6b7280;
    --mono: 'JetBrains Mono', monospace; --sans: 'Syne', sans-serif;
}

.vault-page * { box-sizing: border-box; margin: 0; padding: 0; }
.vault-page { font-family: var(--sans); color: var(--text); position: relative; min-height: 100vh; }

.vault-grid {
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
    background-size: 48px 48px;
}
.vault-glow {
    position: fixed; top: -20vh; left: 50%; transform: translateX(-50%);
    width: 90vw; height: 60vh; z-index: 0; pointer-events: none;
    background: radial-gradient(ellipse at center, rgba(245,158,11,0.07) 0%, transparent 70%);
}

.vault-shell {
    position: relative; z-index: 1;
    max-width: 700px; margin: 0 auto;
    padding: 2rem 1rem 3rem;
}
@media (min-width: 600px) { .vault-shell { padding: 3rem 1.5rem 4rem; } }

/* ── Card ── */
.home-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 1.25rem; padding: 1.75rem;
    animation: fadeUp 0.6s ease both;
}
@media (min-width: 600px) { .home-card { padding: 2.5rem; border-radius: 1.5rem; } }
@keyframes fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }

/* ── Eyebrow ── */
.home-eyebrow {
    display: flex; align-items: center; gap: 0.75rem;
    font-family: var(--mono); font-size: 0.62rem; letter-spacing: 0.1em;
    color: var(--amber); margin-bottom: 1.25rem;
}
.eyebrow-line { flex: 1; height: 1px; background: rgba(245,158,11,0.25); }
.eyebrow-text { white-space: nowrap; }

/* ── Title ── */
.home-title {
    font-size: clamp(1.75rem, 7vw, 3rem);
    font-weight: 800; line-height: 1.1; letter-spacing: -0.03em; color: #fff;
}
.home-title-accent {
    background: linear-gradient(135deg, var(--amber), #fbbf24);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.home-body { margin-top: 1rem; font-size: 0.9rem; line-height: 1.7; color: var(--muted); }

/* ── Actions ── */
.home-actions {
    display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 1.5rem;
}
.btn {
    display: inline-flex; align-items: center; gap: 0.4rem;
    padding: 0.7rem 1.25rem; border-radius: 0.5rem;
    font-family: var(--sans); font-size: 0.875rem; font-weight: 600;
    text-decoration: none; transition: all 0.15s ease;
    border: 1px solid transparent; white-space: nowrap;
}
.btn-primary { background: var(--amber); color: #0a0a0a; border-color: var(--amber); }
.btn-primary:hover { background: #fbbf24; box-shadow: 0 0 20px rgba(245,158,11,0.35); }
.btn-ghost   { background: transparent; color: var(--text); border-color: var(--border-hi); }
.btn-ghost:hover { border-color: rgba(255,255,255,0.3); background: rgba(255,255,255,0.04); }
.btn-icon { width: 15px; height: 15px; flex-shrink: 0; }

/* ── Divider ── */
.home-divider {
    display: flex; align-items: center; gap: 1rem;
    margin: 1.75rem 0 1.25rem;
    font-family: var(--mono); font-size: 0.62rem; letter-spacing: 0.1em; color: var(--muted);
}
.divider-line { flex: 1; height: 1px; background: var(--border); }
.divider-label { white-space: nowrap; }

/* ── Feature list ── */
.feature-list { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }
.feature-item {
    display: flex; align-items: center; gap: 0.75rem;
    padding: 0.85rem 0.9rem;
    background: var(--surface-2); border: 1px solid var(--border);
    border-radius: 0.75rem; transition: border-color 0.15s;
}
@media (min-width: 480px) { .feature-item { gap: 1rem; padding: 0.85rem 1rem; } }
.feature-item:hover { border-color: var(--border-hi); }
.feature-num { font-family: var(--mono); font-size: 0.65rem; color: var(--amber); letter-spacing: 0.05em; min-width: 22px; flex-shrink: 0; }
.feature-body { flex: 1; min-width: 0; }
.feature-title { font-size: 0.82rem; font-weight: 600; color: var(--text); line-height: 1.3; }
.feature-desc  { font-size: 0.73rem; color: var(--muted); margin-top: 0.15rem; line-height: 1.5; }
.feature-check { width: 16px; height: 16px; color: #22c55e; flex-shrink: 0; }
</style>
@endsection