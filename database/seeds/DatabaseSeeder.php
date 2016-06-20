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

        $manufacturer = new App\Manufacturer;
        $manufacturer->name = "Apple";
        $manufacturer->save();

        $category = new App\Category;
        $category->name = "Notebooks";
        $category ->save();

        $product = new App\Product;
        $product->name = "Macbook";
        $product ->save();

        $maintenance = new App\Maintenance;
        $maintenance->name = "Install Windows 10";
        $maintenance ->save();

        $maintenance = new App\Maintenance;
        $maintenance->name = "Install Atom";
        $maintenance ->save();

        $state = new App\State;
        $state->name = "Good";
        $state->save();

        /*
        $state = App\State::find(1);
        $device = App\Device::find(1);

        $category = App\Category::find(1);
        $category->device()->save($device);

        $maintenance = App\Maintenance::find(1);
        $device->maintenance()->save($maintenance);

        $maintenance = App\Maintenance::find(2);
        $device->maintenance()->save($maintenance);

        $manufacturer = App\Manufacturer::find(1);
        $device->manufacturer()->save($manufacturer);

        */

    }
}
