<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully.');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid email or password.');
        }
    }

    //register user dari code
    public function register()
    {

        $user = new User();
        $user->name = 'Nurul Amni Nabihah';
        $user->email = 'nabihah@gmail.com';
        $user->role = 'admin';
        $user->password = Hash::make('nabihah3012'); // Hashing the password
        $user->save();

        return redirect()->route('admin.login')->with('success', 'User created successfully.');
    }
    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function logout()
    {
        AUth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    public function table()
    {

        return view('admin.table');
    }

    public function checkDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            return "Database connected successfully: " . DB::connection()->sistem_pengurusan_sekolah();
        } catch (\Exception $e) {
            return "Database connection failed: " . $e->getMessage();
        }
    }
}
