<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model{
    //put your code here
    protected $table = 'fabricanti';
        
    protected  $fillable = array('nome', 'telefono');
    
    public function veicoli(){
        $this->hasMany('veicolo');
    }
}
