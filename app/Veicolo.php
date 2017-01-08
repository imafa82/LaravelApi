<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Description of veicolo
 *
 * @author Massy
 */
class Veicolo  extends Model {
    //put your code here
    protected $table = 'veicoli';
    
    protected $primaryKey = 'id';
    
    protected  $fillable = array('colore', 'cilindrata', 'potenza', 'peso', 'fabricante_id');
    
    protected $hidden = ['created_at', 'updated_at'];
    
    public function fabricante(){
        return $this->belongsTo('App\Fabricante');
    }
}
