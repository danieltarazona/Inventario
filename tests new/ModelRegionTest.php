<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelRegionTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelRegionHasManyCity()
  {
    $Collection = 'Illuminate\Database\Eloquent\Collection';
    $region = App\Region::find(1);
    $this->assertInstanceOf($Collection, $region->city);
    foreach($region->city as $city) {
      $this->assertEquals($region->id, $city->region_id);
    }
  }

  public function testModelRegionHasManyStore()
  {
    $Collection = 'Illuminate\Database\Eloquent\Collection';
    $region = App\Region::find(1);
    $this->assertInstanceOf($Collection, $region->store);
    foreach($region->store as $store) {
      $this->assertEquals($region->id, $store->region_id);
    }
  }

  public function testModelRegionHasManyUser()
  {
    $Collection = 'Illuminate\Database\Eloquent\Collection';
    $region = App\Region::find(1);
    $this->assertInstanceOf($Collection, $region->user);
    foreach($region->user as $user) {
      $this->assertEquals($region->id, $user->region_id);
    }
  }
}
