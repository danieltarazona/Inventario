<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rol = new App\Rol;
      $rol->name = "User";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Buyer";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Client";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Reseller";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Seller";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Storer";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Admin";
      $rol->save();


      $user = new App\User;
      $user->username = "User";
      $user->dni = 777777;
      $user->email = "user@user.com";
      $user->first_name = "Daniel";
      $user->last_name = "Felipe";
      $user->first_lastname = "Tarazona";
      $user->last_lastname = "Vasquez";
      $user->adress = "CR 2 Oeste 9 65";
      $user->telephone = "777777";
      $user->cellphone = "3158375156";
      $user->password = bcrypt("123456");
      $user->url = "/Profile/Image.png";
      $user->save();

      $rol = App\Rol::find(1);
      $rol->users()->save($user);

      $user = new App\User;
      $user->username = "Storer";
      $user->dni = 888888;
      $user->email = "seller@seller.com";
      $user->first_name = "Daniel";
      $user->last_name = "Felipe";
      $user->first_lastname = "Tarazona";
      $user->last_lastname = "Vasquez";
      $user->adress = "CR 2 Oeste 9 65";
      $user->telephone = "888888";
      $user->cellphone = "3158375156";
      $user->password = bcrypt("123456");
      $user->url = "/Profile/Image.png";
      $user->save();

      $rol = App\Rol::find(6);
      $rol->users()->save($user);

      $user = new App\User;
      $user->username = "Administrator";
      $user->dni = 999999;
      $user->email = "admin@admin.com";
      $user->first_name = "Daniel";
      $user->last_name = "Felipe";
      $user->first_lastname = "Tarazona";
      $user->last_lastname = "Vasquez";
      $user->adress = "CR 2 Oeste 9 65";
      $user->telephone = "888888";
      $user->cellphone = "3158375156";
      $user->password = bcrypt("123456");
      $user->url = "/Profile/Image.png";
      $user->save();

      $rol = App\Rol::find(7);
      $rol->users()->save($user);

      factory(App\Provider::class, 10)->create();
      $provider = App\Provider::find(1);

      factory(App\Category::class, 10)->create();
      $category = App\Category::find(1);

      factory(App\Region::class, 10)->create();
      $region = App\Region::find(1);

      factory(App\City::class, 100)->create();
      $city = App\City::find(1);

      $city->users()->save($user);
      $region->city()->save($city);

      factory(App\State::class, 10)->create();
      $state = App\State::find(1);
      $state->users()->save($user);

      factory(App\Store::class, 20)->create();
      $store = App\Store::find(1);
      $city->stores()->save($store);

      factory(App\Maintenance::class, 10)->create();
      $maintenance = App\Maintenance::find(1);


      factory(App\Product::class, 30)->create();
      $product = App\Product::find(3);
      $provider->products()->save($product);
      $store->products()->save($product);
      $category->products()->save($product);
      $state->products()->save($product);
      $maintenance->products()->save($product);

      factory(App\User::class, 20)->create();
      $store->users()->save($user);

      factory(App\Issue::class, 20)->create();
      $issue = App\Issue::find(1);
      $user->issues()->save($issue);

      factory(App\Comment::class, 100)->create();
      $comment = App\Comment::find(1);
      $user->comments()->save($comment);

      factory(App\Log::class, 100)->create();
      factory(App\Order::class, 50)->create();
      factory(App\Sale::class, 50)->create();

      $order = App\Order::find(3);
      $sale = App\Sale::find(3);

      $user->orders()->save($order);
      $user->sales()->save($sale);

    }
}
