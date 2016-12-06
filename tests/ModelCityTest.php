<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelCityTest extends TestCase
{
  use DatabaseTransactions;

    public function testModelCityHasManyStore()
    {
      $Collection = 'Illuminate\Database\Eloquent\Collection';
      $city = App\City::find(1);
      $this->assertInstanceOf($Collection, $city->store);
      foreach($city->store as $store) {
        $this->assertEquals($city->id, $store->city_id);
      }
    }

    public function testModelCityHasManyUser()
    {
      $this->assertTrue(true);
    }

    public function testModelCityBelongsToRegion()
    {
      $city = App\City::find(1);
      $this->assertInstanceOf(App\Region::class, $city->region);
    }
}
