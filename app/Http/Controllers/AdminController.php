<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class AdminController extends Controller
{
    public function home() {
        $totalProducts = Products::count();
        $totalCategories = Categories::count();
        $totalStock = Products::sum('stock');

        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalStock'));
    }
    public function index_product(Request $request) {
        $query = Products::query();
        if ($request->filled('id')) {
            $query->where('id', $request->input('id'));
        }
        if ($request->filled('product_name')) {
            $query->where('product_name', 'like binary', '%' . $request->input('product_name') . '%');
        }

        $products = $query->orderBy('id', 'asc')->paginate(15);
        return view('admin.products', compact('products'));
    }

    public function index_category(Request $request) {
        $query = Categories::query();
        if ($request->filled('id')) {
            $query->where('id', $request->input('id'));
        }
        if ($request->filled('category_name')) {
            $query->where('category_name', 'like binary', '%' . $request->input('category_name') . '%');
        }

        $category = $query->orderBy('id', 'asc')->paginate(15);
        return view('admin.categories', compact('category'));
    }

    public function create_product() {
        $category = Categories::orderBy('id', 'asc')->get();
        return view('admin.create_products', compact('category'));
    }

    public function create_category() {
        return view('admin.create_categories');
    }

    public function edit_product($id) {
        $product = Products::findOrFail($id);
        $category = Categories::orderBy('id', 'asc')->get();
        return view('admin.edit_products', compact('category', 'product'));
    }

    public function edit_category($id) {
        $category = Categories::findOrFail($id);
        return view('admin.edit_categories', compact('category'));
    }

    public function store_product(Request $request) {
        $request->validate([
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
        ], [
            'price.min' => 'Harga produk tidak boleh bernilai negatif!',
            'stock.min' => 'Stok produk tidak boleh bernilai negatif!',
        ]);
        Products::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'price' => (int)round($request->price),
            'stock' => (int)round($request->stock),
            'unit' => $request->unit,
        ]);
    
        return redirect()->route('admin.index_product')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function store_category(Request $request) {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Categories::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.index_category')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update_product(Request $request, $id) {
        $products = Products::findOrFail($id);

        $request->validate([
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
        ], [
            'price.min' => 'Harga produk tidak boleh negatif!',
            'stock.min' => 'Stok produk tidak boleh negatif!',
        ]);
        $request->merge([
            'price' => (int)round($request->price),
            'stock' => (int)round($request->stock),
        ]);
        $products->update($request->all());

        return redirect()->route('admin.index_product')->with('success', 'Produk berhasil diperbarui!');
    }

    public function update_category(Request $request, $id) {
        $category = Categories::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.index_category')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function delete_product(Products $products) {
        $products->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }


    public function delete_category(Categories $categories) {
        $categories->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
