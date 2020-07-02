<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table= 'books';
    protected $fillable= ['titulo', 'id_user', 'paginas', 'preço'];

    public function relUsers(){
        return $this->hasOne('App\User','id', 'id_user');
    }
}
