<?php

namespace App\Http\Controllers\admin\attribute_value;

use App\Http\Requests\AttributeValueRequest;
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
        $attribute = AttributeValue::all();
        return view('admin.pages.attribute_value.list', compact('attribute'));
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
    public function store(AttributeValueRequest $request)
    {
       
        AttributeValue::create([
            'attribute_id' => $request->attribute_id,
            'value' => $request->value,
        ]);
        return redirect()->route('admin.attribute_value.index')->with('success', 'Giá trị thuộc tính được thêm thành công!');

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
        $attribute = Attributes::all();
        $attributeValue = AttributeValue::findOrFail($id);
        return view('admin.pages.attribute_value.update', compact('attributeValue', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeValueRequest $request, string $id)
    {
        $obj = AttributeValue::find($id);
        $obj->update([
            'attribute_id' => $request->attribute_id,
            'value' => $request->value,
        
        ]);

        return redirect()->route('admin.attribute_value.index')->with('success', 'Sửa thành công thuộc tính!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attributeValue = AttributeValue::findOrFail($id);
        $attributeValue->delete();
        return redirect()->route('admin.attribute_value.index')->with('success', 'Thuộc tính đã bị xóa!');
    }
}
