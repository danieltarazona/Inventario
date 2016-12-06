<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment07Test extends TestCase
{

  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaleCancelAsUser()
    {
      $user = App\User::find(1);
      $this->actingAs($user);
      $this->visit('/orders');
      $this->visit('/orders/1/edit');
      $this->press('Cancelar');
      $this->seePageIs('/orders');
      $this->see('Order Cancel Successful!');
    }
}
