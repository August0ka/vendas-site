<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->except('_token', '_method');

        if(isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
        
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }

    public function showRegister() {
        return view('site.register.index');
    }

    public function createRegister(Request $request) {
        $credentials = $request->validate([
            'name'     => 'required',
            'cpf'      => 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'state'    => 'required',
            'city'     => 'required',
            'address'  => 'required',
            
        ]);
        if($credentials) {
            $credentials['password'] = bcrypt($credentials['password']);
            User::create($credentials);
        }
        
        return redirect()->route('site.login.index');
    }
}
