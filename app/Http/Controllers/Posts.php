<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Posts extends Controller
{
    /*    Display a listing of the resource*/
    public function index()
    {
       $posts = Post::all();


       return view('posts.index', [
           'posts' => $posts,
       ]);
    }

    /*    Show the form for creating a new resource.*/
    public function create()
    {
      return view('posts.create');
    }

    /*     Store a newly created resource in storage */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:64',
            'content' => 'required|min:10|max:500',
        ]);
//        dd($validated);

        $post = Post::create($validated );

        return redirect("/posts/{$post->id}");
    }

    /*     Display the specified resource. */

    public function show(string $id)
    {
        $posts = Post::findOrFail($id);
//        dump($posts);

        return view('posts.show', [
            'post'=>$posts
        ]);
    }

    /*  Show the form for editing the specified resource*/
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /*  Update the specified resource in storage.*/
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|min:5|max:64',
            'content' => 'required|min:10|max:500',
        ]);

        $post->update($validated);

        return redirect()->route('posts.show', [ $post->id ]);
    }

    /* Remove the specified resource from storage.*/
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
