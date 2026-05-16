<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'Secure File Share') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
        <div class="min-h-screen flex flex-col">
            <header class="border-b border-slate-800 bg-slate-900/90 shadow-sm">
                <div class="mx-auto flex max-w-6xl items-center justify-end px-4 py-4 sm:px-6 lg:px-8">
                    <nav class="flex flex-wrap items-center gap-3 text-sm text-slate-300">
                        @guest
                            
                        @else
                            <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 transition hover:bg-slate-800 hover:text-white">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="rounded-md bg-slate-700 px-3 py-2 text-white transition hover:bg-slate-600">Logout</button>
                            </form>
                        @endguest
                    </nav>
                </div>
            </header>

            <main class="flex-1 py-10">
                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                    @if (session('success'))
                        <div class="mb-6 rounded-3xl border border-emerald-600/20 bg-emerald-500/10 p-4 text-sm text-emerald-200">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-6 rounded-3xl border border-rose-600/20 bg-rose-500/10 p-4 text-sm text-rose-200">
                            <strong class="block font-semibold text-white">Whoops!</strong>
                            <ul class="mt-3 ml-4 list-disc space-y-1 text-slate-300">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>