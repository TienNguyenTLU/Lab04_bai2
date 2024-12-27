<?php

namespace Database\Seeders;

use App\Models\Order_Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class Order_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $order_id = DB::table('orders')->pluck('id')->toArray(); 
        $product_id = DB::table('products')->pluck('id')->toArray();
        $faker = Faker::create();
        foreach(range(start:0,end:9) as $index)
        {
            Order_Detail::create(
                [
                    'order_id' => $order_id[$index % count($order_id)],
                    'product_id'=> $product_id[array_rand($product_id)],
                    'quantity'=> $faker->numberBetween(1,10),
                ]
                );
        }
    }
}
