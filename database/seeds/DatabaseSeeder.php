<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $rol = factory(App\Rol::class)->create(['name' => 'User']);

    $user = factory(App\User::class)->create([
      'username' => 'User',
      'email' => 'user@user.com',
      'password' => bcrypt("123456"),
    ]);

    $rol->user()->save($user);

    $rol = factory(App\Rol::class)->create(['name' => 'Storer']);

    $user = factory(App\User::class)->create([
      'username' => 'Storer',
      'email' => 'storer@storer.com',
      'password' => bcrypt("123456"),
    ]);

    $rol->user()->save($user);

    $rol = factory(App\Rol::class)->create(['name' => 'Admin']);

    $user = factory(App\User::class)->create([
      'username' => 'Administrator',
      'email' => 'admin@admin.com',
      'password' => bcrypt("123456"),
    ]);

    $region = factory(App\Region::class)->create(['name' => 'Detroit']);
    $city = factory(App\City::class)->create(['name' => 'Kyoto']);
    $store = factory(App\Store::class)->create(['name' => 'Shibuya']);
    $state = factory(App\State::class)->create(['name' => 'Active']);

    $region->city()->save($city);
    $city->store()->save($store);
    $store->user()->save($user);
    $rol->user()->save($user);
    $state->user()->save($user);

    $log = factory(App\Log::class)->create(['name' => 'Login']);
    $comment = factory(App\Comment::class)->create(['name' => 'Awesome']);
    $issue = factory(App\Issue::class)->create(['name' => 'Error']);
    $user->log()->save($log);
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


    factory(App\Product::class, 10)->create()->each(function($product)
    {
      $category = App\Category::find(1);
      $provider = App\Provider::find(1);
      $store = App\Store::find(1);
      $maintenance = App\Maintenance::find(1);
      $state = App\State::find(1);
      $user = App\User::find(1);

      $category->product()->save($product);
      $provider->product()->save($product);
      $store->product()->save($product);
      $maintenance->product()->save($product);
      $state->product()->save($product);

      $cart = factory(App\Cart::class)->create();
      $product->cart()->save($cart);
      $user->cart()->save($cart);

      $order = factory(App\Order::class)->create();
      $cart->order()->save($order);
      $state->order()->save($order);
      $user->order()->save($order);

      $sale = factory(App\Sale::class)->create();
      $order->sale()->save($sale);
      $user->sale()->save($sale);
      $state->sale()->save($sale);
    });
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
      $rol = App\Rol::find(1);
      $store->user()->save($user);
      $state->user()->save($user);
      $rol->user()->save($user);
    });
    $logs = factory(App\Log::class, 10)->create()->each(function($log)
    {
      $user = App\User::find(1);
      $user->log()->save($log);
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
