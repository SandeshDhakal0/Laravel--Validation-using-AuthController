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

        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                return redirect()->route('dashboard')->with('Success');
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

        return view('auth.dashboard');
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
