<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $user = factory(App\User::class)->create([
      'username' => 'Administrator',
      'email' => 'admin@admin.com',
      'password' => bcrypt("123456"),
    ]);

    $category = factory(App\Category::class)->create(['name' => 'Notebook']);
    $state = factory(App\State::class)->create(['name' => 'Active']);
    $region = factory(App\Region::class)->create(['name' => 'Detroit']);
    factory(App\City::class)->create(['name' => 'Kyoto']);
    factory(App\Log::class)->create(['name' => 'Login']);
    $provider = factory(App\Provider::class)->create(['name' => 'Apple']);
    factory(App\Comment::class)->create(['name' => 'Awesome']);
    factory(App\Issue::class)->create(['name' => 'Error']);
    $store = factory(App\Store::class)->create(['name' => 'Shibuya']);
    $product = factory(App\Product::class)->create(['name' => 'MacBook']);
    $maintenance = factory(App\Maintenance::class)->create(['name' => 'OSX']);
    factory(App\Rol::class)->create(['name' => 'User']);
    factory(App\Rol::class)->create(['name' => 'Storer']);
    factory(App\Rol::class)->create(['name' => 'Admin']);
    $order = factory(App\Order::class)->create();
    factory(App\Sale::class)->create();

    $category->product()->save($product);
    $provider->product()->save($product);
    $store->product()->save($product);
    $maintenance->product()->save($product);
    $state->product()->save($product);
    $order->product()->save($product);

    $cities = factory(App\City::class, 10)->create();
    $cities->each(function($city) {
      $region = App\Region::find(1);
      $region->city()->save($city);
    });

    $stores = factory(App\Store::class, 10)->create();
    $stores->each(function($store) {
      $city = App\City::find(1);
      $city->store()->save($store);
    });

    $users = factory(App\User::class, 10)->create();
    $users->each(function($user) {
      $store = App\Store::find(1);
      $state = App\State::find(1);
      $rol = App\Rol::find(1);
      $store->user()->save($user);
      $state->user()->save($user);
      $rol->user()->save($user);
    });
  }
}
