<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ImageTableSeeder extends Seeder
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
            DB::table('images')->insert([     
                'shipping_id' => 1+$index,           
                'name' => $faker->company(),
                'evidence' => $faker->address(),   
            ]);
        }
    }
}
