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

$faker = Faker\Factory::create('es_ES');

$factory->define(App\Rol::class, function (Generator $faker) {
  return [
    'name' => $faker->name,
  ];
});

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
    'description' => $faker->text,
    'photo' => "/img/categories/ipad.jpeg",
  ];
});

$factory->define(App\State::class, function (Generator $faker) {
  return [
    'name' => $faker->word,
  ];
});

$factory->define(App\Country::class, function (Generator $faker) {
  return [
    'name' => $faker->country,
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
  ];
});

$factory->define(App\Store::class, function (Generator $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->text,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
    'photo' => "/img/stores/store.jpeg",
  ];
});

$factory->define(App\Product::class, function (Generator $faker) {
  return [
    'name' => $faker->name,
    'photo' => "/img/users/iPad.jpeg",
    'warranty' => $faker->numberBetween($min = 1, $max = 60),
    'price' => $faker->numberBetween($min = 100000, $max = 5000000),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'stock' => 10,
    'amount' => 10,
    'year' => $faker->numberBetween($min = 2010, $max = 2016),
    'serial' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]'),
  ];
});

$factory->define(App\Maintenance::class, function (Generator $faker) {
  return [
    'name' => $faker->catchPhrase,
    'description' => $faker->text,
  ];
});

$factory->define(App\User::class, function (Generator $faker) {
  return [
    'dni' => $faker->unique()->ean8,
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
    'photo' => "/img/users/profile.png",
    'remember_token' => str_random(10),
  ];
});

$factory->define(App\Comment::class, function (Generator $faker) {
  return [
    'name' => $faker->text,
  ];
});

$factory->define(App\Issue::class, function (Generator $faker) {
  return [
    'name' => $faker->bs,
  ];
});

$factory->define(App\Order::class, function (Generator $faker) {
  return [
  ];
});

$factory->define(App\Sale::class, function (Generator $faker) {
  return [
  ];
});
