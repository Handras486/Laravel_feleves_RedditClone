<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function commentable() {
        return $this->morphTo();
    }

    public function replies() {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc'); //TODO itt orderby score később
    }

    public function votes() {
        return  $this->morphMany(Vote::class, 'voteable');
    }

    public function getScoreAttribute() {
        return $this->votes()->where('type','True')->count() - $this->votes()->where('type','False')->count();
    }
}
