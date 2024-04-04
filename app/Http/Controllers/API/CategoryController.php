<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\http\Resources\CategoryResource;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\UpdateCategoryRequest;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();

        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return $this->sendError('Category not found.');
        }

        return $this->sendResponse(new CategoryResource($category), 'Category retrieved successfully.');
    }

    public function store(StoreCategoryRequest $request)
    {

        $category = Category::create($request->validated());

        return $this->sendResponse(new CategoryResource($category), 'Category created successfully.');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->update($request->validated());

        return $this->sendResponse(new CategoryResource($category), 'Category updated successfully.');
    }
}
