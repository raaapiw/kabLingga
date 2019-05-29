<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReportTableSeeder extends Seeder
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
            DB::table('reports')->insert([     
                'shipping_id' => 1+$index,           
                'name_report' => $faker->company(),
                'field_report' => $faker->address(),   
            ]);
        }
    }
}
