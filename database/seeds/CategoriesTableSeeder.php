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
        
        // $category = new Category;
        // $category->name = 'Fingerfoods';
        // $category->description = 'description';
        // $category->icon = 'fas fa-drumstick-bite';
        // $category->save();

        $category = new Category;
        $category->name = 'Drinks';
        $category->description = 'description';
        $category->icon = 'fas fa-glass-whiskey';
        $category->save();

        $category = new Category;
        $category->name = 'Burgers';
        $category->description = 'description';
        $category->icon = 'fas fa-hamburger';
        $category->save();

        // $category = new Category;
        // $category->name = 'Wheels';
        // $category->description = 'description';
        // $category->icon = 'fas fa-dharmachakra';
        // $category->save();

        $category = new Category;
        $category->name = 'Kids';
        $category->description = 'description';
        $category->icon = 'fas fa-child';
        $category->save();

        $category = new Category;
        $category->name = 'Deserts';
        $category->description = 'description';
        $category->icon = 'fas fa-ice-cream';
        $category->save();

        // $category = new Category;
        // $category->name = 'Soft';
        // $category->description = 'description';
        // $category->icon = 'fas fa-glass-whiskey';
        // $category->category_id = 6;
        // $category->save();

        // $category = new Category;
        // $category->name = 'Beer';
        // $category->description = 'description';
        // $category->icon = 'fas fa-beer';
        // $category->category_id = 6;
        // $category->save();

        // $category = new Category;
        // $category->name = 'Bubbles & Wine';
        // $category->description = 'description';
        // $category->icon = 'fas fa-wine-bottle';
        // $category->category_id = 6;
        // $category->save();

        // $category = new Category;
        // $category->name = 'Hot';
        // $category->description = 'description';
        // $category->icon = 'fas fa-mug-hot';
        // $category->category_id = 6;
        // $category->save();
    }
}
