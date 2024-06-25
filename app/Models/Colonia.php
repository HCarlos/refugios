<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colonia extends Model{


    use SoftDeletes;

    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $table = 'colonias';
    protected $fillable = [
        'id',
        'colonia1_id', 'colonia1',
        'colonia_id','colonia',
        'comunidad_id','comunidad',
        'tipocomunidad_id','tipocomunidad',
        'creado_por_id',
    ];

    public function refugios(){
//        return $this->belongsToMany(Refugio::class);
        return $this->belongsToMany(Refugio::class,'colonia_refugio');
    }




}
