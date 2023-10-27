<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLoginForm() {
        return view('auth.login');
    }

    public function loginUser(Request $request){
        $this->validate($request, [
            'email' => ['required', 'email','max:255'],
            'password'=> ['required', 'min:6', 'max:255'],
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->with(['status'=> 'danger', 'message' => 'Email/password is incorrect']);
        }
    }

    public function getRegisterForm() {
        return view('auth.register');   
    }

    public function registerUser(Request $request) {
        $this->validate($request, [
            'fullname' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'unique:users','max:255'],
            'password'=> ['required', 'min:6', 'max:255', 'confirmed'],
        ]);
        $data = $request->all();
        $data['name'] = $data['fullname'];

        try {
            $user = User::create($data);
            return redirect(route('showings.index'))
            ->with(['status'=> 'success' , 'message'=> 'User registered successfully']);
        } catch (\Throwable $th) {
            return redirect(route('showings.index'))
            ->with(['status'=> 'danger' , 'message'=> 'User registration not successful. Try again later']);
        }

    }

    public function logoutUser(Request $request) {
        $request->session()->invalidate();
        return redirect(route('showings.index'))->with([
            'status' => 'info', 'message' => 'Logout successful'
        ]);
    }  
}
