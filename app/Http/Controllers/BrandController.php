<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of Brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Brand::all());
    }

    /**
     * Store a newly created brand in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required|string',
            'brand_image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'description' => 'nullable|string',
            'bonus_message' => 'required|string',
            'tag' => 'nullable|string',
            'isNew' => 'nullable|boolean',
            'rating' => 'integer|string|min:0|max:5',
        ]);

        if ($request->hasFile('brand_image')) {
            $path = $request->file('brand_image')->store('brands', 'public');
            $data['brand_image'] = $path;
        }

        $brand = Brand::create($data);

        return response()->json($brand, 201);
    }

    /**
     * Display the specified brand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Brand::findOrFail($id));
    }

    /**
     * Update the specified brand in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $data = $request->validate([
            'brand_name' => 'sometimes|string',
            'brand_image' => 'sometimes|image|mimes:jpg,png,jpeg,webp|max:2048',
            'description' => 'sometimes|string',
            'bonus_message' => 'sometimes|string',
            'tag' => 'sometimes|string',
            'isNew' => 'sometimes|boolean',
            'rating' => 'sometimes|integer|min:0|max:5',
        ]);

        if ($request->hasFile('brand_image')) {
            if ($brand->brand_image && Storage::disk('public')->exists($brand->brand_image)) {
                Storage::disk('public')->delete($brand->brand_image);
            }

            $path = $request->file('brand_image')->store('brands', 'public');
            $data['brand_image'] = $path;
        }

        $brand->update($data);

        return response()->json($brand, 200);
    }

    /**
     * Remove the specified brand from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json(null, 204);
    }
}
