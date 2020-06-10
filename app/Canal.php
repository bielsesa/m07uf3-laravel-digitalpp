<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_canal', 
    ];

    protected $table = 'canals';
    
    // One to Many relation amb Graella
    /**
     * Get la graella a la que pertany el programa
     */
    public function graelles()
    {
        return $this->hasMany('App\Graella');
    }
}
