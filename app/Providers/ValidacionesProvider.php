<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;

class ValidacionesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('mi_pwd', function($attribute, $value, $parameters, $validator)
        {
            /* Minimo 8 caracteres
            *  Maximo 15
            *  Al menos una letra mayúscula
            *  Al menos una letra minucula
            *  Al menos un dígito
            *  No espacios en blanco
            *  Al menos 1 caracter especial
            return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/', $value);
            */
            return preg_match('/^[A-Za-z\d$@$!%*?&]{8,15}/', $value);
        });

        Validator::extend('check_dns', function ($attribute, $value, $parameters, $validator) {
            return (new EmailValidator())->isValid($value, new DNSCheckValidation());
        });
    }
}
