<?php

namespace App\Http\Controllers;

use App\Services\ProductTypeService;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function __construct(private ProductTypeService $service){
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $nestedProductTypes = $this->service->getProductType();
        // return response()->json($nestedProductTypes);
        $nestedProductTypes = $this->service->getAllType();
        // return response()->json($nestedProductTypes);
        return view('product_type.index', compact('nestedProductTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productTypes = $this->service->getAllType();
        // return response()->json($productTypes);
        return view('product_type.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:product_types,name'],
            'parent_id' => ['nullable'],
        ]);
        $this->service->createProductType($data);
        return redirect()->route('product_types.index')->with('success', 'Product Type created successfully.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
