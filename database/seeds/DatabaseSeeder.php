<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call(CategoriesTableSeeder::class);
    $this->call(RolesTableSeeder::class);
    $this->call(StatesTableSeeder::class);
    $this->call(CartsTableSeeder::class);
    $this->call(RegionsTableSeeder::class);
    $this->call(CitiesTableSeeder::class);
    $this->call(StoresTableSeeder::class);

    $this->call(UsersTableSeeder::class);
    $this->call(IssuesTableSeeder::class);
    $this->call(CommentsTableSeeder::class);

    $this->call(ProductsTableSeeder::class);
    $this->call(MaintenancesTableSeeder::class);

  }
}
