<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct() {
        header("Access-Control-Allow-Origin: *");

        // Libera os métodos permitidos (GET, POST, etc.)
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        
        // Libera os headers permitidos (como Authorization, Content-Type, etc.)
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }

    use AuthorizesRequests, ValidatesRequests;
}
