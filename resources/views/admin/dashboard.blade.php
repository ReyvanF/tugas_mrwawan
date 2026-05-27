<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Ringkasan Data') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <!-- Bagian 1: Statistik Inventaris -->
            <section>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Statistik</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Total Produk -->
                    <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-3xs">
                        <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Total Produk</p>
                        <div class="flex items-end justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-900 leading-none">{{ $totalProducts }}</p>
                            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 text-lg">📦</div>
                        </div>
                    </div>

                    <!-- Total Kategori -->
                    <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-3xs">
                        <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Total Kategori</p>
                        <div class="flex items-end justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-900 leading-none">{{ $totalCategories }}</p>
                            <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 text-lg">🏷️</div>
                        </div>
                    </div>

                    <!-- Total Stok -->
                    <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-3xs">
                        <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Total Stok</p>
                        <div class="flex items-end justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-900 leading-none">{{ number_format($totalStock, 0, ',', '.') }}</p>
                            <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 text-lg">📊</div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>