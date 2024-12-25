<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index) {
            $customer = Customer::create([
                "name"=> $faker->name,
                "email"=> $faker->email,
                "phone"=> $faker->phoneNumber,
                "address"=> $faker->text(200),
            ]);}
                
                
    }
}
