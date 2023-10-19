<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $printer = Printer::all();
        $categories = Categories::all();
        // $printer = Printer::with('categories')->get();
        return view('printer.index', compact('printer', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('printer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'model' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
        ]);

        Printer::create($request->all());

        return redirect()->route('printer.index')->with('success', 'printer berhasil ditambahkan');
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
        $printer = Printer::findOrFail($id);
        $categories = Categories::all();
        return view('printer.edit', compact('printer', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    //     $request->validate([
    //         'category_id' => 'exists:categories,id',
    //         'model' => 'required',
    //         'price' => 'required',
    //         'stock_quantity' => 'required',
    //     ]);

    //     $printer = Printer::findOrFail($id);
    //     $category = Categories::findOrFail($request->input('category_id'));
    //     $printer->category_id = $request->input('category_id');
    //     $printer->model = $request->input('model');
    //     $printer->price = $request->input('price');
    //     $printer->stock_quantity = $request->input('stock_quantity');
    //     $printer->save();

    //     // dd($request->all());

    //     return redirect()->route('printer.index')->with('success','Product updated successfully');
    // }

    public function update(Request $request, string $id)
{
    $printer = Printer::findOrFail($id);

    $request->validate([
        'model' => 'required',
        'price' => 'required',
        'stock_quantity' => 'required',
        'category_id' => [
            Rule::exists('categories', 'id')->when(function ($query) use ($request, $printer) {
                return $request->input('category_id') !== $printer->category_id;
            }),
        ],
    ]);

    $printer->category_id = $request->input('category_id');
    $printer->model = $request->input('model');
    $printer->price = $request->input('price');
    $printer->stock_quantity = $request->input('stock_quantity');
    $printer->save();

    return redirect()->route('printer.index')->with('success', 'Product updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $printer = Printer::findOrFail($id);
        $printer->delete();

        return redirect()->route('printer.index')->with('success', 'product deleted successfully');
    }
}
