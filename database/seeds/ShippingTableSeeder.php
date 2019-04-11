<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach(range(0,10) as $index){
            DB::table('shippings')->insert([     
                'client_id' => 1+$index,           
                'tongkang' => $faker->company(),
                'loading_plan' => $faker->address(),   
                'quantity' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tax_proof' => $faker->address(),
                'packing_list' => $faker->address(),                       
            ]);
        }
    }
}
