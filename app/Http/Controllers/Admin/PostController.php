<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
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
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(10);


        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:50',
            'content' => 'required|string',
            'image' => 'url'
        ], [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'La lunghezza minima del titolo è di 5 caratteri.',
            'title.max' => 'La lunghezza massima del titolo è di 50 caratteri.',
            'title.unique' => "Esiste già un post: $request->title."
        ]);

        $data = $request->all();
        $post = new Post();

        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        if (array_key_exists('is_published', $data)) {
            $post->is_published = 1;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('message', 'Post creato con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
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
        $request->validate([
            'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id), 'min:5', 'max:50'],
            'content' => 'required|string',
            'image' => 'nullable|url'
        ], [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'La lunghezza minima del titolo è di 5 caratteri.',
            'title.max' => 'La lunghezza massima del titolo è di 50 caratteri.',
            'title.unique' => "Esiste già un post: $request->title."
        ]);



        $data = $request->all();

        $data['is_published'] = array_key_exists('is_published', $data) ? 1 : 0;

        $data['slug'] = Str::slug($request->title, '-');
        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
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
        return redirect()->route('admin.posts.index')->with('message', "$post->title eliminato con successo.")->with('type', 'success');
    }

    public function toggle(Post $post)
    {
        $post->is_published = !$post->is_published;
        $published = $post->is_published ? 'pubblicato' : 'rimosso';

        $post->save();

        return redirect()->route('admin.posts.index')->with('message', "$post->title $published con successo.")->with('type', 'success');
    }
}
