<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::select([
            'sales.id',
            'users.name as user_name',
            'products.name as product_name',
            'sales.quantity',
            'sales.total',
        ])
            ->join('products', 'sales.product_id', 'products.id')
            ->join('users', 'sales.user_id', 'users.id')
            ->get();

        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index');
    }
}
