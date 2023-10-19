<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_categories' => 'required|unique:categories,name_categories',
        ], [
            'name_categories.unique' => 'Nama kategori sudah tersedia.',
        ]);

        Categories::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories = Categories::findOrFail($id);
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_categories' => 'required|unique:categories,name_categories',
        ], [
            'name_categories.unique' => 'Nama kategori sudah tersedia.',
        ]);

        $categories = Categories::findOrFail($id);

        $categories->name_categories = $request->input('name_categories');
        $categories->save();

        return redirect()->route('categories.index')->with('success','Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categories = Categories::findOrFail($id);
        $categories->delete();

        return back()->with('success', 'product deleted successfully');
    }
}
