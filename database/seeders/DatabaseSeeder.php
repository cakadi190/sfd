<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FirstUserSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(BorrowerSeeder::class);
        // $this->call(ApplicantSeeder::class);
    }
}
