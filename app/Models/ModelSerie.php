<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSerie extends Model
{
    protected $table='serie';
    
    protected $fillable=['nome','sigla','descricao','id_curso'];

    
    public function relCurso()
    {
        return $this->hasOne('App\Models\ModelCurso', 'id', 'id_curso');
    }
    public function relTurma()
    {
        return $this->hasMany('App\Models\ModelTurma', 'id_serie');
    }

  

}
