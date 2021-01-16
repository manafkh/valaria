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
        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(CategoryDetailsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(StyleSeeder::class);
        $this->call(CategoryStylesSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(ImagesSeeder::class);
    }
}
