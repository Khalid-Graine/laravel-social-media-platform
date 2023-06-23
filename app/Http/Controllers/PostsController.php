<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    public function index()
    {

        $posts = Posts::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(CreatePostRequest $request)

    {

        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('posts', 'public');
        $validatedData['profile_id'] = Auth::user()->id;

        Posts::create($validatedData);
        return redirect()->route('home')
            ->with('success', 'You have created a new post successfully');
    }


    public function show(Posts $post)
    {

        return view('posts.show', compact('post'));
    }

    public function edit(Posts $post)
    {
        Gate::authorize('update', $post);
        return view('posts.edit', compact('post'));
    }


    public function update(PostRequest $request, Posts $post)
    {
        $data = $request->validate([
            'title' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        } else {
            $data['image'] = $post->image;
        }

        // dd($data);

        $post->update($data);

        return Redirect()->route('home')->with('success', 'you have updated a post successfully');
    }

    public function destroy(posts $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success', 'You have deleted a post successfully');
    }
}
