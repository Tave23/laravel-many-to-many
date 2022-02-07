<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            
            $new_post = new Post();

            $new_post->title_post = $faker->sentence();
            $new_post->content = $faker->text();
            $new_post->slug = Post::createSlug($new_post->title_post);
            
            // dump($new_post->slug);

            // fondamentale salvare
            $new_post->save();



        }
    }
}
