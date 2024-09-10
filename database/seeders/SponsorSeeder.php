<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sponsor::create([
            'id' => '1',
            'name' => 'Cámara de Comercio del Oriente Antioqueño - CCOA',
            'description' => 'Respaldamos a empresas turísticas responsables, promoviendo acciones de turismo sostenible que beneficien a la región y al medio ambiente.',
            'img_url' => '1725907536.png'
        ]);
    }
}
