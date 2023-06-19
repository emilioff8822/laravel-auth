<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = 'asc';
        $posts= Post::orderBy('id', $direction)->paginate(10);
        return view('admin.posts.index', compact('posts','direction'));
    }

    public function orderby ($direction){
        $direction = $direction == 'asc' ? 'desc' : 'asc';
        $posts= Post::orderBy('id', $direction)->paginate(10);
        return view('admin.posts.index', compact('posts', 'direction'));
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
    public function store(PostRequest $request)
    {
        $form_data= $request->all();
        $form_data['slug'] = Post::generateSlug($form_data['title']);
        $form_data['date'] = date('Y-m-d');

        //verifico se e' stata caricata un immagine
        if(array_key_exists('image', $form_data)){

            //prima di salvare l'immagine salvo il nome
         $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
         //salvo l'immagine nella cartella uploads ed in $form_data['image_path'] salvo il percorso
        $form_data['image_path'] = Storage::put('uploads', $form_data['image']);



        }

        $new_post = new Post();
        $new_post->fill($form_data);

        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    $date = date_create($post->date);
    $date_formatted = date_format($date, 'd/m/Y');
    return view('admin.posts.show', compact('post', 'date_formatted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}