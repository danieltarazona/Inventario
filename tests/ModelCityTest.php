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
      $Collection = 'Illuminate\Database\Eloquent\Collection';
      $city = App\City::find(1);
      $this->assertInstanceOf($Collection, $city->user);
      foreach($city->user as $user) {
        $this->assertEquals($city->id, $user->city_id);
      }
    }

    public function testModelCityBelongsToRegion()
    {
      $city = App\City::find(1);
      $region = App\Region::find(1);
      $region->city()->save($city);
      $this->seeInDatabase('cities',
      [
        'name' => $city->name,
        'region_id' => $region->id
      ]);
    }

    public function testModelCityGetRegionId()
    {
      $city = App\City::find(1);
      $region = App\Region::find(1);
      $this->assertEquals($city->region_id, $city->region->id);
    }
}
