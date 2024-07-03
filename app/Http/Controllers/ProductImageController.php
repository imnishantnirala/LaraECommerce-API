<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index()
    {
        try {
            $productImages = ProductImage::all();
            return response()->json($productImages, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch product images'], 500);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:50',
            'slug' => 'required|string|max:100|unique:product_images,slug',
        ]);

        try {
            $productImage = ProductImage::create($validatedData);
            return response()->json($productImage, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create product image'], 500);
        }

        // $productImage = ProductImage::create($validatedData);
        // return response()->json($productImage, 201);
    }

    public function show($id)
    {
        try {
            $productImage = ProductImage::findOrFail($id);
            return response()->json($productImage, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product image not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'sometimes|exists:products,id',
            'name' => 'sometimes|string|max:50',
            'slug' => 'sometimes|string|max:100|unique:product_images,slug,' . $id,
        ]);

        try {
            $productImage = ProductImage::findOrFail($id);
            $productImage->update($validatedData);
            return response()->json($productImage, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update product image'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $productImage = ProductImage::findOrFail($id);
            $productImage->delete();
            return response()->json(['message' => 'Product image deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete product image'], 500);
        }
    }
}
