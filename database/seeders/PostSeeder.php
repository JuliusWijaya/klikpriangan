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
                'title'         => $faker->sentence(mt_rand(3, 5)),
                'category_id'   => $faker->numberBetween(1, 3),
                'user_id'       => $faker->numberBetween(1, 5),
                'slug'          => $faker->slug(3),
                'excerpt'       => $faker->paragraph(),
                'body'          => $faker->paragraph(mt_rand(5, 10)),
                'published_at'  => $faker->date(),
            ]);
        }
    }
}