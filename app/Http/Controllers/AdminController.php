<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator;
use Auth;


class AdminController extends Controller {

    public function authenticated(Request $request) {

        $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('admin.deshboard');
        } else {
            session()->flash('error', 'Either Email/Password incorrent');
            return back()->withInput($request->only('email'));
        }
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
