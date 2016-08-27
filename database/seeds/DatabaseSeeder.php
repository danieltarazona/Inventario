<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    factory(App\User::class)->create([
      'username' => 'Administrator',
      'email' => 'admin@admin.com',
      'password' => bcrypt("123456"),
    ]);

    factory(App\Category::class)->create(['name' => 'Notebook']);
    factory(App\State::class)->create(['name' => 'Active']);
    factory(App\Region::class)->create(['name' => 'Detroit']);
    factory(App\City::class)->create(['name' => 'Kyoto']);
    factory(App\Log::class)->create(['name' => 'Login']);
    factory(App\Provider::class)->create(['name' => 'Apple']);
    factory(App\Comment::class)->create(['name' => 'Awesome']);
    factory(App\Issue::class)->create(['name' => 'Error']);
    factory(App\Store::class)->create(['name' => 'Shibuya']);
    factory(App\Product::class)->create(['name' => 'MacBook']);
    factory(App\Maintenance::class)->create(['name' => 'OSX']);
    factory(App\Rol::class)->create(['name' => 'User']);
    factory(App\Rol::class)->create(['name' => 'Storer']);
    factory(App\Rol::class)->create(['name' => 'Admin']);
    factory(App\Order::class)->create();
    factory(App\Sale::class)->create();
  }
}
