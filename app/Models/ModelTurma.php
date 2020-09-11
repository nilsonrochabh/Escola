<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTurma extends Model
{
    protected $table='turma';
    protected $fillable=['nome', 'sigla', 'descricao', 'turno','id_serie'];


    public function relSerie()
    {
        return $this->hasOne('App\Models\ModelSerie', 'id','id_serie');
    }
    public function relAluno()
    {
        return $this->hasMany('App\Models\ModelAluno', 'id_aluno');
    }

}

