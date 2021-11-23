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
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class);
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
     * @param  \Illuminate\Http\PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = Auth::user()->posts()->create($request->all());

        return redirect()
            ->route('post.edit', $post)
            ->with('success', __('Post created successfully'));
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
        $subreddits = Subreddit::orderBy('name')->get();
        return view('posts.edit')->with(compact('post', 'subreddits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $post->update($request->except('_token'));

        dd($post);
        
        return redirect()
            ->route('home', $post)
            ->with('success', __('Post saved successfully'));
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

    public function uploadImage(Request $request, Post $post)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $image = $request->file('image');
        $fileID = uniqid();
        $filename = "posts/{$fileID}.{$image->extension()}";

        Image::make($image)->save(public_path("/uploads/{$filename}"));

        $post->image = $filename;
        $post->save();

        return response()->json(['image' => $post->image ]);
    }

    protected function resourceAbilityMap()
    {
        $abilityMap = parent::resourceAbilityMap();

        $abilityMap['uploadImage'] = 'update';
        $abilityMap['vote'] = 'view';
        $abilityMap['comment'] = 'view';

        return $abilityMap;
    }
}
