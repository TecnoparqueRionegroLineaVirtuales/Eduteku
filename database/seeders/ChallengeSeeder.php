<?php

namespace Database\Seeders;

use App\Models\Challenge;
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

        //TODO: keep in sync when merging the challenge creation fork
        $challenges = [
            ['challenge_type_id' => 1, 'name' => 'reto 1', 'description' => 'some description...', 'img_url' => 'img_url'],
            ['challenge_type_id' => 1, 'name' => 'reto 2', 'description' => 'other description...', 'img_url' => 'img_url2'],
            ['challenge_type_id' => 1, 'name' => 'reto 3', 'description' => 'third description...', 'img_url' => 'img_url3'],
        ];
        Challenge::insert($challenges);

        //
    }
}
