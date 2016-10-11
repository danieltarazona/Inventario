<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Product::class, 10)->create()->each(function($product)
      {
        $category = App\Category::find(1);
        $category->product()->save($product);

        $store = App\Store::find(1);
        $store->product()->save($product);

        $state = App\State::find(200);
        $state->product()->save($product);

        $region = App\Region::find(1);
        $region->product()->save($product);

        $city = App\City::find(1);
        $city->product()->save($product);

        $provider = App\User::find(2);
        $provider->product()->save($product);
      });

      echo "Done" . PHP_EOL;
    }
}
