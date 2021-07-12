<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    var $message = [];

    public function index()
    {
        //
        $posts = Post::get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
            'image_url' => 'required|image',
            'content' => 'required'
        ]);

        $this->message['message'] = 'Something went wrong with image upload';

        $post_ = new Post($request->except('image_url'));
        if (!empty($request->file('image_url'))) {
            $imagePath = $request->file('image_url')->store('posts');
            $user = Auth::user();
            $post_->image_url = $imagePath;
            $saved = $user->post()->save($post_);

            $retVal = ($saved) ? 'Successful created' : 'Something went wrong';
            $this->message['message'] = $retVal;
            $this->message['status'] = $saved;
        }
        

        return ($this->message['status']) ? redirect()->back()->with('success', $this->message['message']) : redirect()->back()->with('error', $this->message['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function posts(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return PostResource::collection($posts);
    }
}
