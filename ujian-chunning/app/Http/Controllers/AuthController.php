<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function do_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // get one user with specified username
        $user = User::where('username', strtolower($username))->first();
        // check user and user password
        // redirect user back to previous route when credentials not matched
        if (is_null($user) || !Hash::check($password, $user->password)) return redirect()->back()->with('error', 'Username / password salah!');

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

    public function do_register(Request $request) {
        $request->validate([
            'username'     => 'required',
        ]);
        $payload = [
            "username"          =>  $request->input("username"),
            "email"             =>  $request->input("email"),
            "password"          =>  $request->input("password"),
            "role"              =>  $request->input("role"),
        ];
        $request->get("username");
        $request->all();
        $request->post("username");
        $request->acceptsJson();
        $request->allFiles();
        $request->bearerToken();
        $request->getMethod();
        $request->session();
        session();
        $request->url();
        $request->header("Authoriation");
        User::query()->create($payload);
        return redirect()->back();
    }
}
