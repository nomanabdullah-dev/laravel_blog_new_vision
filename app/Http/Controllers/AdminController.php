<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function makeLogin(Request $request)
    {
        $validator = $this->Validate($request, [
            'password' => 'required',
            'username' => 'required'
        ]);

        if(!$validator){
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = array(
            'username' => $request->username,
            'password' => $request->password
        );

        if (Auth::guard('admin')->attempt($data)) {
            return redirect('dashboard');
        }else{
            return back()->withErrors(['message'=>'Invalid email or password']);
        }

        // $admin = Admin::where('username',$request->username)->where('password',$request->password)->get()->toArray();
        // if ($admin) {
        //     echo "Yes";
        // }else{
        //     echo "no";
        // }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
