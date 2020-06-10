<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'programes';

    protected $fillable = [
        'nom_programa', 'descripcio', 'tipus', 'classificacio', 'graella_id', 
    ];
    
    // One to Many inverse amb Graella
    /**
     * Get la graella a la que pertany el programa
     */
    public function graella()
    {
        return $this->belongsTo('App\Graella');
    }
}
