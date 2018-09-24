<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

include 'vendor/autoload.php';

class User extends Model {}

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'database',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$user = User::first();
if (!$user) {
	User::create([
		'name' => 'Bob',
		'created_at' => Date::now(),
		'updated_at' => Date::now(),
	]);
}

echo get_class(User::first()->created_at)."\n";

Date::swap(DateTime::class);

echo get_class(User::first()->created_at)."\n";

Date::swap(\Carbon\CarbonImmutable::class);

echo get_class(User::first()->created_at)."\n";
