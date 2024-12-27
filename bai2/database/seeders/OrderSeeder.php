<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       
        $customer_id = DB::table('customers')->pluck('id')->toArray();
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            Order::create([
                "order_date"=> $faker->date,
                "status"=> $faker->boolean(),
                "customer_id" => $customer_id[array_rand($customer_id)],
                ]);
            }
            
    }
}
