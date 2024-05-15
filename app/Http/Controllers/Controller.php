<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller
{
    // habilitar el trait de los policies laravel 11
    use AuthorizesRequests;
    use ValidatesRequests;
}
