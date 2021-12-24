<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_detail')->insert([
            'country_name' => 'Singapore',
            'country_name_init' => 'SGP',
            'country_code' => '+65',
            'country_currency' => 'SGD'
        ]);
        DB::table('country_detail')->insert([
            'country_name' => 'Malaysia',
            'country_name_init' => 'MY',
            'country_code' => '+60',
            'country_currency' => 'MYR'
        ]);
        DB::table('country_detail')->insert([
            'country_name' => 'Indonesia',
            'country_name_init' => 'IDN',
            'country_code' => '+62',
            'country_currency' => 'IDR'
        ]);
        DB::table('country_detail')->insert([
            'country_name' => 'Thailand',
            'country_name_init' => 'THAI',
            'country_code' => '+66',
            'country_currency' => 'THB'
        ]);
    }
}
