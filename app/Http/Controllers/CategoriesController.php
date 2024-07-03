<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    // Create a new category
public function createCategory(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:55|unique:categories',
        'slug' => 'required|string|max:110|unique:categories',
        'created_by' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
    }

    $category = Category::create($request->all());

    return response()->json(['category' => $category], Response::HTTP_CREATED);
}

// Read all categories
public function getAllCategories()
{
    $categories = Category::all();

    return response()->json(['categories' => $categories], Response::HTTP_OK);
}

// Update a category
public function updateCategory(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'name' => 'string|max:55|unique:categories,name,' . $id,
        'slug' => 'string|max:110|unique:categories,slug,' . $id,
        'updated_by' => 'integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
    }

    $category->update($request->all());

    return response()->json(['category' => $category], Response::HTTP_OK);
}

// Delete a category
public function deleteCategory($id)
{
    $category = Category::findOrFail($id);

    $category->delete();

    return response()->json(null, Response::HTTP_NO_CONTENT);
}
}
