<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagepath' => 'https://krebsonsecurity.com/wp-content/uploads/2014/08/loremipsum.png',
        	'title' => 'loremipsum',
        	'description' =>'loremmmmmmmmmmmmmm',
        	'price' => 23
        	]);
        $product->save();
    }
}
