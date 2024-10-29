<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.product-list', [
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data 
        $validasi = $request->validate([
            'product_name' => 'required',
            'unit' => 'required',
            'type' => 'required',
            'information' => 'required',
            'qty' => 'required',
            'producer' => 'required',
        ]);

        //SAVE DATA 
        Product::create($validasi);

        return redirect(route('product.list'))->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Validasi data 
        $validasi = $request->validate([
            'product_name' => 'required',
            'unit' => 'required',
            'type' => 'required',
            'information' => 'required',
            'qty' => 'required|integer|min:1', // Validasi jumlah harus integer dan lebih dari 0
            'producer' => 'required',
        ]);

        // Update data produk
        $product->update($validasi);

        return redirect(route('product.list'))->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            // Redirect dengan pesan sukses setelah berhasil menghapus
            return redirect()->route('product.list')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, redirect dengan pesan error
            return redirect()->route('product.list')->with('error', 'Failed to delete product.');
        }
    }
}
