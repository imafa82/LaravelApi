<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model  {
    public function saluta($nome){
        return "ciao $nome";
    }
}
