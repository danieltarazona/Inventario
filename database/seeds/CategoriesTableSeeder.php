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
      factory(App\Category::class)->create(['name' => 'Notebooks']);
      factory(App\Category::class)->create(['name' => 'Tablets']);
      factory(App\Category::class)->create(['name' => 'Ratones']);
      factory(App\Category::class)->create(['name' => 'Desktops']);
      factory(App\Category::class)->create(['name' => 'Herramientas']);
      factory(App\Category::class)->create(['name' => 'Smartphones']);
      factory(App\Category::class)->create(['name' => 'Antenas']);
      factory(App\Category::class)->create(['name' => 'Teclados']);
      factory(App\Category::class)->create(['name' => 'Audifonos']);

      echo "Done" . PHP_EOL;
    }
}
