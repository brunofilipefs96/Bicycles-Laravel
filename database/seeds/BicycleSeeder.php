<?php

use App\Bicycle;
use App\Person;
use Illuminate\Database\Seeder;

class BicycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Bicycle::class, 200)->create();
        $people=Person::all();

        foreach ($people as $person) {
            factory(Bicycle::class, 2)->create([
                'person_id' => $person->id,
            ]);
        }
    }
}
