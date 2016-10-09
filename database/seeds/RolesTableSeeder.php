<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Role::class)->create(['name' => 'User']);
      factory(App\Role::class)->create(['name' => 'Provider']);
      factory(App\Role::class)->create(['name' => 'Storer']);
      factory(App\Role::class)->create(['name' => 'Administrator']);

      echo "Done" . PHP_EOL;

    }
}
