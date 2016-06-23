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
      $user->save();

      $userowner = new App\User;
      $userowner->username = "Owner";
      $userowner->dni = 88888888;
      $userowner->email = "userowner@aol.com";
      $userowner->save();

      $admin = new App\User;
      $admin->username = "Admin";
      $admin->dni = 666666;
      $admin->email = "admin@aol.com";
      $admin->save();

      $manufacturer = new App\Manufacturer;
      $manufacturer->name = "Apple";
      $manufacturer->save();

      $category = new App\Category;
      $category->name = "Ultrabook";
      $category ->save();

      $product = new App\Product;
      $product->name = "Macbook";
      $product ->save();

      $maintenance = new App\Maintenance;
      $maintenance->name = "OSX El Capitan";
      $maintenance ->save();

      $state = new App\State;
      $state->name = "Excellent";
      $state->save();

      $comment = new App\Comment;
      $comment->name = "Best Costumer Service";
      $comment->save();

      $program = new App\Program;
      $program->name = "Architecture";
      $program->save();

      $program = new App\Program;
      $program->name = "Computer Science";
      $program->save();

      $program = new App\Program;
      $program->name = "Robotics";
      $program->save();

      $headquarter = new App\Headquarter;
      $headquarter->name = "Apple Loop";
      $headquarter->save();

      $headquarter = new App\Headquarter;
      $headquarter->name = "Shibuya";
      $headquarter->save();

      $headquarter = new App\Headquarter;
      $headquarter->name = "Sacre Coeur";
      $headquarter->save();

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

      $owner->order()->save($order);
      $user->order()->save($order);

      $owner->sale()->save($sale);
      $user->sale()->save($sale);

      $product->order()->save($order);
      $product->sale()->save($sale);

      $category->product()->save($product);
      $headquarter->product()->save($product);
      $manufacturer->product()->save($product);
      $state->product()->save($product);
      $owner->product()->save($product);
      $maintenance->product()->save($product);

      $owner->maintenance()->save($maintenance);
      $city->headquarter()->save($headquarter);
      $city->user()->save($user);
      $state->user()->save($user);
      $program->user()->save($user);
      $headquarter->program()->save($program);
      $headquarter->user()->save($user);

      // $user->city;
      // $user->state;
      // $user->program;
      // $user->headquarter;
      $user->comment()->save($comment);
      $user->issue()->save($issue);
      //$user->sale()->save($sale);
      //$user->order()->save($order);

      /*
      $user = App\User::find(1);
      $city = App\City::find(1);
      $issue = App\Issue::find(1);
      $state = App\State::find(1);
      $comment = App\Comment::find(1);
      $product = App\Product::find(1);
      $program = App\Program::find(1);
      $category = App\Category::find(1);
      $headquarter = App\Headquarter::find(1);
      $maintenance = App\Maintenance::find(1);
      $manufacturer = App\Manufacturer::find(1);
      $owner = App\Owner::find(1);


      $product->maintenance()->save($maintenance);
      $user = App\User::find(2);
      $maintenance = App\Maintenance::find(2);
      $category->product()->save($product);
      $product->maintenance()->save($maintenance);
      $product->manufacturer()->save($manufacturer);

      */

    }
}
