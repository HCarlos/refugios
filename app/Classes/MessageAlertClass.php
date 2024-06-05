<?php

namespace App\Classes;

use Illuminate\Database\QueryException;

class MessageAlertClass {

    protected $Msg;
    public function __construct(){
        $this->Msg  = "";
    }

    public function Message(QueryException $e):string {
        $this->Msg = $e->errorInfo[2];
        if (str_contains($e->errorInfo[2],'duplicate key value')){
            $this->Msg = "Valor Duplicado";
        }
        return $this->Msg;
    }


}
