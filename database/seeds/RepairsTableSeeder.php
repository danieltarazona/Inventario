<?php

use Illuminate\Database\Seeder;

class RepairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Repair::class, 5)->create()->each(function($repair)
      {
        $provider = App\User::find(2);
        $provider->repair_provider()->save($repair);

        $storer = App\User::find(3);
        $storer->repair_storer()->save($repair);

        $products = App\Product::all()->take(5);

        $state = App\State::find(303);
        $state->product()->saveMany($products);

        $state = App\State::find(401);
        $state->repair()->save($repair);
      });

      echo "Done" . PHP_EOL;
    }
}
