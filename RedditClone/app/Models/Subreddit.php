<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subreddit extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function getbgImageAttribute() {
        if ( $this->attributes['bgimage'] != null) {
            return "/uploads/{$this->bgimage}";
        }
        return 'https://via.placeholder.com/2000';
    }
}
