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
        	'categoryID' => 1,
            'longDescription' =>'It’s faster and more powerful than before, yet remarkably thinner and lighter. It has the brightest, most colorful Mac notebook display ever. And it introduces the Touch Bar — a Multi-Touch enabled strip of glass built into the keyboard for instant access to the tools you want, right when you want them. The new MacBook Pro is built on groundbreaking ideas. And it’s ready for yours.'
        	]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://i3.mirror.co.uk/incoming/article8789867.ece/ALTERNATES/s1200/iPhone-7.jpg',
            'title' => 'iPhone 7',
            'description'=> 'Brand new iPhone 7',
            'price' => 6000,
            'categoryID' => 2
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51DN-GWdYWL.jpg',
            'title' => 'iPhone 6S',
            'description'=> 'Great performance and new touch bar.',
            'price' => 6000,
            'categoryID' => 3
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
