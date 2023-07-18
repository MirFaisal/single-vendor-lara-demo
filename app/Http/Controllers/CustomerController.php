<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    function index()
    {
        return view('customer-register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Customer::class],
            'password' => ['required', 'confirmed'],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Auth::login($customer);

        return redirect()->intended('/');
    }

    function loginIndex()
    {
        return view('customer-login');
    }
    function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // $customer = Customer::where('email', $request->email)->first();
        // dd($request->all());
        // dd($customer);
        if (Auth::guard('customer_guard')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Auth::attempt(['email' => $request->email, 'password' => $$request->password]);
            $customer = Auth::guard('customer_guard')->user();
            // dd($customer);
            $products = Product::all();
            
            return view('welcome', compact(['products', 'customer']));
        }
        return redirect()->back();
    }

    function logout(Request $request)
    {
        dd(Auth::user());
    }
}