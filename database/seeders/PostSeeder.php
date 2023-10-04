<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            Post::insert([
                'title'         => $faker->realText($maxNbChars = 110),
                'category_id'   => $faker->numberBetween(1, 3),
                'slug'          => $faker->slug(3),
                'excerpt'       => $faker->paragraph(),
                'body'          => $faker->paragraph(),
                'published_at'  => $faker->date(),
            ]);
        }
    }
}
