<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Factory call
        // \App\Models\User::factory(10)->create();
         \App\Models\Post::factory(20)->create();
         \App\Models\Category::factory(50)->create();
         \App\Models\Tag::factory(50)->create();

         //Seeder call
        $this->call([
            UserTableSeeder::class
        ]);
    }
}
