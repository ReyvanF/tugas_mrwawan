<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Manajemen Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center gap-3 text-sm text-emerald-800 shadow-3xs">
                    <span class="text-emerald-500">✓</span>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Panel Kontrol: Pencarian & Tambah Data -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-3xs flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex-1 space-y-3">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900">Cari</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Gunakan fitur search di bawah untuk mempercepat pencarian kategori</p>
                    </div>
                    
                    <form action="{{ route('admin.index_category') }}" method="GET" class="flex flex-wrap items-center gap-2.5">
                        <input type="number" name="id" placeholder="ID..." value="{{ request('id') }}" 
                            class="border border-gray-200 text-xs rounded-lg px-3 py-2 bg-gray-50/50 focus:bg-white focus:border-gray-900 focus:ring-0 transition w-20">
                        
                        <input type="text" name="category_name" placeholder="Nama kategori..." value="{{ request('category_name') }}" 
                            class="border border-gray-200 text-xs rounded-lg px-3 py-2 bg-gray-50/50 focus:bg-white focus:border-gray-900 focus:ring-0 transition w-44">
                        
                        <button type="submit" class="text-xs font-medium px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition shadow-2xs">
                            Cari
                        </button>
                        
                        @if(request()->filled('id') || request()->filled('category_name'))
                            <a href="{{ route('admin.index_category') }}" class="text-xs font-medium px-4 py-2 bg-white border border-gray-200 text-gray-500 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition shadow-3xs">
                                Reset
                            </a>
                        @endif
                    </form>
                </div>

                <div class="shrink-0">
                    <a href="{{ route('admin.create_category') }}" class="inline-flex items-center text-xs font-semibold px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-sm gap-1.5">
                        <span>+</span> {{ __('Tambah Kategori Baru') }}
                    </a>
                </div>
            </div>

            <!-- Tabel Data Utama -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-3xs">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-gray-900">Semua Data Kategori</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 border-b border-gray-200 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                                <th class="py-3.5 px-6 w-16">ID</th>
                                <th class="py-3.5 px-6 w-64">Nama Kategori</th>
                                <th class="py-3.5 px-6">Deskripsi</th>
                                <th class="py-3.5 px-6 w-40 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs text-gray-700">
                            @if($category->isEmpty())
                                <tr>
                                    <td colspan="4" class="py-12 px-6 text-center">
                                        <div class="max-w-xs mx-auto space-y-1">
                                            <p class="font-semibold text-gray-900 text-sm">
                                                {{ request()->anyFilled(['id', 'category_name']) ? 'Hasil tidak ditemukan' : 'Belum ada data' }}
                                            </p>
                                            <p class="text-xs text-gray-400">
                                                {{ request()->anyFilled(['id', 'category_name']) ? 'Coba periksa kembali kata kunci atau ID yang Anda masukkan.' : 'Silakan tambahkan kategori baru untuk mengisi baris tabel ini.' }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($category as $c)
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="py-4 px-6 font-mono text-[11px] text-gray-400">#{{ $c->id }}</td>
                                        <td class="py-4 px-6 font-medium text-gray-900">{{ $c->category_name }}</td>
                                        <td class="py-4 px-6 text-gray-500">{{ $c->description }}</td>
                                        <td class="py-4 px-6 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <a href="{{ route('admin.edit_category', $c->id) }}" 
                                                    class="text-[11px] font-medium px-2.5 py-1 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 transition shadow-3xs">
                                                    Ubah
                                                </a>
                                                
                                                <form action="{{ route('admin.delete_category', $c) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                        class="text-[11px] font-medium px-2.5 py-1 bg-white border border-rose-100 text-rose-600 rounded-md hover:bg-rose-50 transition" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Menghapus kategori juga akan menghapus produk di dalamnya.')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Bagian Navigasi Halaman (Pagination) -->
                @if($category->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                        {{ $category->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
