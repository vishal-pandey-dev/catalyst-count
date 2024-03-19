<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $login = $request->only('email','password');
        if(!Auth::attempt($login)){
            return redirect()->route('user.login');
        }
        /**
         * @var User $user
         */
        $user = Auth::user();
        return redirect()->route('csvupload');
    }
}
