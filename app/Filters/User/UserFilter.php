<?php

namespace App\Filters\User;

use App\Filters\Common\QueryFilter;

class UserFilter extends QueryFilter
{


    public function rules(): array{
        return [
            'search' => '',
            'roles' => '',
        ];
    }

    public function search($query, $search){
        if (is_null($search) || empty ($search) || trim($search) == "") {return $query;}
        $search   = strtoupper($search);
        $filters  = $search;
        $F        = new FuncionesController();
        $tsString = $F->string_to_tsQuery( strtoupper($filters),' & ');
        return $query->whereRaw("searchtext @@ to_tsquery('spanish', ?)", [$tsString]);

    }

    public function roles($query, $roles){
        if (is_null($roles) ) {return $query;}
        if (empty ($roles)) {return $query;}
        return $query->whereHas('roles', function ($q) use ($roles) {
            $q->whereIn('role_id', $roles);
        });
    }



}
