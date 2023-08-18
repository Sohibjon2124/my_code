<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Requests\Admin\Post\StoreRequest as PostStoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest as PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

class IndexController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post, PostUpdateRequest $request)
    {
        $data = $request->validated();

        $post = $this->service->update($data, $post);



        return view('admin.posts.show', compact('post'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
