<?php

use Faker\Generator as Faker;
use \App\Comment;
use \App\Article;
use \App\User;

$factory->define(Comment::class, function (Faker\Generator $faker) {
    $articleIds = Article::pluck('id')->toArray();
    $userIds = User::pluck('id')->toArray();

    return [
        'content' => $faker->paragraph,
        'commentable_type' => Article::class,
        'commentable_id' => function () use ($faker, $articleIds) {
            return $faker->randomElement($articleIds);
        },
        'user_id' => function () use ($faker, $userIds) {
            return $faker->randomElement($userIds);
        },
    ];
});
