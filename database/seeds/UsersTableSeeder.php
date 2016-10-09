<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $user = factory(App\User::class)->create([
        'username' => 'Daniel',
        'email' => 'user@user.com',
        'password' => bcrypt("123456"),
        'role_id' => 1,
        'cart_id' => 1,
        'state_id' => 200
      ]);

      $user = factory(App\User::class)->create([
        'username' => 'Apple',
        'email' => 'provider@provider.com',
        'password' => bcrypt("123456"),
        'role_id' => 2,
        'cart_id' => 2,
        'state_id' => 200
      ]);

      $user = factory(App\User::class)->create([
        'username' => 'Jesus',
        'email' => 'storer@storer.com',
        'password' => bcrypt("123456"),
        'role_id' => 3,
        'cart_id' => 3,
        'state_id' => 200
      ]);

      $user = factory(App\User::class)->create([
        'username' => 'Carlos',
        'email' => 'admin@admin.com',
        'password' => bcrypt("123456"),
        'role_id' => 4,
        'cart_id' => 4,
        'state_id' => 200
      ]);

      $users = factory(App\User::class, 10)->create([
        'store_id' => 1,
        'role_id' => 1,
        'state_id' => 200,
      ])->each(function($user)
      {
        $cart = App\Cart::create();
        $user->cart()->save($cart);
      });
    }
}
