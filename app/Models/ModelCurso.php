<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCurso extends Model
{
    protected $table='curso';
    protected $fillable=['nome','id_escola','sigla'];

    
    public function relEscola()
    {
        return $this->hasOne('App\Models\ModelEscola', 'id', 'id_escola');
    }
   
    public function relSerie()
    {
        return $this->hasMany('App\Models\ModelSerie', 'id_curso');
    }

}
