<?php

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

$factory->define(App\Sale::class, function (Faker\Generator $faker) {
  return [
    'state_id' => $faker->numberBetween($min = 1, $max = 10),
    'user_id' => $faker->numberBetween($min = 1, $max = 10),
    'order_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
  return [
    'state_id' => $faker->numberBetween($min = 1, $max = 10),
    'user_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\Issue::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->bs,
    'user_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->bs,
    'log' => $faker->text,
  ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->text,
    'user_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->safeEmail,
    'password' => bcrypt(str_random(10)),
    'remember_token' => str_random(10),
  ];
});

$factory->define(App\Provider::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
  ];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->city,
    'region_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->word,
  ];
});

$factory->define(App\State::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->word,
  ];
});

$factory->define(App\Region::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->state,
  ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->text,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
    'region_id' => $faker->numberBetween($min = 1, $max = 10),
    'city_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'warranty' => $faker->numberBetween($min = 1, $max = 60),
    'price' => $faker->numberBetween($min = 100000, $max = 5000000),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'stock' => $faker->numberBetween($min = 1, $max = 50),
    'year' => $faker->numberBetween($min = 2010, $max = 2016),
    'serial' => $faker->str_random(10),
    'adress' => $faker->address,
    'region_id' => $faker->numberBetween($min = 1, $max = 10),
    'city_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});

$factory->define(App\Maintenance::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->catchPhrase,
    'description' => $faker->text,
    'seller_id' => $faker->numberBetween($min = 1, $max = 10),
  ];
});
