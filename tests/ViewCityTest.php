<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewCityTest extends TestCase
{
  use DatabaseTransactions;

  public function testViewCitiesIndexBehavior()
  {
    $this->visit('/cities')
      ->see('Cities')
      ->see('Name')
      ->see('ID')
      ->see('Actions');
  }

  public function testViewCitiesCreateBehavior()
  {
    $this->visit('/cities')
      ->type('Boston', 'name')
      ->select('1', 'region_id')
      ->press('')
      ->seePageIs('/cities');
  }

  public function testViewCitiesEditBehavior()
  {
    $this->visit('/cities/1/edit')
      ->type('Seatle', 'name')
      ->select('1', 'region_id')
      ->press('')
      ->seePageIs('/cities');
  }

  public function testViewCitiesDestroyBehavior()
  {
    $this->visit('/cities')
      ->press('Delete')
      ->seePageIs('/cities');
  }
}
