<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graella extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'graelles';

    protected $fillable = [
        'hora', 'dia', 'canal_id', 
    ];

    // One to Many relation amb Programa
    /**
     * Get la graella a la que pertany el programa
     */
    public function programes()
    {
        return $this->hasMany('App\Programa');
    }

    // One to Many inverse amb Canal
    /**
     * Get el canal al que pertany la graella
     */
    public function canal()
    {
        return $this->belongsTo('App\Canal');
    }
}
