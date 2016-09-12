<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
  public function run()
  {
    factory(App\Role::class)->create(['name' => 'User']);
    factory(App\Role::class)->create(['name' => 'Provider']);
    factory(App\Role::class)->create(['name' => 'Storer']);
    factory(App\Role::class)->create(['name' => 'Administrator']);

    factory(App\State::class)->create(['id' => 200, 'name' => 'Active']);
    factory(App\State::class)->create(['id' => 201, 'name' => 'Inactive']);

    factory(App\State::class)->create(['id' => 300, 'name' => 'Available']);
    factory(App\State::class)->create(['id' => 301, 'name' => 'On-Order']);
    factory(App\State::class)->create(['id' => 302, 'name' => 'On-Loan']);
    factory(App\State::class)->create(['id' => 303, 'name' => 'On-Maintenance']);
    factory(App\State::class)->create(['id' => 304, 'name' => 'Damage']);

    factory(App\State::class)->create(['id' => 400, 'name' => 'Complete']);
    factory(App\State::class)->create(['id' => 401, 'name' => 'Waiting']);
    factory(App\State::class)->create(['id' => 402, 'name' => 'Returned']);
    factory(App\State::class)->create(['id' => 403, 'name' => 'Cancelled']);
    factory(App\State::class)->create(['id' => 404, 'name' => 'Product or Products Not Found']);

    $user = factory(App\User::class)->create([
      'username' => 'Daniel',
      'email' => 'user@user.com',
      'password' => bcrypt("123456"),
      'role_id' => 1,
    ]);

    $user = factory(App\User::class)->create([
      'username' => 'Apple',
      'email' => 'provider@provider.com',
      'password' => bcrypt("123456"),
      'role_id' => 2,
    ]);

    $user = factory(App\User::class)->create([
      'username' => 'Jesus',
      'email' => 'storer@storer.com',
      'password' => bcrypt("123456"),
      'role_id' => 3,
    ]);

    $user = factory(App\User::class)->create([
      'username' => 'Carlos',
      'email' => 'admin@admin.com',
      'password' => bcrypt("123456"),
      'role_id' => 4,
    ]);

    $state = App\State::find(200);
    $state->user()->save($user);

    #$role->user()->save($user);
    $region = factory(App\Region::class)->create(['name' => 'Detroit']);
    $city = factory(App\City::class)->create(['name' => 'Kyoto']);
    $region->city()->save($city);

    $store = factory(App\Store::class)->create(['name' => 'Shibuya']);
    $store->user()->save($user);
    $city->store()->save($store);

    $category = factory(App\Category::class)->create(['name' => 'Notebook']);

    $comment = factory(App\Comment::class)->create(['name' => 'Awesome']);
    $issue = factory(App\Issue::class)->create(['name' => 'Error']);
    $user->comment()->save($comment);
    $issue->comment()->save($comment);

    $cities = factory(App\City::class, 10)->create()->each(function($city)
    {
      $region = App\Region::find(1);
      $region->city()->save($city);
    });

    $stores = factory(App\Store::class, 10)->create()->each(function($store)
    {
      $city = App\City::find(1);
      $city->store()->save($store);
    });

    $users = factory(App\User::class, 10)->create()->each(function($user)
    {
      $store = App\Store::find(1);
      $state = App\State::find(200);
      $role = App\Role::find(1);
      $store->user()->save($user);
      $state->user()->save($user);
      $role->user()->save($user);
      $cart = factory(App\Cart::class)->create();
      $user->cart()->save($cart);
    });

    $maintenances = factory(App\Maintenance::class, 3)->create()->each(function($maintenance)
    {
      $user = App\User::find(1);
      $user->maintenance()->save($maintenance);

      $state = App\State::find(401);
      $state->maintenance()->save($maintenance);

      $product = factory(App\Product::class, 3)->create()->each(function($product)
      {
        $state = App\State::find(300);
        $state->product()->attach($product, ['quantity' => $product->stock]);
      });

      $maintenance->product()->attach($product, ['quantity' => 10]);

      $state = App\State::find(303);
      $state->product()->attach($product, ['quantity' => 10]);
    });

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

      $user = App\User::find(1);
      $cart = App\Cart::find(1);
      $user->cart()->save($cart);
      $cart->product()->save($product);

      $order = factory(App\Order::class)->create();
      $cart->order()->save($order);
      $state = App\State::find(401);
      $state->order()->save($order);

      $sale = factory(App\Sale::class)->create();
      $order->sale()->save($sale);
      $user->sale()->save($sale);
      $state->sale()->save($sale);
    });

    $comments = factory(App\Comment::class, 10)->create()->each(function($comment)
    {
      $user = App\User::find(1);
      $issue = App\Issue::find(1);
      $user->comment()->save($comment);
      $issue->comment()->save($comment);
    });

    $issues = factory(App\Issue::class, 10)->create()->each(function($issue)
    {
      $user = App\User::find(1);
      $user->issue()->save($issue);
    });
  }
}
