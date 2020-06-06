<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\GameScore::class, function (Faker $faker) {
    return [
        'game_uuid' => $faker->uuid(),
        'uuid' => $faker->uuid(),
        'score' => $faker->numberBetween(0, 26)
    ];
});
