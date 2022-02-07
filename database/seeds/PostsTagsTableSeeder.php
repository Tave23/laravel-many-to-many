<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
           
            // prendo random un post da abbinare ad uno o più tag
            $post = Post::inRandomOrder()->first();
            $tag_id = Tag::inRandomOrder()->first()->id;

            $post->tags()->attach($tag_id);
        }
    }
}
