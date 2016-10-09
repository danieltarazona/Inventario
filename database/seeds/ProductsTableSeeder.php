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
      factory(App\Product::class, 3)->create()->each(function($product)
      {
        $category = App\Category::find(1);
        $store = App\Store::find(1);
        $region = App\Region::find(1);
        $city = App\City::find(1);

        $region->product()->save($product);
        $city->product()->save($product);
        $category->product()->save($product);
        $store->product()->save($product);

        $state = App\State::find(300);
        $state->product()->attach($product, ['quantity' => $product->stock]);
      });
    }
}
