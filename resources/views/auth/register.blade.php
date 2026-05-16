@extends('layouts.app')

@section('content')
<div class="vault-page">
    <div class="vault-grid" aria-hidden="true"></div>
    <div class="vault-glow" aria-hidden="true"></div>

    <div class="vault-shell">
        <div class="auth-card">

            <div class="auth-header">
                <div class="auth-logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div class="auth-eyebrow">
                    <span class="eyebrow-dot"></span>
                    New account
                </div>
                <h1 class="auth-title">Create your vault</h1>
                <p class="auth-desc">Register to upload encrypted files and access them securely.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="field-group">
                    <label for="name" class="field-label">Full name</label>
                    <div class="field-input-wrap">
                        <svg class="field-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="field-input" placeholder="Jane Smith" />
                    </div>
                </div>

                <div class="field-group">
                    <label for="username" class="field-label">Username</label>
                    <div class="field-input-wrap">
                        <svg class="field-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required
                            class="field-input" placeholder="janesmith" />
                    </div>
                </div>

                <div class="field-group">
                    <label for="password" class="field-label">Password</label>
                    <div class="field-input-wrap">
                        <svg class="field-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                        <input id="password" type="password" name="password" required
                            class="field-input" placeholder="••••••••••" />
                    </div>
                </div>

                <div class="field-group">
                    <label for="password_confirmation" class="field-label">Confirm password</label>
                    <div class="field-input-wrap">
                        <svg class="field-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="field-input" placeholder="••••••••••" />
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Create account
                    <svg class="submit-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </button>
            </form>

            <div class="auth-footer">
                Already have an account?
                <a href="{{ route('login') }}" class="auth-link">Log in</a>
            </div>
        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');
:root {
    --surface: #10121a; --surface-2: #161924; --surface-3: #1c202e;
    --border: rgba(255,255,255,0.07); --border-hi: rgba(255,255,255,0.13);
    --amber: #f59e0b; --amber-dim: rgba(245,158,11,0.1);
    --text: #e8eaf0; --muted: #6b7280;
    --mono: 'JetBrains Mono', monospace; --sans: 'Syne', sans-serif;
}
.vault-page * { box-sizing: border-box; margin: 0; padding: 0; }
.vault-page { font-family: var(--sans); color: var(--text); position: relative; min-height: 100vh; }
.vault-grid {
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
    background-size: 48px 48px;
}
.vault-glow {
    position: fixed; top: -20vh; left: 50%; transform: translateX(-50%);
    width: 70vw; height: 60vh; z-index: 0; pointer-events: none;
    background: radial-gradient(ellipse at center, rgba(245,158,11,0.07) 0%, transparent 70%);
}
.vault-shell {
    position: relative; z-index: 1;
    max-width: 440px; margin: 0 auto; padding: 3rem 1.25rem 4rem;
}

.auth-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 1.5rem; padding: 2.25rem;
    animation: fadeUp 0.55s ease both;
}
@keyframes fadeUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }

.auth-header { display: flex; flex-direction: column; align-items: flex-start; gap: 0.5rem; margin-bottom: 2rem; }
.auth-logo {
    width: 44px; height: 44px; border-radius: 0.75rem;
    background: var(--amber-dim); border: 1px solid rgba(245,158,11,0.25);
    display: flex; align-items: center; justify-content: center;
    color: var(--amber); margin-bottom: 0.5rem;
}
.auth-logo svg { width: 22px; height: 22px; }
.auth-eyebrow {
    display: flex; align-items: center; gap: 0.4rem;
    font-family: var(--mono); font-size: 0.65rem; letter-spacing: 0.1em;
    color: var(--amber); text-transform: uppercase;
}
.eyebrow-dot {
    width: 5px; height: 5px; border-radius: 50%;
    background: var(--amber); box-shadow: 0 0 5px var(--amber);
    animation: pulse 2s infinite;
}
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
.auth-title { font-size: 1.75rem; font-weight: 800; color: #fff; letter-spacing: -0.03em; }
.auth-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.6; margin-top: 0.1rem; }

.auth-form { display: flex; flex-direction: column; gap: 1.1rem; }

.field-group { display: flex; flex-direction: column; gap: 0.4rem; }
.field-label {
    font-size: 0.75rem; font-weight: 600; color: #9ca3af;
    font-family: var(--mono); letter-spacing: 0.04em; text-transform: uppercase;
}
.field-input-wrap {
    position: relative; display: flex; align-items: center;
}
.field-icon {
    position: absolute; left: 0.85rem;
    width: 15px; height: 15px; color: var(--muted);
    pointer-events: none;
}
.field-input {
    width: 100%; padding: 0.75rem 0.9rem 0.75rem 2.4rem;
    background: var(--surface-2); border: 1px solid var(--border);
    border-radius: 0.6rem; font-family: var(--sans); font-size: 0.875rem;
    color: var(--text); outline: none;
    transition: border-color 0.15s, box-shadow 0.15s;
}
.field-input::placeholder { color: var(--muted); }
.field-input:focus {
    border-color: rgba(245,158,11,0.5);
    box-shadow: 0 0 0 3px rgba(245,158,11,0.08);
}

.btn-submit {
    margin-top: 0.4rem;
    display: flex; align-items: center; justify-content: center; gap: 0.5rem;
    width: 100%; padding: 0.85rem; border-radius: 0.6rem;
    background: var(--amber); color: #0a0a0a;
    font-family: var(--sans); font-size: 0.9rem; font-weight: 700;
    border: none; cursor: pointer; letter-spacing: -0.01em;
    transition: background 0.15s, box-shadow 0.15s;
}
.btn-submit:hover { background: #fbbf24; box-shadow: 0 0 24px rgba(245,158,11,0.35); }
.submit-icon { width: 15px; height: 15px; }

.auth-footer {
    text-align: center; margin-top: 1.5rem;
    font-size: 0.8rem; color: var(--muted);
}
.auth-link { color: var(--amber); text-decoration: none; font-weight: 600; margin-left: 0.25rem; }
.auth-link:hover { text-decoration: underline; }
</style>
@endsection