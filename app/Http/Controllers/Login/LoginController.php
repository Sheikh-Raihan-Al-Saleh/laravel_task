<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('Login.LoginView');
    }

    public function Login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
    
        if ($user && Hash::check($password, $user->password)) {
            session(['id' => $user->id]);
            session(['name' => $user->name]);
            $notification = [
                'message' => 'Login Successful!!',
                'alert-type' => 'success'
            ];
            return redirect()->route("product.view")->with($notification);
        } else {
            $notification = [
                'message' => 'Invalid Email or Password!! Please Provide Valid Info',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function Logout(Request $request){
    
        $request->session()->forget(['id', 'name']);
        $notification = array(
            'message' => 'User Signed Out!!',
            'alert-type' => 'info'
        );
        return redirect()->route('login')->with($notification);
    }
    
}
