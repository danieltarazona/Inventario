<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewCityTest extends TestCase
{
  public function testCitiesIndexBehavior()
  {
    $this->visit('/cities')
      ->see('Cities')
      ->see('Name')
      ->see('ID')
      ->see('Actions');
  }

  public function testCitiesCreateBehavior()
  {
    $this->visit('/cities')
      ->type('Boston', 'name')
      ->select('1', 'region_id')
      ->press('')
      ->seePageIs('/cities');
  }

  public function testCitiesEditBehavior()
  {
    $this->visit('/cities/1/edit')
      ->type('Seatle', 'name')
      ->select('1', 'region_id')
      ->press('')
      ->seePageIs('/cities');
  }

  public function testCitiesDestroyBehavior()
  {
    $this->visit('/cities')
      ->press('Delete')
      ->seePageIs('/cities');
  }
}
