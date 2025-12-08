<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    
    function login(Request $request){
        if(Auth::check()){
            return redirect()->route('devices.index');
        }
        return view('login');
    }

    function postLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->put('name', Auth::user()->name);
            $request->session()->put('email', Auth::user()->email);

            $user = Auth::user();
            if ($user->user_type === 'admin') {

                return redirect()->route('devices.index');

            } elseif ($user->user_type === 'user') {

                return abort(403, "Unauthorized Access");
                
            } 

        }
        return "Username Or Password is Incorrect!!!";
    }
    
    function dashboard(Request $request){
        $name = $request->session()->get('name');
        $email = $request->session()->get('email');

        $users = User::all();
        return view('devices.index' , compact('users'));
    }

    function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    function create(Request $request){
        $createArray = [
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('saeed@123'),
          'user_type' => 'admin'
        ];
        // User::insert($createArray);

        return "User Created Successfully!!!";
    }

    function edit($id){
        $user = User::findorFail($id);
        return view('users.edit' , compact('user'));
    }

    function update(Request $request , $id){
        $user = User::findorFail($id);

        $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('dashboard');
    }

    function destroy($id){
        $user = User::findorFail($id);
        $user->delete();

        return response()->json([ 'success' => true ]);
    }

}