<?php

namespace App\Http\Controllers\admin\attribute;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attribute = Attribute::all();
        return view('admin.pages.attribute.list', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeRequest $request)
    {
        Attribute::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.attribute.index')->with('success', 'Thuộc tính được thêm thành công!');
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
        $attribute = Attribute::find($id);
        return view('admin.pages.attribute.update', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeRequest $request, string $id)
    {
        $obj = Attribute::find($id);
        $obj->update([
            'name' => $request->name,

        ]);

        return redirect()->route('admin.attribute.index')->with('success', 'Sửa thuộc tính thành công!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return redirect()->route('admin.attribute.index')->with('success', 'Thuộc tính đã bị xóa!');

    }
}
