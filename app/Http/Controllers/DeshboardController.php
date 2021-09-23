<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeshboardController extends Controller {

    public function deshboard() {
        return view('admin.deshboard');
    }

}
