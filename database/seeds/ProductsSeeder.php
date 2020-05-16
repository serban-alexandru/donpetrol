<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $product = new Product; 
        $product->name = 'Coca Cola 0.5L';
        $product->category_id = 1; // drinks
        $product->price = 2;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        $product = new Product; 
        $product->name = 'Sprite 0.5L';
        $product->category_id = 1; // drinks
        $product->price = 2;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        $product = new Product; 
        $product->name = 'Fanta 0.5L';
        $product->category_id = 1; // drinks
        $product->price = 2;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        $product = new Product; 
        $product->name = '7UP 0.5L';
        $product->category_id = 1; // drinks
        $product->price = 2;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        $product = new Product; 
        $product->name = 'Water 0.5L';
        $product->category_id = 1; // drinks
        $product->price = 2;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        $product = new Product; 
        $product->name = 'Lemonade 0.3L';
        $product->category_id = 1; // drinks
        $product->price = 2;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // BURGERS
        $product = new Product; 
        $product->name = 'Burger 1';
        $product->category_id = 2;
        $product->price = 15.5;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // BURGERS
        $product = new Product; 
        $product->name = 'Burger 2';
        $product->category_id = 2;
        $product->price = 25;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // BURGERS
        $product = new Product; 
        $product->name = 'Burger 3';
        $product->category_id = 2;
        $product->price = 10;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // BURGERS
        $product = new Product; 
        $product->name = 'Burger 4';
        $product->category_id = 2;
        $product->price = 15.5;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // KIDS FOOD
        $product = new Product; 
        $product->name = 'Small Burger 1';
        $product->category_id = 3;
        $product->price = 7;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // KIDS FOOD
        $product = new Product; 
        $product->name = 'Kids menu';
        $product->category_id = 3;
        $product->price = 10;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // KIDS FOOD
        $product = new Product; 
        $product->name = 'Small Burger 2';
        $product->category_id = 3;
        $product->price = 12.9;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // KIDS FOOD
        $product = new Product; 
        $product->name = 'Small Burger 3';
        $product->category_id = 3;
        $product->price = 7.5;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // KIDS FOOD
        $product = new Product; 
        $product->name = 'Small Burger 4';
        $product->category_id = 3;
        $product->price = 17;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // DESERTS
        $product = new Product; 
        $product->name = 'Ice Cream 1';
        $product->category_id = 4;
        $product->price = 3;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // DESERTS
        $product = new Product; 
        $product->name = 'Ice Cream 2';
        $product->category_id = 4;
        $product->price = 4.5;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // DESERTS
        $product = new Product; 
        $product->name = 'Cheese cake';
        $product->category_id = 4;
        $product->price = 3.5;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();
        
        // DESERTS
        $product = new Product; 
        $product->name = 'Secret Desert';
        $product->category_id = 4;
        $product->price = 5.5;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();

        // DESERTS
        $product = new Product; 
        $product->name = 'Hot chocolate';
        $product->category_id = 4;
        $product->price = 7;
        $product->description = 'Product description';
        // pos  details 
        $product->table_number = '';
        $product->table_part= '';
        $product->article_id= '';
        $product->article_number= '';
        $product->article_name= '';
        $product->department_id= '';
        $product->department_number= '';
        $product->department_name= '';
        $product->group_name= '';
        $product->category_name= '';
        $product->save();
    }
}
