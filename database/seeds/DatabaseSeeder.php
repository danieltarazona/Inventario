<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => "Apple",
        ]);

        DB::table('categories')->insert([
            'name' => "Computers",
        ]);

        DB::table('devices')->insert([
            'name' => "Macbook",
        ]);

        DB::table('maintenances')->insert([
            'name' => "Install Windows 10",
        ]);

        DB::table('maintenances')->insert([
            'name' => "Install Atom",
        ]);

        DB::table('users')->insert([
            'username' => "codeapps",
        ]);

        DB::table('states')->insert([
            'name' => "Good",
        ]);

        $main1 = App\Maintenance::find(1);
        $main2 = App\Maintenance::find(2);
        $device = App\Device::find(1);
        $category = App\Category::find(1);
        $manufacturer = App\Manufacturer::find(1);
    }
}
