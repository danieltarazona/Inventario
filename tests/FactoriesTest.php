<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FactoriesTest extends TestCase
{
    use DatabaseTransactions;

    public function testFactoryUser()
    {
      $user = factory(App\User::class)->create(['username' => 'TestUser']);
      $this->seeInDatabase('users', ['username' => $user->username]);
    }

    public function testFactoryCategory()
    {
      $category = factory(App\Category::class)->create(['name' => 'TestCategory']);
      $this->seeInDatabase('categories', ['name' => $category->name]);
    }

    public function testFactoryProvider()
    {
      $provider = factory(App\Provider::class)->create(['name' => 'TestProvider']);
      $this->seeInDatabase('providers', ['name' => $provider->name]);
    }

    public function testFactoryState()
    {
      $state = factory(App\State::class)->create(['name' => 'TestState']);
      $this->seeInDatabase('states', ['name' => $state->name]);
    }

    public function testFactoryRegion()
    {
      $region = factory(App\Region::class)->create(['name' => 'TestRegion']);
      $this->seeInDatabase('regions', ['name' => $region->name]);
    }

    public function testFactoryCity()
    {
      $city = factory(App\City::class)->create(['name' => 'TestCity']);
      $this->seeInDatabase('cities', ['name' => $city->name]);
    }

    public function testFactoryStore()
    {
      $store = factory(App\Store::class)->create(['name' => 'TestStore']);
      $this->seeInDatabase('stores', ['name' => $store->name]);
    }

    public function testFactoryProduct()
    {
      $product = factory(App\Product::class)->create(['name' => 'TestProduct']);
      $this->seeInDatabase('products', ['name' => $product->name]);
    }

    public function testFactoryComment()
    {
      $comment = factory(App\Comment::class)->create(['name' => 'TestComment']);
      $this->seeInDatabase('comments', ['name' => $comment->name]);
    }

    public function testFactoryIssue()
    {
      $issue = factory(App\Issue::class)->create(['name' => 'TestIssue']);
      $this->seeInDatabase('issues', ['name' => $issue->name]);
    }

    public function testFactoryRol()
    {
      $role = factory(App\Role::class)->create(['name' => 'TestRole']);
      $this->seeInDatabase('roles', ['name' => $role->name]);
    }

    public function testFactoryLog()
    {
      $log = factory(App\Log::class)->create(['name' => 'TestLog']);
      $this->seeInDatabase('logs', ['name' => $log->name]);
    }

    public function testFactoryMaintenance()
    {
      $maintenance = factory(App\Maintenance::class)->create(['name' => 'TestMaintenance']);
      $this->seeInDatabase('maintenances', ['name' => $maintenance->name]);
    }

    public function testFactoryOrder()
    {
      $user = App\User::find(1);
      $products = factory(App\Product::class, 10)->create();
      $order = factory(App\Order::class)->create();
      $state = App\State::find(401); # Waiting
      $user->order()->save($order);
      $state->order()->save($order);
      $order->product()->sync($products);
      $this->seeInDatabase('orders', [
        'state_id' => $state->id,
        'user_id' => $user->id,
      ]);
    }

    public function testFactorySale()
    {
      $user = App\User::find(1);
      $order = factory(App\Order::class)->create();
      $sale = factory(App\Sale::class)->create();
      $state = App\State::find(401); # Waiting
      $state->sale()->save($sale);
      $user->sale()->save($sale);
      $order->sale()->save($sale);
      $this->seeInDatabase('sales', [
        'order_id' => $order->id,
        'state_id' => $state->id,
        'user_id' => $user->id,
      ]);
    }
}
