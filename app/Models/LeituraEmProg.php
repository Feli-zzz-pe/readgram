<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeituraEmProg extends Model
{
    protected $table = "leitura_em_progresso";

    public function leitor(){
        return $this->belongsTo(Leitor::class);
    }

    public function livro() {//: BelongsTo {
        return $this->belongsTo(Livro::class);
    }
}
