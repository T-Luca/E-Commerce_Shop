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
            'imagePath' => 'https://5.grgs.ro/images/products/1/1416562/1469610/normal/ryzen-5-1600x-36ghz-box-c58e8f2d15a2cdc4ad4258fc0a701f3f.jpg',
            'title' => 'AMD Ryzen 5',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 340
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://5.grgs.ro/images/products/1/1169071/1420658/normal/gt200-d7e3679c12224179b24a507bad07a4e7.jpg',
            'title' => 'Asus Gaming Mouse',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 30
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://1.grgs.ro/images/products/1/4/633893/full/elements-portable-1tb-black-b2360930783d0d850f6ecb72d6c68b3e.jpg',
            'title' => 'WG Elements Extern Hard-Disk',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 200
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://img-us1.asus.com/A/show/AW000706/2018/0406/AM0000002/201804AM060000002_15229527080124440040967.jpg!t360x360',
            'title' => 'Asus Gaming Laptop',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 890
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://assets.hardwarezone.com/img/2017/05/asus-zenbook-ux430.jpg',
            'title' => 'Asus Business Laptop',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'price' => 750
        ]);
        $product->save();
    }
}
