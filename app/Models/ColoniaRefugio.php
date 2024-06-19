<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColoniaRefugio extends Model{

    use SoftDeletes;

    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $table = 'colonias_refugios';
    protected $appends = ['full_comunidad',];

    protected $fillable = [
        'id','refugio_id',
        'refugioruta_id','ruta','colonia_id',
        'colonia','comunidad_id','comunidad',
        'tipocomunidad_id','tipocomunidad',
    ];

    public function getFullComunidadAttribute(){
        return "{$this->ruta} {$this->comunidad}";
    }

    public function ruta(){
        return $this->hasOne(RutaRefugio::class,'id','refugioruta_id');
    }

    public function rutas(){
        return $this->hasMany(RutaRefugio::class,'id','refugioruta_id');
    }

    public function refugio(){
        return $this->hasOne(Refugio::class,'id','refugio_id');
    }

    public function refugios(){
        return $this->hasMany(Refugio::class,'id','refugio_id');
    }


}
