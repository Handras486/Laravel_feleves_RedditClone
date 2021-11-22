<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Subreddit;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Vote;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subreddits = Subreddit::all();
        return view('posts.create')->with(compact('subreddits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = Auth::user()->posts()->create($request->all());

        return redirect()->route('post.details', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
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

    public function comment(Request $request, Post $post)
    {

        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->message = $request->comment;

        $post->comments()->save($comment);

        return back();
    }

    public function vote(Request $request, Post $post)
    {

        $request->validate([
            'type' => 'required',
        ]);
        
        if (!$post->votes()->where('user_id', Auth::user()->id)->get()->isEmpty()) 
        {
            $post->votes()->where('user_id',Auth::user()->id)->delete();
        }
        else
        {
            $vote = new Vote;
            $vote->user_id = Auth::user()->id;
            $vote->type = $request->type;
    
            $post->votes()->save($vote);
        }

        return back();
    }
}
