<?php

// model
use App\Category;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // lista di categorie
        $data_categ = [
            'HTML',
            'CSS',
            'PHP',
            'JavaScript'
        ];

        foreach ($data_categ as $category) {
            
            // assicurarsi abbia importato il model
            $new_category = new Category();

            $new_category->name = $category;
            $new_category->slug = Str::slug($new_category->name, '-');

            // salviamo
            $new_category->save();
        }

    }
}
