<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            Product::create([
                "name"=> $faker->name,
                "description"=> $faker->text,
                "price"=> $faker->randomFloat(2,0,0),
                "quantity"=> $faker->numberBetween(5,10),]);
            }

    }
}
