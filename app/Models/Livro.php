<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = "livro";

    public function leitura_em_progresso(){
        return $this->hasMany(LeituraEmProg::class);
    }
}
