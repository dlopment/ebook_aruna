<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function user()
    {
        $user = User::All();
        return view('auth.index', compact('user'));
    }
    public function tambah()
    {
        $user = User::All();
        return view('auth.tambah', compact('user'));
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email Atau Password Salah');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(url('/home'))->with('succsess', 'Berhasil Melakukan Logout');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // Perbaikan penggunaan Validator::make dan kondisi pengecekan
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Memeriksa apakah validasi gagal (bukan `falls` tapi `fails`)
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        // Menyimpan data user ke dalam array
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        // Membuat user baru di database
        User::create($data);

        // Mengarahkan kembali ke halaman login setelah berhasil
        return redirect(url('/login')); // Menggunakan url() bukan URL()
    }
}
