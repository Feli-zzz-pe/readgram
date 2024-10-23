<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    protected $table = "leitor";
    protected $fillable = [
        nome_de_usuario,
        primeiro_nome,
        sobrenome,
        data_de_nascimento,
        descricao
    ];

    public function leitura_em_progresso(){
        return $this->hasMany(LeituraEmProg::class);
    }
}
