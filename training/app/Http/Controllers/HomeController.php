<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }
    
    public function postRegister(Request $request){
        $validatedData  = $request->validate([
            'name'      => 'required|max:50',
            'email'     => 'required|unique:users,email',
            'pass'      => 'required|min:6|max:32',
            'confirm'   => 'required|same:pass',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->save();
        return redirect('/');
    }

    public function login()
    {
        return view('pages.login');
    }
    
    public function postLogin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass], $request->remember)) {
            return redirect('/');
        }
        else{
            return redirect()->back()->with('messege','login fail');
        }
    }

    public function show(){
        $user = User::all();
        return view('admin.pages.home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
