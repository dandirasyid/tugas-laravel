<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function register() {
        return view('auth.register');
    }

    public function registerUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:superadmin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => null,
            'umur' => null,
            'tanggal_lahir' => null,
            'alamat' => null,
        ]);

        $user->assignRole($request->role);

        if ($user) {
            return redirect()->route('products.index')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('register')
                ->with('error', 'Failed to create user');
        }
    }

    public function login() {
        return view('auth.login');
    }

    public function loginUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('products.index');
        } else {
            return redirect()->route('login')
                ->with('error', 'Login failed email or password is incorrect');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index() {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $users = User::latest()->get();
        return view('users.index', compact('user', 'users'));
    }

    public function create() {
        $user = Auth::user();
        return view('users.create', compact('user'));
    }

    public function store(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:superadmin,user',
            'gender' => 'required|in:Male,Female',
            'umur' => 'required|min:1|integer',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole($request->role);

        if ($user) {
            return redirect()->route('user.index')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('user.create')
                ->with('error', 'Failed to create user');
        }
    }

    public function edit($id) {
        $user = Auth::user();
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'gender' => 'required|in:Male,Female',
            'umur' => 'required|integer|min:1',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->umur = $request->umur;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('user.index');
    }

    public function delete($id) {
        $user = Auth::user();
        if ($user->id == $id) {
            return redirect()->route('user.index')->with('error', 'You cannot delete yourself');
        }
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.index');
        }
    }
}
