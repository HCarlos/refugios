<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refugio extends Model {

    use SoftDeletes;

    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $table = 'refugios';
    protected $fillable = [
        'id','numero',
        'refugio','ubicacion','ubicacion_google',
        'enlace','telefonos','observaciones',
        'latitud','longitud','html','infraestructura','capacidad',
        'activado','poligono','categoria',
        'imagen','refugiorutaid',
        ];
    protected $casts = ['activado'=>'boolean',];

    public function ruta(){
        return $this->hasOne(RutaRefugio::class,'id','refugiorutaid');

    }

    public function colonias(){
        return $this->belongsToMany(Colonia::class,'colonia_refugio');
//        return $this->HasMany('colonia_refugio', 'colonia_id','id');
    }








}
