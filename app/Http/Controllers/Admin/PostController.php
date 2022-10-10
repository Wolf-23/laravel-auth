<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'media' => 'required|max:255|url',
                'author' => ['required', Rule::in(['Simone Giusti', 'Alessio Vietri', 'Jacopo Damiani'])],
                'content' => 'required|max:65535',
                'slug' => 'required|max:255|',
            ]
            );
            $data = $request->all();
            $post = new Post;
            $post->fill($data);
            $post->save();
            return redirect()->route('admin.posts.index')->with('status', 'Post creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'media' => 'required|max:255|url',
                'author' => ['required', Rule::in(['Simone Giusti', 'Alessio Vietri', 'Jacopo Damiani'])],
                'content' => 'required|max:65535',
                'slug' => 'required|max:255|',
            ]
        );
        $data = $request->all();
        $post->update($data);
        $post->save();
        return redirect()->route('admin.posts.index', ['post' => $post])->with('status', 'La modifica al post è stata apportata!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', 'Il post è stato eliminato!');
    }
}
