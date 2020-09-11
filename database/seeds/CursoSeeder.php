<?php

use Illuminate\Database\Seeder;
use App\Models\ModelCurso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ModelCurso $curso)
    {
        $curso->create([
            'nome'=>'Matemática',
            'sigla'=>'M',
            'id_escola'=>'1'
        ]);
        $curso->create([
            'nome'=>'Fisica',
            'sigla'=>'F',
            'id_escola'=>'2'
        ]);
        $curso->create([
            'nome'=>'Informática',
            'sigla'=>'I',
            'id_escola'=>'2'
        ]);
        $curso->create([
            'nome'=>'História',
            'sigla'=>'H',
            'id_escola'=>'3'
        ]);
        
    }
}
