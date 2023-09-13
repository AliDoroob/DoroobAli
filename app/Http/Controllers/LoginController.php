<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 



class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('login'); 
    }

    public function submitLoginForm(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

 
        if (Auth::attempt(['email' => $email, 'password' => $password]) && Auth::user()->role_id != 1) {
            return redirect()->intended('/admin')->with('success', 'تم تسجيل الدخول بنجاح');
        }
else{
    return redirect()->route('access');

}
        return back()->withErrors(['email' => 'بي خطأ بالبريد أو كلمة السر'])->withInput();
    }

    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); 
    }




}
