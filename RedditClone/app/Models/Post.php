<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'content', 
        'subreddit_id',
        'score'
    ];

    public function subreddit() {
        return $this->belongsTo(Subreddit::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }

    public function votes() {
        return  $this->morphMany(Vote::class, 'voteable');
    }

    public function score() {
        return $this->votes()->where('type','True')->count() - $this->votes()->where('type','False')->count();
    }
}
