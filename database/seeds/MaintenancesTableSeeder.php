<?php

use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Maintenance::class, 3)->create()->each(function($maintenance)
      {
        $provider = App\User::find(2);
        $provider->maintenance_provider()->save($maintenance);

        $storer = App\User::find(3);
        $storer->maintenance_storer()->save($maintenance);

        $products = App\Product::all()->take(5);

        $state = App\State::find(303);
        $state->product()->saveMany($products);

        $state = App\State::find(401);
        $state->maintenance()->save($maintenance);

        $maintenance->product()->saveMany($products);
      });

      echo "Done" . PHP_EOL;
    }
}
