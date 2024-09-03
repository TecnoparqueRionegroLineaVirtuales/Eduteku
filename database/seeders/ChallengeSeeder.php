<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use App\Models\ChallengeType;
use App\Enums\QuestionTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questionTypes = [];
        foreach(QuestionTypeEnum::cases() as $questionType){
            $questionTypes[] = ['name' => $questionType->value];
        }
/*         $questionTypes = [
            ['name' => 'text'],
            ['name' => 'image'],
            ['name' => 'video'],
        ]; */
        QuestionType::insert($questionTypes);

        $challengeTypes = [
            ['name' => 'Turismo'],
            ['name' => 'Campesena'],
        ];
        ChallengeType::insert($challengeTypes);
        //
    }
}
