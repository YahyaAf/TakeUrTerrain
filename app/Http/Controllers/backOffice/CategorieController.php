<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backOffice\CategoryRequest;
use App\Http\Requests\backOffice\UpdateCategoryRequest;
use Illuminate\Routing\Controller as BaseController;

class CategorieController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:view-category')->only(['index', 'show']);
        $this->middleware('permission:create-category')->only(['create', 'store']);
        $this->middleware('permission:update-category')->only(['edit', 'update']);
        $this->middleware('permission:delete-category')->only('destroy');
    }

    public function index()
    {
        $categories = Category::all();
        return view('BackOffice.Categories.index',compact('categories'));
    }

    public function create()
    {
        return view('BackOffice.Categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès');
    }

    public function edit(Category $category)
    {
        return view('BackOffice.Categories.edit', compact('category'));
    }

    public function show(Category $category)
    {
        return view('BackOffice.Categories.show', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }

}
