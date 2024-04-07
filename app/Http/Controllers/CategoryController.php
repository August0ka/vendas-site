<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.form');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');

    }

    public function edit(Category $category)
    {
        return view('categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->except('_token', '_method');

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria deletada com sucesso!');
    }}
