<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use App\Models\ChallengeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questionTypes = [
            ['name' => 'text'],
            ['name' => 'image'],
            ['name' => 'video'],
        ];
        QuestionType::insert($questionTypes);

        $challengeTypes = [
            ['name' => 'Turismo'],
            ['name' => 'Campesena'],
        ];
        ChallengeType::insert($challengeTypes);
        //
    }
}
