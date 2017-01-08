<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model{
    //put your code here
    protected $table = 'fabricanti';
        
    protected  $fillable = array('nome', 'telefono');
    
    protected $hidden = ['created_at', 'updated_at'];
    
    public function veicoli(){
        return $this->hasMany('App\Veicolo');
    }
}
