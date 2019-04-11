<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientTableSeeder extends Seeder
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
            DB::table('clients')->insert([     
                'user_id' => 12+$index,           
                'nama_PT' => $faker->company(),
                'no_iup' => $faker->address(),   
                'iup_expired' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'npwp' => $faker->address(),
                'tdp_nib' => $faker->address(),
                       
            ]);
        }
    }
}
