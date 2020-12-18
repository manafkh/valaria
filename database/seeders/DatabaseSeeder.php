<?php

namespace Database\Seeders;

use App\Models\CategoryDetails;
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
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(StyleSeeder::class);
        $this->call(CategoryDetailsSeeder::class);
        $this->call(CategoryStylesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ImagesSeeder::class);
    }
}
