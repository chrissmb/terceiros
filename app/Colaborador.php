<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = "colaboradores";
    
    public function empresa() {
        return $this->belongsTo('App\Empresa');
    }
}
