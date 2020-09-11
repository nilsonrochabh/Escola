<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelEscola extends Model
{
    protected $table='escola';
    protected $fillable=['name','sigla','telefone','cidade','estado'];


    public function relCurso()
    {
        return $this->hasMany('App\Models\ModelCurso', 'id_escola');
    }

}
