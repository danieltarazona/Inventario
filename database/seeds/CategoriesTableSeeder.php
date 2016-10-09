<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Category::class)->create(['name' => 'Notebook']);

      $categories = factory(App\Category::class, 9)->create();

      echo "Done" . PHP_EOL;
    }
}
