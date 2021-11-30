<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $reply = new Comment;
        $reply->message = $request->message;
        $reply->user_id = Auth::user()->id;

        $comment->replies()->save($reply);

        if ($request->redirect_url) {
            return redirect($request->redirect_url)
                ->with('success', __('Reply created successfully'));
        }

        return back()
            ->with('success', __('Reply created successfully'));
    }

    public function vote(Request $request, Comment $comment)
    {

        $request->validate([
            'type' => 'required',
        ]);

        if (!$comment->votes()->where('user_id', Auth::user()->id)->get()->isEmpty()) 
        {
            $comment->votes()->where('user_id',Auth::user()->id)->delete();
        }
        else
        {
            $vote = new Vote;
            $vote->user_id = Auth::user()->id;
            $vote->type = $request->type;
    
            $comment->votes()->save($vote);
        }

        return back();
    }
}
