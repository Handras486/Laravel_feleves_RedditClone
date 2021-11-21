<?php

namespace Database\Seeders;

use App\Models\Subreddit;
use Illuminate\Database\Seeder;

class SubredditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subreddit::create(['name' => 'pics']);
        Subreddit::create(['name' => 'AskReddit']);
        Subreddit::create(['name' => 'todayilearned']);
        Subreddit::create(['name' => 'gifs']);
        Subreddit::create(['name' => 'gaming']);
        Subreddit::create(['name' => 'funny']);
    }
}
