<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Froome;
use App\Models\Type;
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
        // User::create();
        Froome::factory(20)->create();
        User::factory(20)->create();

        $this->call([

            TypeSeeder::class,
        ]);
    }
}
