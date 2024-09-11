<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\challenge_filter_category;

class ChallengeFilterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        challenge_filter_category::create([
            'id' => '1',
            'name' => 'Turismo',
        ]);
    }
}
