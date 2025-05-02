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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category = Category::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Catégorie ajoutée avec succès !',
                'category' => $category
            ], 201); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue.',
                'error' => $e->getMessage()
            ], 500); 
        }
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
        return response()->json([
            'success' => true,
            'message' => 'Catégorie mise à jour avec succès',
        ]);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Catégorie supprimée avec succès'
        ]);
    }


}
