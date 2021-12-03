<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Borrower::factory(20)->create();
    }
}
