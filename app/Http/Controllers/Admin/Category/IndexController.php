<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {

        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        Category::firstOrCreate(['title' => $data['title']]);
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Category $category, UpdateRequest $request)
    {
        $data=$request->validated();
        $category->update($data);
        return view('admin.categories.show',compact('category'));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
