@extends('layouts.app')

@section('content')
<div class="vault-page">

    {{-- Grid background --}}
    <div class="vault-grid" aria-hidden="true"></div>
    <div class="vault-glow" aria-hidden="true"></div>

    <div class="vault-shell">

        {{-- Hero section --}}
        <section class="hero-section">
            <div class="hero-main">

                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span class="badge-text">AES-256 · SHA-256 · Zero-trust access</span>
                </div>

                <h1 class="hero-title">
                    Store. Encrypt.<br>
                    <em class="hero-accent">Share with trust.</em>
                </h1>

                <p class="hero-body">
                    Every file locked with AES-256 encryption before it touches disk. Integrity verified
                    with SHA-256 on every download. Only the owner ever gets in.
                </p>

                <div class="hero-actions">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">
                            <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z"/></svg>
                            Open Vault
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Log in
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-ghost">
                            Create account
                            <svg class="btn-icon btn-icon-right" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </a>
                    @endauth
                </div>

                {{-- Feature pills --}}
                <div class="feature-grid">
                    <div class="feature-pill">
                        <svg class="feature-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                        <span>Auth-gated uploads &amp; downloads</span>
                    </div>
                    <div class="feature-pill">
                        <svg class="feature-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>AES-256 encryption at rest</span>
                    </div>
                    <div class="feature-pill">
                        <svg class="feature-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                        <span>SHA-256 integrity on every file</span>
                    </div>
                    <div class="feature-pill">
                        <svg class="feature-icon" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                        <span>Owner-only download access</span>
                    </div>
                </div>

            </div>

            {{-- Side panel --}}
            <aside class="hero-panel">
                <div class="panel-header">
                    <div class="panel-status">
                        <span class="status-led"></span>
                        <span class="status-label">VAULT ACTIVE</span>
                    </div>
                    <span class="panel-mono">v2.4.1</span>
                </div>

                <div class="panel-diagram">
                    <div class="diagram-row">
                        <div class="diagram-node node-upload">
                            <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            <span>Upload</span>
                        </div>
                        <div class="diagram-arrow">→</div>
                        <div class="diagram-node node-encrypt">
                            <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                            <span>Encrypt</span>
                        </div>
                    </div>
                    <div class="diagram-row diagram-row-mid">
                        <div class="diagram-connector-v"></div>
                    </div>
                    <div class="diagram-row">
                        <div class="diagram-node node-hash">
                            <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-.333 1h1.684a1 1 0 010 2h-2.35l-.666 2h1.85a1 1 0 110 2H10.95l-.333 1a1 1 0 11-1.898-.632l.333-1H7.366l-.333 1A1 1 0 115.135 11.4l.333-1H4a1 1 0 010-2h2.134l.666-2H5a1 1 0 010-2h2.466l.333-1a1 1 0 011.265-.633zM9.333 7l-.666 2h1.999l.666-2H9.333z" clip-rule="evenodd"/></svg>
                            <span>SHA-256</span>
                        </div>
                        <div class="diagram-arrow">→</div>
                        <div class="diagram-node node-store">
                            <svg viewBox="0 0 20 20" fill="currentColor"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                            <span>Store</span>
                        </div>
                    </div>
                </div>

                <div class="panel-info-list">
                    <div class="panel-info-item">
                        <span class="info-key">Cipher</span>
                        <span class="info-val mono">AES-256-CBC</span>
                    </div>
                    <div class="panel-info-item">
                        <span class="info-key">Integrity</span>
                        <span class="info-val mono">SHA-256</span>
                    </div>
                    <div class="panel-info-item">
                        <span class="info-key">Access</span>
                        <span class="info-val mono">Owner-only</span>
                    </div>
                    <div class="panel-info-item">
                        <span class="info-key">Auth</span>
                        <span class="info-val mono">Required</span>
                    </div>
                </div>
            </aside>
        </section>

    </div>
</div>

<style>
/* ─── Fonts ─── */
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

/* ─── Tokens ─── */
:root {
    --bg:        #0a0b0d;
    --surface:   #10121a;
    --surface-2: #161924;
    --border:    rgba(255,255,255,0.07);
    --border-hi: rgba(255,255,255,0.13);
    --amber:     #f59e0b;
    --amber-dim: rgba(245,158,11,0.12);
    --amber-glow:rgba(245,158,11,0.06);
    --text:      #e8eaf0;
    --muted:     #6b7280;
    --mono:      'JetBrains Mono', monospace;
    --sans:      'Syne', sans-serif;
}

/* ─── Reset scope ─── */
.vault-page * { box-sizing: border-box; margin: 0; padding: 0; }
.vault-page { font-family: var(--sans); color: var(--text); position: relative; min-height: 100vh; }

/* ─── Background ─── */
.vault-grid {
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
    background-size: 48px 48px;
}
.vault-glow {
    position: fixed; top: -20vh; left: 50%; transform: translateX(-50%);
    width: 70vw; height: 60vh; z-index: 0; pointer-events: none;
    background: radial-gradient(ellipse at center, rgba(245,158,11,0.07) 0%, transparent 70%);
}
.vault-shell {
    position: relative; z-index: 1;
    max-width: 1200px; margin: 0 auto;
    padding: 3rem 1.5rem 4rem;
}

