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
        $category->name = 'Drinks';
        $category->save();

        $category = new Category;
        $category->name = 'Snacks';
        $category->save();

        $category = new Category;
        $category->name = 'Burgers';
        $category->save();

    }
}
