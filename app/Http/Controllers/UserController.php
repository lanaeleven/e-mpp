<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = config('kode.roles');
        $rsList = config('kode.rs');
        return view('users.index', compact('users', 'roles', 'rsList'));
    }

    public function create()
    {
        $roles = config('kode.roles');
        $rsList = config('kode.rs');
        return view('users.create', compact('roles', 'rsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users',
            'username'  => 'required|string|unique:users',
            'password'  => 'required|string',
            'kode_role' => 'required|integer',
            'kode_rs'   => 'required|integer',
        ]);
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'kode_role' => $request->kode_role,
            'kode_rs'   => $request->kode_rs,
        ]);
        return redirect()->route('mppuser-7f3a2b.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $mppuser_7f3a2b)
    {
        $roles = config('kode.roles');
        $rsList = config('kode.rs');
        return view('users.edit', [
            'user' => $mppuser_7f3a2b,
            'roles' => $roles,
            'rsList' => $rsList
        ]);
    }

    public function update(Request $request, User $mppuser_7f3a2b)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $mppuser_7f3a2b->id,
            'username'  => 'required|string|unique:users,username,' . $mppuser_7f3a2b->id,
            'kode_role' => 'required|integer',
            'kode_rs'   => 'required|integer',
        ]);
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'username'  => $request->username,
            'kode_role' => $request->kode_role,
            'kode_rs'   => $request->kode_rs,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $mppuser_7f3a2b->update($data);
        return redirect()->route('mppuser-7f3a2b.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $mppuser_7f3a2b)
    {
        $mppuser_7f3a2b->delete();
        return redirect()->route('mppuser-7f3a2b.index')->with('success', 'User berhasil dihapus');
    }
}
