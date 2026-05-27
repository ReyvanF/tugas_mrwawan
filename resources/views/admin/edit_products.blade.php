<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center gap-3 text-sm text-emerald-800 shadow-3xs">
                    <span class="text-emerald-500">✓</span>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Kartu Formulir Utama -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-3xs overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-sm font-semibold text-gray-900">Form Edit Produk</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Ubah detail data pada produk terpilih</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('admin.update_product', $product->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <!-- Nama Produk -->
                            <div class="flex flex-col gap-1.5">
                                <label for="product_name" class="text-xs font-semibold text-gray-700">Nama Produk</label>
                                <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required 
                                    class="w-full border border-gray-200 text-xs rounded-lg px-3.5 py-2.5 bg-gray-50/50 focus:bg-white focus:border-gray-950 focus:ring-0 transition">
                            </div>

                            <!-- Kategori Produk -->
                            <div class="flex flex-col gap-1.5">
                                <label for="category_id" class="text-xs font-semibold text-gray-700">Kategori Produk</label>
                                <select id="category_id" name="category_id" required 
                                    class="w-full border border-gray-200 text-xs rounded-lg px-3.5 py-2.5 bg-gray-50/50 focus:bg-white focus:border-gray-950 focus:ring-0 transition text-gray-700">
                                    @foreach ($category as $c)
                                        <option value="{{ $c->id }}" {{ old('category_id', $product->category_id) == $c->id ? 'selected' : '' }}>
                                            {{ $c->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <!-- Harga -->
                            <div class="flex flex-col gap-1.5">
                                <label for="price" class="text-xs font-semibold text-gray-700">Harga</label>
                                <input type="number" step="any" id="price" name="price" value="{{ old('price', (int)$product->price) }}" required 
                                    class="w-full border border-gray-200 text-xs rounded-lg px-3.5 py-2.5 bg-gray-50/50 focus:bg-white focus:border-gray-950 focus:ring-0 transition">
                            </div>

                            <!-- Stok -->
                            <div class="flex flex-col gap-1.5">
                                <label for="stock" class="text-xs font-semibold text-gray-700">Stok</label>
                                <input type="number" step="any" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required 
                                    class="w-full border border-gray-200 text-xs rounded-lg px-3.5 py-2.5 bg-gray-50/50 focus:bg-white focus:border-gray-950 focus:ring-0 transition">
                            </div>

                            <!-- Unit -->
                            <div class="flex flex-col gap-1.5">
                                <label for="unit" class="text-xs font-semibold text-gray-700">Unit Satuan</label>
                                <input type="text" id="unit" name="unit" value="{{ old('unit', $product->unit) }}" required 
                                    class="w-full border border-gray-200 text-xs rounded-lg px-3.5 py-2.5 bg-gray-50/50 focus:bg-white focus:border-gray-950 focus:ring-0 transition">
                            </div>
                        </div>

                        <!-- Baris Tombol Aksi -->
                        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-2.5">
                            <a href="{{ route('admin.index_product') }}" 
                                class="text-xs font-medium px-4 py-2.5 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition">
                                Batal
                            </a>
                            <button type="submit" 
                                class="text-xs font-semibold px-5 py-2.5 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition shadow-sm">
                                Update Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
