<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColoniaRefugio extends Model{

    use SoftDeletes;

    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $table = 'colonia_refugio';

    protected $fillable = [
        'id','refugio_id','colonia_id',
    ];

    public function refugio(){
        return $this->hasOne(Refugio::class,'id','refugio_id');
    }
    public function refugios(){
        return $this->hasMany(Refugio::class,'id','refugio_id');
    }

    public function colonia(){
        return $this->hasOne(Colonia::class,'id','colonia_id');
    }
    public function colonias(){
        return $this->hasMany(Colonia::class,'id','colonia_id');
    }


}
