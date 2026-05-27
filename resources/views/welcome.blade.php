<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-50 antialiased">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Masuk Sistem</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ... css internal bawaan kamu ... */
            </style>
        @endif
    </head>
    <body class="text-gray-800 font-sans min-h-screen flex flex-col justify-between">

        <!-- Konten Tengah (Dibuat Pas di Tengah Layar Agar Fokus) -->
        <main class="flex-1 flex items-center justify-center p-4">
            
            <div class="max-w-md w-full text-center">
                
                <!-- 1. Logo Aplikasi Minimalis -->
                <div class="w-12 h-12 bg-gray-900 rounded-lg flex items-center justify-center text-white font-bold text-lg mx-auto shadow-sm mb-4">
                    📦
                </div>

                <!-- 2. Judul yang Singkat & Padat -->
                <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">
                    Kelola Data Barang
                </h1>
                <p class="text-sm text-gray-500 mt-1.5 max-w-xs mx-auto">
                    Portal logistik khusus Admin untuk mengelola barang.
                </p>

                <!-- 3. Box Tombol Aksi Utama -->
                <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-xs mt-8 text-left">
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-4 text-center">
                        Pilih Menu Akses
                    </p>
                    
                    <div class="flex flex-col gap-3">
                        @auth
                            <!-- Tampilan jika Admin/Worker SUDAH login -->
                            <a href="/dashboard" class="w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-center font-medium text-sm transition shadow-sm flex items-center justify-center gap-2">
                                <span>💻</span> Pergi ke Dashboard
                                <span class="text-emerald-200">→</span>
                            </a>
                        @else
                            <!-- Tampilan jika Admin/Worker BELUM login -->
                            <a href="/login" class="w-full py-3 px-4 bg-gray-950 hover:bg-gray-800 text-white rounded-lg text-center font-medium text-sm transition shadow-sm flex items-center justify-center gap-2">
                                Masuk ke Akun Anda
                                <span class="text-gray-400">→</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

        </main>

        <!-- Footer yang Bersih -->
        <footer class="w-full text-center py-4 text-xs text-gray-400 border-t border-gray-100 bg-white">
            &copy; 2026 {{ config('app.name', 'Laravel') }}. Panel Internal.
        </footer>

    </body>
</html>