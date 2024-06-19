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
        'id','refugio_id', 'numero', 'latitud', 'longitud',
        'activado', 'refugiocolonia_id', 'zona',
        'refugioruta_id','ruta', 'colonia1_id', 'colonia1',
        'colonia_id', 'colonia','comunidad_id','comunidad',
        'tipocomunidad_id','tipocomunidad',
    ];

    protected $casts = ['activado' => 'boolean'];

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
