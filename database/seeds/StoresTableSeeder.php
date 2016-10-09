<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $store = factory(App\Store::class)->create(['name' => 'Shibuya']);

      $stores = factory(App\Store::class, 10)->create()->each(function($store)
      {
        $city = App\City::find(1);
        $city->store()->save($store);
      });
    }
}
