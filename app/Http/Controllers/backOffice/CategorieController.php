<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backOffice\CategoryRequest;

class CategorieController extends Controller
{
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

    public function update(CategoryRequest $request, Category $category)
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
