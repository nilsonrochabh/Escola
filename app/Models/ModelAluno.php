<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAluno extends Model
{
    protected $table='aluno';
    protected $fillable=['nome','matricula','datanascimento','email','id_turma','status'];


    public function relTurma()
    {
        return $this->hasOne('App\Models\ModelTurma', 'id', 'id_turma');
    }


    

    public function search($filtro = null){
        $resultado = $this->where(function($query) use($filtro){
            if($filtro){
                $query->where('nome', 'LIKE',"%{$filtro}%");
            }

        })//->toSql();
        ->paginate();
        return $resultado;

    }
}
