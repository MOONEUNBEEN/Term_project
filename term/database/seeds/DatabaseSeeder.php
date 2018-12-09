<?php

use Illuminate\Database\Seeder;
use \App\Comment;
use \App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        

    }

    public function seedForDev() {
        /* User */
        $this->call(UsersTableSeeder::class);
        /* 아티클 */
        $this->call(ArticlesTableSeeder::class);
        // 변수 선언
        $faker = app(Faker\Generator::class);
        $users = App\User::all();
        $articles = Article::all();

        $article->each(function ($article) {
            $article->comments()->save(factory(Comment::class)->make());
            $article->comments()->save(factory(Comment::class)->make());
        });

        $articles->each(function ($article) use ($faker) {
            $commentIds = Comment::pluck('id')->toArray();

            foreach(range(1,5) as $index) {
                $article->comments()->save(
                    factory(Comment::class)->make([
                        'parent_id' => $faker->randomElement($commentIds),
                    ])
                );
            }
        });

        $this->command->info('Seeded: comments table');
    }
}
