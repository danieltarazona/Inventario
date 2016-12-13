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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
      'dni' => $faker->unique()->ean8,
      'username' => $faker->unique()->userName,
      'email' => $faker->unique()->safeEmail,
      'first_name' => $faker->name,
      'last_name' => $faker->name,
      'first_lastname' => $faker->name,
      'last_lastname' => $faker->name,
      'address' => $faker->address,
      'state_id' => 200,
      'telephone' => $faker->phoneNumber,
      'cellphone' => $faker->phoneNumber,
      'password' => $password ?: $password = bcrypt('123456'),
      'photo' => "/img/users/profile.png",
      'remember_token' => str_random(10)
    ];
});

$factory->define(App\Report::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->unique()->userName
  ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
  return [
    'start' => $faker->numberBetween($min = 11, $max = 12) . ':00:00',
    'end' => $faker->numberBetween($min = 13, $max = 14) . ':00:00',
    'date' => Carbon::now()->subDay()
  ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->word,
    'photo' => "/img/categories/ipad.jpeg",
    'description' => $faker->text,
  ];
});

$factory->define(App\State::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->word,
    'label' => 'label label-success'
  ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->country,
  ];
});

$factory->define(App\Region::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->state,
  ];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->city,
  ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->text,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
    'photo' => "/img/stores/store.jpeg",
  ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
    'photo' => "/img/products/ipad.jpeg",
    'warranty' => $faker->numberBetween($min = 1, $max = 60),
    'price' => $faker->numberBetween($min = 100000, $max = 5000000),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'year' => $faker->numberBetween($min = 2010, $max = 2016),
    'serial' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]')
  ];
});

$factory->define(App\Repair::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->catchPhrase,
    'description' => $faker->text,
  ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->bs,
  ];
});

$factory->define(App\Issue::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->bs,
  ];
});

$factory->define(App\Cart::class, function (Faker\Generator $faker) {
  return [
  ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
  return [
    'start' => $faker->numberBetween($min = 11, $max = 12) . ':00:00',
    'end' => $faker->numberBetween($min = 13, $max = 14) . ':00:00',
    'date' => Carbon::now()->subDay()
  ];
});

$factory->define(App\Sale::class, function (Faker\Generator $faker) {
  return [
    'out' => $faker->numberBetween($min = 11, $max = 12) . ':00:00',
    'in' => $faker->numberBetween($min = 13, $max = 14) . ':00:00'
  ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->name,
  ];
});
