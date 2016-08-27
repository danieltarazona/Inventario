<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeederTest extends TestCase
{
  use DatabaseTransactions;

  public function testSeeder()
  {
    $this->seeInDatabase('users', ['username' => 'Administrator']);
    $this->seeInDatabase('rols', ['name' => 'User']);
    $this->seeInDatabase('rols', ['name' => 'Storer']);
    $this->seeInDatabase('rols', ['name' => 'Admin']);
    $this->seeInDatabase('users', ['username' => 'Administrador']);
    $this->seeInDatabase('comments', ['name' => 'Awesome']);
    $this->seeInDatabase('categories', ['name' => 'Notebook']);
    $this->seeInDatabase('states', ['name' => 'Active']);
    $this->seeInDatabase('regions', ['name' => 'Detroit']);
    $this->seeInDatabase('cities', ['name' => 'Kyoto']);
    $this->seeInDatabase('logs', ['name' => 'Login']);
    $this->seeInDatabase('issues', ['name' => 'Error']);
    $this->seeInDatabase('stores', ['name' => 'Shibuya']);
    $this->seeInDatabase('maintenances', ['name' => 'OSX']);
    $this->seeInDatabase('products', ['name' => 'MacBook']);
    $this->seeInDatabase('providers', ['name' => 'Apple']);
    $this->seeInDatabase('order', ['id' => 1]);
    $this->seeInDatabase('sale', ['id' => 1]);
  }
}
