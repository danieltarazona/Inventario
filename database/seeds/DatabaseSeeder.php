<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $role = factory(App\Role::class)->create(['name' => 'User']);

    $user = factory(App\User::class)->create([
      'username' => 'User',
      'email' => 'user@user.com',
      'password' => bcrypt("123456"),
    ]);

    $role->user()->save($user);

    $role = factory(App\Role::class)->create(['name' => 'Storer']);

    $user = factory(App\User::class)->create([
      'username' => 'Storer',
      'email' => 'storer@storer.com',
      'password' => bcrypt("123456"),
      'role_id' => 2,
    ]);

    $role->user()->save($user);

    $role = factory(App\Role::class)->create(['name' => 'Admin']);

    $user = factory(App\User::class)->create([
      'username' => 'Administrator',
      'email' => 'admin@admin.com',
      'password' => bcrypt("123456"),
      'role_id' => 3,
    ]);


    $region = factory(App\Region::class)->create(['name' => 'Detroit']);
    $city = factory(App\City::class)->create(['name' => 'Kyoto']);
    $region->city()->save($city);

    $store = factory(App\Store::class)->create(['name' => 'Shibuya']);
    $store->user()->save($user);
    $city->store()->save($store);

    $state = factory(App\State::class)->create(['name' => 'Active']);
    $state->user()->save($user);

    $comment = factory(App\Comment::class)->create(['name' => 'Awesome']);
    $issue = factory(App\Issue::class)->create(['name' => 'Error']);
    $user->comment()->save($comment);
    $issue->comment()->save($comment);

    $provider = factory(App\Provider::class)->create(['name' => 'Apple']);
    $category = factory(App\Category::class)->create(['name' => 'Notebook']);
    $product = factory(App\Product::class)->create(['name' => 'MacBook']);
    $maintenance = factory(App\Maintenance::class)->create(['name' => 'OSX']);
    $category->product()->save($product);
    $provider->product()->save($product);
    $store->product()->save($product);
    $maintenance->product()->save($product);
    $user->maintenance()->save($maintenance);
    $state->maintenance()->save($maintenance);
    $state->product()->save($product);

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
      $state = App\State::find(1);
      $role = App\Role::find(1);
      $store->user()->save($user);
      $state->user()->save($user);
      $role->user()->save($user);
      $cart = factory(App\Cart::class)->create();
      $user->cart()->save($cart);
    });

    factory(App\Product::class, 10)->create()->each(function($product)
    {
      $category = App\Category::find(1);
      $provider = App\Provider::find(1);
      $store = App\Store::find(1);
      $maintenance = App\Maintenance::find(1);
      $state = App\State::find(1);
      $user = App\User::find(1);
      $cart = App\Cart::find(1);

      $category->product()->save($product);
      $provider->product()->save($product);
      $store->product()->save($product);
      $maintenance->product()->save($product);
      $state->product()->save($product);

      $user->cart()->save($cart);
      $cart->product()->save($product);

      $order = factory(App\Order::class)->create();
      $cart->order()->save($order);
      $state->order()->save($order);

      $sale = factory(App\Sale::class)->create();
      $order->sale()->save($sale);
      $user->sale()->save($sale);
      $state->sale()->save($sale);
    });

    $maintenances = factory(App\Maintenance::class, 10)->create()->each(function($maintenance)
    {
      $user = App\User::find(1);
      $state = App\State::find(1);
      $state->maintenance()->save($maintenance);
      $user->maintenance()->save($maintenance);
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
