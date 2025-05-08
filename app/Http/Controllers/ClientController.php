<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('clients.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('clients.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role_id' => 'required|exists:roles,id'
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => $validated['role_id']
            ]);

            return redirect()->route('clients.index')
                ->with('success', 'Usuario creado correctamente');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Error al crear el usuario: ' . $e->getMessage());
        }
    }
}