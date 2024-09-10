<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\bootcamp_sponsor;

class BootcampSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        bootcamp_sponsor::create([
            'id_bootcamp' => '1',
            'id_sponsor' => '1',
        ]);
    }
}
