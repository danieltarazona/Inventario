<?php

use Faker\Generator;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Log::class, function (Generator $faker) {
  return [
    'name' => $faker->bs,
    'log' => $faker->text,
  ];
});

$factory->define(App\Provider::class, function (Generator $faker) {
  return [
    'name' => $faker->name,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
  ];
});

$factory->define(App\Category::class, function (Generator $faker) {
  return [
    'name' => $faker->word,
    'url' => "http://fakeimg.pl/600/",
  ];
});

$factory->define(App\State::class, function (Generator $faker) {
  return [
    'name' => $faker->word,
  ];
});

$factory->define(App\Region::class, function (Generator $faker) {
  return [
    'name' => $faker->state,
  ];
});

$factory->define(App\City::class, function (Generator $faker) {
  return [
    'name' => $faker->city,
    'region_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});

$factory->define(App\Store::class, function (Generator $faker) {
  return [
    'city_id' => $faker->numberBetween($min = 1, $max = 3),
    'name' => $faker->name,
    'description' => $faker->text,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
  ];
});

$factory->define(App\Product::class, function (Generator $faker) {
  return [
    'name' => $faker->name,
    'url' => "http://fakeimg.pl/600/",
    'warranty' => $faker->numberBetween($min = 1, $max = 60),
    'price' => $faker->numberBetween($min = 100000, $max = 5000000),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'stock' => $faker->numberBetween($min = 1, $max = 50),
    'year' => $faker->numberBetween($min = 2010, $max = 2016),
    'serial' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]'),
    'category_id' => $faker->numberBetween($min = 1, $max = 3),
    'store_id' => $faker->numberBetween($min = 1, $max = 3),
    'provider_id' => $faker->numberBetween($min = 1, $max = 3),
    'state_id' => $faker->numberBetween($min = 1, $max = 3),
    'maintenance_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});

$factory->define(App\Maintenance::class, function (Generator $faker) {
  return [
    'name' => $faker->catchPhrase,
    'description' => $faker->text,
    'user_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});

$factory->define(App\User::class, function (Generator $faker) {
  return [
    'state_id' => $faker->numberBetween($min = 1, $max = 3),
    'region_id' => $faker->numberBetween($min = 1, $max = 3),
    'city_id' => $faker->numberBetween($min = 1, $max = 3),
    'store_id' => $faker->numberBetween($min = 1, $max = 3),
    'rol_id' => $faker->numberBetween($min = 1, $max = 1),
    'dni' => $faker->numberBetween($min = 10, $max = 100000000),
    'username' => $faker->unique()->userName,
    'email' => $faker->safeEmail,
    'first_name' => $faker->name,
    'last_name' => $faker->name,
    'first_lastname' => $faker->name,
    'last_lastname' => $faker->name,
    'adress' => $faker->address,
    'telephone' => $faker->phoneNumber,
    'cellphone' => $faker->phoneNumber,
    'password' => bcrypt(str_random(10)),
    'url' => "http://fakeimg.pl/600/",
    'remember_token' => str_random(10),
  ];
});

$factory->define(App\Comment::class, function (Generator $faker) {
  return [
    'name' => $faker->text,
    'user_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});

$factory->define(App\Issue::class, function (Generator $faker) {
  return [
    'name' => $faker->bs,
    'user_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});

$factory->define(App\Sale::class, function (Generator $faker) {
  return [
    'user_id' => $faker->numberBetween($min = 1, $max = 3),
    'order_id' => $faker->numberBetween($min = 1, $max = 3),
    'state_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});

$factory->define(App\Order::class, function (Generator $faker) {
  return [
    'state_id' => $faker->numberBetween($min = 1, $max = 3),
    'user_id' => $faker->numberBetween($min = 1, $max = 3),
  ];
});