/* ─── Hero layout ─── */
.hero-section {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    align-items: start;
    animation: fadeUp 0.7s ease both;
}
@media (min-width: 900px) {
    .hero-section { grid-template-columns: 1.2fr 0.8fr; gap: 3rem; }
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ─── Hero main ─── */
.hero-badge {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 0.3rem 0.8rem; border-radius: 99px;
    background: var(--amber-dim); border: 1px solid rgba(245,158,11,0.25);
    font-family: var(--mono); font-size: 0.68rem; letter-spacing: 0.04em;
    color: var(--amber);
}
.badge-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: var(--amber);
    box-shadow: 0 0 6px var(--amber);
    animation: pulse 2s ease-in-out infinite;
}
@keyframes pulse {
    0%,100% { opacity: 1; }
    50%      { opacity: 0.4; }
}
.hero-title {
    margin-top: 1.5rem;
    font-size: clamp(2.4rem, 5vw, 4rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.03em;
    color: #fff;
}
.hero-accent {
    font-style: normal;
    background: linear-gradient(135deg, var(--amber), #fbbf24);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
}
.hero-body {
    margin-top: 1.25rem;
    font-size: 1.0rem; line-height: 1.75;
    color: var(--muted); max-width: 520px;
    font-family: 'Syne', sans-serif; font-weight: 400;
}

/* ─── Buttons ─── */
.hero-actions { display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 2rem; }
.btn {
    display: inline-flex; align-items: center; gap: 0.4rem;
    padding: 0.7rem 1.4rem; border-radius: 0.5rem;
    font-family: var(--sans); font-size: 0.875rem; font-weight: 600;
    text-decoration: none; transition: all 0.15s ease; cursor: pointer;
    border: 1px solid transparent;
}
.btn-primary {
    background: var(--amber); color: #0a0a0a;
    border-color: var(--amber);
}
.btn-primary:hover {
    background: #fbbf24; border-color: #fbbf24;
    box-shadow: 0 0 20px rgba(245,158,11,0.35);
}
.btn-ghost {
    background: transparent; color: var(--text);
    border-color: var(--border-hi);
}
.btn-ghost:hover { border-color: rgba(255,255,255,0.3); background: rgba(255,255,255,0.04); }
.btn-icon { width: 16px; height: 16px; flex-shrink: 0; }
.btn-icon-right { margin-left: 0.1rem; }

/* ─── Feature grid ─── */
.feature-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 0.75rem; margin-top: 2.5rem;
}
@media (max-width: 520px) { .feature-grid { grid-template-columns: 1fr; } }
.feature-pill {
    display: flex; align-items: flex-start; gap: 0.6rem;
    padding: 0.75rem 1rem;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 0.75rem;
    font-size: 0.8rem; color: #9ca3af; line-height: 1.4;
    transition: border-color 0.15s;
}
.feature-pill:hover { border-color: var(--border-hi); }
.feature-icon {
    width: 15px; height: 15px; flex-shrink: 0;
    color: var(--amber); margin-top: 1px;
}

/* ─── Side panel ─── */
.hero-panel {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 1.25rem;
    overflow: hidden;
    animation: fadeUp 0.7s 0.15s ease both;
}
.panel-header {
    display: flex; justify-content: space-between; align-items: center;
    padding: 0.9rem 1.25rem;
    border-bottom: 1px solid var(--border);
    background: var(--surface-2);
}
.panel-status { display: flex; align-items: center; gap: 0.5rem; }
.status-led {
    width: 8px; height: 8px; border-radius: 50%;
    background: #22c55e; box-shadow: 0 0 8px #22c55e;
    animation: pulse 2s ease-in-out infinite;
}
.status-label {
    font-family: var(--mono); font-size: 0.65rem;
    letter-spacing: 0.1em; color: #22c55e;
}
.panel-mono { font-family: var(--mono); font-size: 0.65rem; color: var(--muted); }

/* ─── Diagram ─── */
.panel-diagram {
    padding: 1.75rem 1.25rem 1.25rem;
    border-bottom: 1px solid var(--border);
}
.diagram-row {
    display: flex; align-items: center; justify-content: center; gap: 0.6rem;
}
.diagram-row-mid { padding: 0.3rem 0; justify-content: flex-start; padding-left: calc(50% - 1px); }
.diagram-connector-v {
    width: 2px; height: 1.2rem;
    background: linear-gradient(to bottom, var(--border-hi), transparent);
}
.diagram-node {
    display: flex; flex-direction: column; align-items: center; gap: 0.3rem;
    padding: 0.7rem 0.9rem;
    background: var(--surface-2); border: 1px solid var(--border);
    border-radius: 0.75rem; min-width: 80px;
    font-size: 0.72rem; color: var(--muted); font-family: var(--mono);
    transition: border-color 0.15s, color 0.15s;
}
.diagram-node svg { width: 18px; height: 18px; }
.node-encrypt { border-color: rgba(245,158,11,0.3); color: var(--amber); }
.node-hash    { border-color: rgba(245,158,11,0.2); color: #fcd34d; }
.diagram-arrow { font-family: var(--mono); color: var(--muted); font-size: 1rem; }

/* ─── Info list ─── */
.panel-info-list { padding: 0.75rem 1.25rem 1.25rem; display: flex; flex-direction: column; gap: 0.5rem; }
.panel-info-item {
    display: flex; justify-content: space-between; align-items: center;
    padding: 0.5rem 0.75rem;
    background: var(--surface-2); border-radius: 0.5rem;
    font-size: 0.75rem;
}
.info-key { color: var(--muted); }
.info-val { color: var(--text); }
.mono { font-family: var(--mono); font-size: 0.7rem; letter-spacing: 0.02em; }
</style>
@endsection