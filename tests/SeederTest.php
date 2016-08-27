<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeederTest extends TestCase
{
  use DatabaseTransactions;

  public function testSeederRols()
  {
    $this->seeInDatabase('rols', ['name' => 'User']);
    $this->seeInDatabase('rols', ['name' => 'Storer']);
    $this->seeInDatabase('rols', ['name' => 'Admin']);
  }

  public function testSeederUserAdmin()
  {
    $this->seeInDatabase('users', ['username' => 'Administrador']);
  }

  public function testSeederUserComment()
  {
    $this->seeInDatabase('comments', ['name' => 'Awesome']);
  }

  public function testSeederCategory()
  {
    $this->seeInDatabase('categories', ['name' => 'Notebook']);
  }

  public function testSeederState()
  {
    $this->seeInDatabase('states', ['name' => 'Active']);
  }

  public function testSeederRegion()
  {
    $this->seeInDatabase('regions', ['name' => 'Detroit']);
  }

  public function testSeederCity()
  {
    $this->seeInDatabase('cities', ['name' => 'Kyoto']);
  }

  public function testSeederLog()
  {
    $this->seeInDatabase('logs', ['name' => 'Login']);
  }

  public function testSeederIssue()
  {
    $this->seeInDatabase('issues', ['name' => 'Error']);
  }

  public function testSeederStore()
  {
    $this->seeInDatabase('stores', ['name' => 'Shibuya']);
  }

  public function testSeederMaintenance()
  {
    $this->seeInDatabase('maintenances', ['name' => 'OSX']);
  }

  public function testSeederProduct()
  {
    $this->seeInDatabase('products', ['name' => 'MacBook']);
  }

  public function testSeederProvider()
  {
    $this->seeInDatabase('providers', ['name' => 'Apple']);
  }
}
