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
      $user = new App\User;
      $user->username = "codeapps";
      $user->dni = 7777777;
      $user->email = "codeapps@aol.com";
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
      $maintenance->price = 100000;
      $maintenance->description = "Upgrade form Leopard";
      $maintenance ->save();

      $userowner = new App\User;
      $userowner->username = "Owner";
      $userowner->dni = 88888888;
      $userowner->email = "userowner@aol.com";
      $userowner->save();

      $manufacturer = new App\Manufacturer;
      $manufacturer->name = "Apple";
      $manufacturer->save();

      $manufacturer = new App\Manufacturer;
      $manufacturer->name = "Samsung";
      $manufacturer->save();

      $manufacturer = new App\Manufacturer;
      $manufacturer->name = "Sony";
      $manufacturer->save();

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
      $state->name = "Excellent";
      $state->save();

      $state = new App\State;
      $state->name = "Good";
      $state->save();

      $state = new App\State;
      $state->name = "Acceptable";
      $state->save();

      $comment = new App\Comment;
      $comment->name = "Best Costumer Service";
      $comment->save();

      $region = new App\Region;
      $region->name = "Valle del Cauca";
      $region->save();

      $region = new App\Region;
      $region->name = "Cundinamarca";
      $region->save();

      $region = new App\Region;
      $region->name = "Antioquia";
      $region->save();

      $store = new App\Store;
      $store->name = "Apple Loop";
      $store->save();

      $store = new App\Store;
      $store->name = "Shibuya";
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

      $owner = new App\Owner;
      $owner->save();
      $user->owner()->save($owner);

      $order = new App\Order;
      $order->save();

      $sale = new App\Sale;
      $sale->save();

      $city->user()->save($user);
      $state->user()->save($user);
      $store->user()->save($user);
      $region->user()->save($user);

      $owner->order()->save($order);
      $user->order()->save($order);
      $product->order()->save($order);

      $owner->sale()->save($sale);
      $user->sale()->save($sale);
      $product->sale()->save($sale);

      $category->product()->save($product);
      $store->product()->save($product);
      $manufacturer->product()->save($product);
      $state->product()->save($product);
      $maintenance->product()->save($product);

      $owner->maintenance()->save($maintenance);

      $region->city()->save($city);
      $city->store()->save($store);

      $user->comment()->save($comment);
      $user->issue()->save($issue);

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
      $manufacturer = App\Manufacturer::find(1);
      $owner = App\Owner::find(1);

      $issue = App\Issue::find(1);
      $product->maintenance()->save($maintenance);
      $user = App\User::find(2);
      $maintenance = App\Maintenance::find(2);
      $category->product()->save($product);
      $product->maintenance()->save($maintenance);
      $product->manufacturer()->save($manufacturer);

      */

    }
}
