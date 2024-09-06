<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['id' => '1','name' => 'Turismo'],
            ['id' => '2','name' => 'Agropecuario'],
            ['id' => '3','name' => 'Aviación'],
            ['id' => '4','name' => 'Innovación'],
        ];

        foreach ($tags as $tag) {
            Tags::create($tag);
        }
    }
}
