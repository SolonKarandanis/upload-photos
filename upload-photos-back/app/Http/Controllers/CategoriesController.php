<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response(CategoryResource::collection($categories),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Categories::create([
            'name' => $request->name,
        ]);

        return response(new CategoryResource($category), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Categories $category)
    {
        $category->name= $request->name;
        $category->save();
        return response(new CategoryResource($category), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();

        return response(null, 204);
    }
}
