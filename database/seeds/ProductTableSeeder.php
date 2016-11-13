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
        	'imagePath' => 'http://images.techtimes.com/data/images/full/251027/macbook-pro-2016-concept.jpg',
        	'title' => 'MacBook Pro 2016',
        	'description'=> 'Great performance and new touch bar.',
        	'price' => 6000,
        	'categoryID' => 1
        	]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://i3.mirror.co.uk/incoming/article8789867.ece/ALTERNATES/s1200/iPhone-7.jpg',
            'title' => 'iPhone 7',
            'description'=> 'Brand new iPhone 7',
            'price' => 6000,
            'categoryID' => 1
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51DN-GWdYWL.jpg',
            'title' => 'iPhone 6S',
            'description'=> 'Great performance and new touch bar.',
            'price' => 6000,
            'categoryID' => 1
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://s5emagst.akamaized.net/products/478/477523/images/res_ccb4ba4de177a454b7f575a8988f35b5_full.jpg',
            'title' => 'iPhone 5S',
            'description'=> 'Old',
            'price' => 6000,
            'categoryID' => 1
        ]);
        $product->save();
    }
}
