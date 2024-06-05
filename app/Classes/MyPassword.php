<?php

namespace App\Classes;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Validation\Rules\Password;

class MyPassword extends Password {

    protected $min = 4;

    public static function default()
    {
        $password = is_callable(static::$defaultCallback)
            ? call_user_func(static::$defaultCallback)
            : static::$defaultCallback;

        return $password instanceof Rule ? $password : static::min(4);
    }


}
