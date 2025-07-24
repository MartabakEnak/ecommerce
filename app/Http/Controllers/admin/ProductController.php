<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan semua produk dan form tambah/edit
    public function index(Request $request)
    {
        $products = Product::all();
        $editProduct = null;

        if ($request->has('edit')) {
            $editProduct = Product::findOrFail($request->edit);
        }

        return view('admin.produk.index', compact('products', 'editProduct'));
    }

    // Tambah atau update produk
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'id' => 'nullable|exists:products,id',
        ]);

        // UPDATE
        if ($request->filled('id')) {
            $product = Product::findOrFail($request->id);
            $product->name = $validated['name'];
            $product->price = $validated['price'];
            $product->description = $validated['description'];

            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $product->image = $request->file('image')->store('image_product', 'public');
            }

            $product->save();
            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui');
        }

        // CREATE
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('image_product', 'public');
        }

        Product::create($validated);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
    public function edit($id)
{
    $products = Product::all();
    $editProduct = Product::findOrFail($id);
    return view('admin.produk.index', compact('products', 'editProduct'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $validated['image'] = $request->file('image')->store('image_product', 'public');
    }

    $product->update($validated);

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui');
}

}
