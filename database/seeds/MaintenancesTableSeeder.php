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
      $maintenances = factory(App\Maintenance::class, 3)->create()->each(function($maintenance)
      {
        $user = App\User::find(1);
        $user->maintenance()->save($maintenance);

        $state = App\State::find(401);
        $state->maintenance()->save($maintenance);

        $products = factory(App\Product::class, 3)->create()->each(function($product)
        {
          $state = App\State::find(300);
          $state->product()->attach($product, ['quantity' => $product->stock]);
        });

        $maintenance->product()->attach($products, ['quantity' => 10]);

        $state = App\State::find(303);
        $state->product()->attach($products, ['quantity' => 10]);
      });

      echo "Done" . PHP_EOL;
    }
}
