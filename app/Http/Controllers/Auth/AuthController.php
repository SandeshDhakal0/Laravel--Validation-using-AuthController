<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function postLogin(Request $request){
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ]);

//        $credentials = $request->only('email','password');
//        if(Auth::attempt($credentials)){
//            return redirect()->intended('dashboard')->withSuccess('You are logged in.');
//        }
//        return redirect("login")->withSuccess('Check the email or password. Not valid.');
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                return redirect()->route('loggin')->with('Success');
            }
        }
//        dd($user);
    }

    public function postRegister(Request $request){


        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect("login")->with('You are successfully logged in.');
    }

    public function dashboard(){
//        if (Auth::check()){
//            return view('dashboard');
//        }
//        return redirect("dashboard")->with('Access not allowed.');
        echo('Hello');
    }

    public function create(array $array){
        return User::create([
           'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=> Hash::make($data['password'])
        ]);
    }

    public function logout(){
        session::flush();
        Auth::logout();
        return redirect('login');
    }
}
