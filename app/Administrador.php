<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administrador';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo','estado','persona_id','empresa_id'];


    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
    
}
