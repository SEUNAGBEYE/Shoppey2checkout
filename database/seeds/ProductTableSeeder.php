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
        DB::table('products')->insert([
        'item'=>'fanta',
        'price'=>150,
        ]);

        DB::table('products')->insert([
        'item'=>'coke',
        'price'=>150,
        ]);

        DB::table('products')->insert([
        'item'=>'sprite',
        'price'=>150,
        ]);

        DB::table('products')->insert([
        'item'=>'pepsi',
        'price'=>150,
        ]);

        DB::table('products')->insert([
        'item'=>'lemonade',
        'price'=>150,
        ]);
    }
}
