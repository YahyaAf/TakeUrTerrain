<?php

namespace App\Http\Controllers\backOffice;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\backOffice\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class TagController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:view-tag')->only(['index', 'show']);
        $this->middleware('permission:create-tag')->only(['create', 'store']);
        $this->middleware('permission:update-tag')->only(['edit', 'update']);
        $this->middleware('permission:delete-tag')->only('destroy');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('backOffice.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('backOffice.tags.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag ajouté avec succès !');
    }

    public function edit(Tag $tag)
    {
        return view('backOffice.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag mis à jour avec succès !');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag supprimé avec succès !');
    }
}
