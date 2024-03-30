<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array('name' => 'Portugal'),
            array('name' => 'Espanha'),
            array('name' => 'França'),
            array('name' => 'Polónia'),
        );

        DB::table('countries')->delete();

        foreach ($countries as $country){
            DB::table('countries')->insert([
                'name' => $country['name'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
