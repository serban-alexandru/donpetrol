<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $category = new Category;
        $category->name = 'Fingerfoods';
        $category->save();

        $category = new Category;
        $category->name = 'Burgers';
        $category->save();

        $category = new Category;
        $category->name = 'Wheels';
        $category->save();

        $category = new Category;
        $category->name = 'Kids';
        $category->save();

        $category = new Category;
        $category->name = 'Deserts';
        $category->save();

        $category = new Category;
        $category->name = 'Drinks';
        $category->save();

        $category = new Category;
        $category->name = 'Soft';
        $category->category_id = 6;
        $category->save();

        $category = new Category;
        $category->name = 'Beer';
        $category->category_id = 6;
        $category->save();

        $category = new Category;
        $category->name = 'Bubbles & Wine';
        $category->category_id = 6;
        $category->save();

        $category = new Category;
        $category->name = 'Hot';
        $category->category_id = 6;
        $category->save();
    }
}
