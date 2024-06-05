<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model {

    use HasRoles;
    use SoftDeletes;

    protected $guard_name = 'web'; // or whatever guard you want to use
    protected $table = 'permissions';

    protected $fillable = ['id','name','descripcion','abreviatura',];

    public static function findByName($name){
        return static::where( 'name',$name )->first();
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function users() {
        // Esta en muchos Roles
        return $this->belongsToMany(User::class);
    }


}
