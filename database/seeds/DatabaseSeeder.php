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
      $rol->name = "Admin";
      $rol->save();

      $rol = new App\Rol;
      $rol->name = "Dev";
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
      $user->username = "Seller";
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

      $rol = App\Rol::find(5);
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

      $rol = App\Rol::find(6);
      $rol->users()->save($user);

      $product = new App\Product;
      $product->name = "Macbook";
      $product->stock = 10;
      $product->serial = "QWERTY";
      $product->year = "2015";
      $product->date = "06-05-2015";
      $product->price = 5000000;
      $product->warranty = "12";
      $product->save();

      $maintenance = new App\Maintenance;
      $maintenance->name = "OSX El Capitan";
      $maintenance->description = "Upgrade form Leopard";
      $maintenance ->save();

      $provider = new App\Provider;
      $provider->name = "Samsung";
      $provider->save();

      $provider = new App\Provider;
      $provider->name = "Sony";
      $provider->save();

      $provider = new App\Provider;
      $provider->name = "Apple";
      $provider->save();

      $category = new App\Category;
      $category->name = "Ultrabook";
      $category ->save();

      $category = new App\Category;
      $category->name = "Netbooks";
      $category ->save();

      $category = new App\Category;
      $category->name = "Smartphone";
      $category ->save();

      $state = new App\State;
      $state->name = "Good";
      $state->save();

      $state = new App\State;
      $state->name = "Acceptable";
      $state->save();

      $state = new App\State;
      $state->name = "Excellent";
      $state->save();

      $comment = new App\Comment;
      $comment->name = "Best Costumer Service";
      $comment->save();

      $region = new App\Region;
      $region->name = "Cundinamarca";
      $region->save();

      $region = new App\Region;
      $region->name = "Antioquia";
      $region->save();

      $region = new App\Region;
      $region->name = "Valle del Cauca";
      $region->save();

      $store = new App\Store;
      $store->name = "Shibuya";
      $store->save();

      $store = new App\Store;
      $store->name = "Apple Loop";
      $store->save();

      $issue = new App\Issue;
      $issue->name = "Intel Graphic Card";
      $issue->save();

      $city = new App\City;
      $city->name = "Cupertino";
      $city->save();

      $city = new App\City;
      $city->name = "Tokio";
      $city->save();

      $city = new App\City;
      $city->name = "Paris";
      $city->save();

      $order = new App\Order;
      $order->save();

      $sale = new App\Sale;
      $sale->save();


      $city->users()->save($user);
      $state->users()->save($user);
      $store->users()->save($user);
      $region->users()->save($user);

      $user->orders()->save($order);
      $user->sales()->save($sale);

      $category->products()->save($product);
      $store->products()->save($product);
      $provider->products()->save($product);
      $state->products()->save($product);
      $maintenance->products()->save($product);

      $region->cities()->save($city);
      $city->stores()->save($store);

      $user->comments()->save($comment);
      $user->issues()->save($issue);

      /*
      $user = App\User::find(1);
      $city = App\City::find(1);
      $state = App\State::find(1);
      $region = App\Region::find(1);
      $comment = App\Comment::find(1);
      $product = App\Product::find(1);
      $category = App\Category::find(1);
      $store = App\Store::find(1);
      $maintenance = App\Maintenance::find(1);
      $provider = App\Provider::find(1);
      $seller = App\Seller::find(1);

      $issue = App\Issue::find(1);
      $product->maintenance()->save($maintenance);
      $user = App\User::find(2);
      $maintenance = App\Maintenance::find(2);
      $category->product()->save($product);
      $product->maintenance()->save($maintenance);
      $product->provider()->save($provider);

      */

    }
}
