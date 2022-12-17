<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class AuthController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        // get one user with specified username
        $user = User::where('email', strtolower($email))->first();
        // check user and user password
        // redirect user back to previous route when credentials not matched
        if (is_null($user)) return back()->withErrors(['email'=>'Email tidak ditemukan!']);
        if (!Hash::check($password, $user->password)) return back()->withErrors(['password'=>'Password salah!']);

        //$request->session()->passwordConfirmed();
        // start session if session has not started yet
        if (!session()->isStarted()) session()->start();
        session()->put('logged', true);
        session()->put('user_id', $user->id);
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget(['logged', 'user_id']);
        return redirect()->route('auth.login')->with('message', 'anda berhasil logout!');
    }

    public function register()
    {
        return view("auth.register");
    }

    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'email' => 'required',
        ]);
        $validated =  $validator->validated();
        $request -> validate(['password' => 'required']);
        $validated['password'] = Hash::make($request->input("password"));
        User::query()->create($validated);
        return redirect()->back();
    }
}
