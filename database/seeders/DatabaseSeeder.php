<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Personal', 'slug'  => 'personal'],
            ['name' => 'Opini', 'slug' => 'opini'],
            ['name' => 'Pendidikan', 'slug' => 'pendidikan'],
        ]);

        $this->call([
            RoleSeeder::class,
            PostSeeder::class,
        ]);

        \App\Models\User::factory(5)->create();
        User::create([
            'name'      => 'Admin',
            'username'  => 'admin',
            'email'     => 'administrator@gmail.com',
            'password'  => bcrypt('password'),
            'status'    => 'inactive',
            'role_id'   => 1,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}