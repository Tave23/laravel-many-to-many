<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public function category(){
         
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }


    // dobbiamo rempire i dati dentro l'array attraverso $fillable
    protected $fillable = ['title_post', 'content', 'category_id'];

    public static function createSlug($title_post){

        // creo lo slug del titolo
        $slug = Str::slug($title_post);
        $basic_slug = $slug;

        $if_exist_post = Post::where('slug', $slug)->first();

        // aggiungo il contatore che verra aggiunto alla fine dello slug
        $counter = 1;

        while ($if_exist_post) {
            $slug = $basic_slug . '-' . $counter;
            // aumento il counter
            $counter++;

            $if_exist_post = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
