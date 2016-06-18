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

        $manufacturer = new Manufacturer;
        $manufacturer->name = "Apple";
        $manufacturer->save();

        $category = new Category;
        $category->name = "Notebooks";
        $category ->save();

        $device = new Device;
        $device->name = "Macbook";
        $device ->save();

        $maintenance = new Maintenance;
        $maintenance->name = "Install Windows 10";
        $maintenance ->save();

        $maintenance = new Maintenance;
        $maintenance->name = "Install Atom";
        $maintenance ->save();

        $state = new State;
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
