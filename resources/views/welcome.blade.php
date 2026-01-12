<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Blog Profesional</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <nav class="sticky top-0 z-50 w-full bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <div class="flex items-center gap-3">
                    <div class="bg-teal-600 p-2 rounded-lg rotate-3 hover:rotate-0 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-extrabold text-gray-900 tracking-tight">
                        Azriel<span class="text-teal-600">Space.</span>
                    </span>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-teal-600 transition">
                                Dashboard
                            </a>
                            <span class="h-5 w-px bg-gray-300 hidden md:block"></span>
                            <div class="hidden md:block text-sm text-gray-500">
                                Hi, {{ Auth::user()->name }}
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-teal-600 px-4 py-2 transition">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hidden md:inline-flex bg-teal-600 hover:bg-teal-700 text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                                    Daftar Sekarang
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        
        <div class="bg-gradient-to-b from-white to-gray-50 pt-16 pb-12 text-center border-b border-gray-100">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                Wawasan Teknologi & <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-emerald-600">Gaya Hidup</span>
            </h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Temukan artikel inspiratif yang ditulis khusus untuk memperluas cakrawala pengetahuan Anda.
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $articles = \App\Models\Article::latest()->get();
                @endphp

                @forelse($articles as $article)
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group h-full flex flex-col">
                    <div class="p-8 flex-grow">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-teal-50 text-teal-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Artikel</span>
                            <span class="text-xs text-gray-400 font-medium">{{ \Carbon\Carbon::parse($article->tanggal_publikasi)->format('d M Y') }}</span>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-teal-600 transition-colors">
                            {{ $article->judul }}
                        </h3>
                        
                        <p class="text-gray-500 leading-relaxed mb-4 line-clamp-3">
                            {{ Str::limit($article->isi, 120) }}
                        </p>
                    </div>

                    <div class="px-8 py-5 bg-gray-50 border-t border-gray-100 flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-bold text-xs">
                            {{ substr($article->penulis, 0, 1) }}
                        </div>
                        <div class="text-sm font-semibold text-gray-700">
                            {{ $article->penulis }}
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-3 text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada artikel</h3>
                    <p class="mt-1 text-sm text-gray-500">Silakan login admin untuk membuat artikel baru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div class="text-center md:text-left">
                    <h4 class="text-2xl font-extrabold text-white tracking-tight mb-4">
                        Azriel<span class="text-teal-500">Space.</span>
                    </h4>
                    <p class="text-gray-400 leading-relaxed text-sm">
                        Platform edukasi dan berbagi wawasan teknologi terkini. Didesain dengan standar pengembangan web modern berbasis Laravel.
                    </p>
                </div>

                <div class="text-center">
                    <h5 class="text-lg font-bold text-gray-200 mb-4">Navigasi</h5>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-teal-400 transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-teal-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Login Admin</a></li>
                    </ul>
                </div>

                <div class="text-center md:text-right">
                    <h5 class="text-lg font-bold text-gray-200 mb-4">Pengembang</h5>
                    <div class="bg-gray-800 rounded-lg p-4 inline-block text-left border border-gray-700 shadow-lg">
                        <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Created By</p>
                        <p class="text-xl font-bold text-teal-400 mb-1">
                            AZRIEL PUTRA PERTAMA
                        </p>
                        <p class="text-sm text-white font-mono bg-gray-900 px-2 py-1 rounded inline-block">
                            NIM: C2383207011
                        </p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} AzrielSpace Blog. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <span class="text-gray-600 text-sm">UAS Backend Development</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>