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
    
    protected $primaryKey = 'serie';
    
    protected  $fillable = array('colore', 'cilindrata', 'potenza', 'peso', 'fabricante_id');
    
    public function fabricante(){
        $this->belongsTo('Fabricante');
    }
}
