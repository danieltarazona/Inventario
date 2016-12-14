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
      factory(App\City::class, 100)->create()->each(function($city)
      {
        $region = App\Region::find(1);
        $region->city()->save($city);
      });

      echo "Done" . PHP_EOL;

    }
}
