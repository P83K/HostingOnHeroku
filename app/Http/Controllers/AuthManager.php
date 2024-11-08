<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
			'email' => 'required',
            'password' => 'required',
        ]);

        $cred = $request->only('email','password');
        if(Auth::attempt($cred)){
            return redirect()->intended(route('home'));
        }
        return redirect()->route('login')->with('error', 'Błędny email lub hasło');
    }



    function registrationPost(Request $request){
        $request->validate([
			'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect()->route('registration')->with('error', 'Nie mozna utworzyc konta');
        }

        return redirect()->route('events.index')->with('success', 'Konto utworzone pomyslnie');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('events.index');
    }


    public function update(Request $request)
    {
         //validate

        $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
            'newpassword2'=> 'required|same:newpassword',
        ]);
        
        $current_user = auth()->user();
        if(Hash::check($request->password, $current_user->password)){
            $current_user->update([
                'password' => Hash::make($request->newpassword)
            ]);
            return redirect()->route('events.index')->with('error', 'Udało sie zmienic hasło');
        }
        else{
            return redirect()->route('changePassword')->with('error', 'Nie udało sie zmienic hasła');
        }

    }

    function changePassword(){
        return view('changePassword');
    }

}
