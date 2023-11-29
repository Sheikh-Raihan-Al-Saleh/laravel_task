<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = new Product();
        $products->name = 'Iphone 12';
        $products->price = '70000';
        $products->quantity=10;

        $products->save();
        
            
    }
}
