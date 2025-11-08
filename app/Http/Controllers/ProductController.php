<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Exception;
use PDOException;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->get();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('product.form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        DB::beginTransaction();
        try {
            Product::create($request->validated());
            DB::commit();
            return redirect('products')->with('success', 'Product berhasil ditambahkan.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('products')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, Product $product, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrfail($id);
            $product->update($request->validated());
            DB::commit();
            return redirect('products')->with('success', 'Produk berhasil diperbarui.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('products')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            DB::commit();
            return redirect('products')->with('success', 'Kategori berhasil dihapus.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('products')->with('error', $e->getMessage());
        }

        return redirect('products');
    }
}
