<?php

namespace App\Http\Controllers\admin\attribute_value;

use App\Models\Attributes;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributeValue = AttributeValue::all();
        return view('admin.pages.attribute_value.list', compact('attributeValue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributeValue = Attributes::all();
        return view('admin.pages.attribute_value.create', compact('attributeValue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AttributeValue::create([
            'name' => $request->name,
            'attribute_id' => $request->attribute_id,
        ]);
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
