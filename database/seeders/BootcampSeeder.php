<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\bootcamps;
class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        bootcamps::create([
            'name' => ' Explora & Crea: Retos en innovación turística ',
            'description' => ' El Oriente Antioqueño se ha posicionado como una región con un alto potencial turístico, 
            caracterizada por su riqueza natural, cultural y patrimonial. Esta realidad convierte al turismo en un catalizador 
            clave para el desarrollo económico local, generando oportunidades para la comunidad, dinamizando sectores productivos y 
            promoviendo el bienestar social. Sin embargo, el crecimiento descontrolado y la falta de un enfoque integral 
            en la gestión turística pueden llevar a consecuencias negativas, tales como la degradación ambiental, la pérdida de 
            identidad cultural y la exclusión social.',
            'img_url' => 'memoria.jpg',
            'video_url' => '1725901654-66df2b56da12b.mp4',
            'file' => '1725632664.pdf',
            'url_course' => 'URL curso',
            'id_challenge_filter_category' => '1',

        ]);
    }
}
