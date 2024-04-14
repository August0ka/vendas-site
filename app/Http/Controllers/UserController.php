<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sale;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();

        foreach ($users as $user) {
            $user->cpf = substr($user->cpf, 0, 3) . '.' . substr($user->cpf, 3, 3) . '.' .substr($user->cpf, 6, 3) . '-' . substr($user->cpf, 9, 2);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(isset($data['cpf'])) {
            $cpf = str_replace(['.', '-'], '', $data['cpf']);
            $data['cpf'] = $cpf;
        }

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

        if(isset($data['cpf'])) {
            $cpf = str_replace(['.', '-'], '', $data['cpf']);
            $data['cpf'] = $cpf;
        }

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
        }

        if($credentials['cpf']) {
            $cpf = str_replace(['.', '-'], '', $credentials['cpf']);
            $credentials['cpf'] = $cpf;
        }

        User::create($credentials);

        return redirect()->route('site.login.index');
    }

    public function showUserOrders() {
        $categories = Category::all();
        $loggedUser = auth()->user();

        $userOrders = Sale::select([
            'sales.id',
            'sales.total',
            'sales.quantity',
            'sales.created_at',
            'users.name as user_name',
            'products.id as product_id',
            'products.name as product_name',
            'products.main_image as product_image',
        ])
            ->join('products', 'sales.product_id', 'products.id')
            ->join('users', 'sales.user_id', 'users.id')
            ->where('user_id', $loggedUser->id)
            ->orderBy('sales.created_at', 'desc')
            ->get();

        return view('site.user.orders', compact('userOrders', 'categories'));
    }

}
