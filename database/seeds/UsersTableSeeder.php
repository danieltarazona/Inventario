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
      factory(App\User::class)->create([
        'username' => 'Daniel',
        'email' => 'user@user.com',
        'password' => bcrypt("123456"),
        'role_id' => 1,
        'store_id' => 1,
        'cart_id' => 1,
        'state_id' => 200
      ]);

      factory(App\User::class)->create([
        'username' => 'Apple',
        'email' => 'provider@provider.com',
        'password' => bcrypt("123456"),
        'role_id' => 2,
        'store_id' => 1,
        'cart_id' => 2,
        'state_id' => 200
      ]);

      factory(App\User::class)->create([
        'username' => 'Jesus',
        'email' => 'storer@storer.com',
        'password' => bcrypt("123456"),
        'role_id' => 3,
        'store_id' => 1,
        'cart_id' => 3,
        'state_id' => 200
      ]);

      factory(App\User::class)->create([
        'username' => 'Carlos',
        'email' => 'admin@admin.com',
        'password' => bcrypt("123456"),
        'role_id' => 4,
        'store_id' => 1,
        'cart_id' => 4,
        'state_id' => 200
      ]);

      $users = factory(App\User::class, 10)->create()->each(function($user)
      {
        $state = App\State::find(200);
        $state->user()->save($user);

        $role = App\Role::find(1);
        $role->user()->save($user);

        $store = App\Store::find(1);
        $store->user()->save($user);

        $cart = App\Cart::create();
        $cart->user()->save($user);
      });

      echo "Done" . PHP_EOL;

    }
}
