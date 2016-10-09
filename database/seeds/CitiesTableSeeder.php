<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $city = factory(App\City::class)->create([
        'name' => 'Kyoto'
      ]);

      $cities = factory(App\City::class, 10)->create([
        'region_id' => 1
      ]);

    }
}
