<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showSignInForm()
    {
        return view('FE.auth.signin');
    }
    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $customer = Customer::where('email', $request->email)->first();
    
        if ($customer && Hash::check($request->password, $customer->password)) {
            Auth::login($customer);
                session(['user_name' => $customer->name]);
    
            return redirect()->route('homes')->with('success', 'Signed in successfully!');
        }
    
        return redirect()->back()->withInput()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function showSignUpForm()
    {
        return view('FE.auth.signup');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|confirmed', 
        ]);
    
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
    
        $customer->save();
    
        Auth::login($customer);
    
        return redirect()->route('auth.signin')->with('success', 'Account created and signed in successfully!');
    }
    

    public function signOut()
    {
        Auth::logout(); 
        session()->invalidate(); 
        session()->regenerateToken(); 
        return redirect()->route('auth.signin')->with('success', 'Signed out successfully!');
    }
}
