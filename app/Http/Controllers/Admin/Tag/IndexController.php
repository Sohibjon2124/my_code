<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest as TagStoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest as TagUpdateRequest;
use App\Models\Tag;


class IndexController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
    public function create()
    {

        return view('admin.tags.create');
    }

    public function store(TagStoreRequest $request)
    {

        $data = $request->validated();
        Tag::firstOrCreate(['title' => $data['title']]);
        return redirect()->route('tag.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    public function update(Tag $tag, TagUpdateRequest $request)
    {
        $data=$request->validated();
        $tag->update($data);
        return view('admin.tags.show',compact('tag'));
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
