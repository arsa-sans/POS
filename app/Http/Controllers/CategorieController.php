<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategorieRequest;
use App\Http\Requests\UpdatecategorieRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Exception;
use PDOException;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategorieRequest $request)
    {
        DB::beginTransaction();
        try {
            Category::create($request->validated());
            DB::commit();
            return redirect('categories')->with('success', 'Kategori berhasil ditambahkan.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('categories')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategorieRequest $request, $id, Category $categories)
    {
        DB::beginTransaction();
        try {
            $categories = Category::findOrfail($id);
            $categories->update($request->validated());
            DB::commit();
            return redirect('categories')->with('success', 'Kategori berhasil diperbarui.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('categories')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            DB::commit();
            return redirect('categories')->with('success', 'Kategori berhasil dihapus.');
        } catch (Exception | PDOException $e) {
            DB::rollBack();
            return redirect('categories')->with('error', $e->getMessage());
        }

        return redirect('categories');
    }
}
