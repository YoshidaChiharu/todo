<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return view('category', ['items' => $items]);
    }

    public function store(Request $request)
    {
        $name = $request->only(['name']);
        Category::create($name);
        return redirect('/categories');
    }

    public function update(Request $request, $id)
    {
        $name = $request->only(['name']);
        Category::find($id)->update($name);
        return redirect('/categories');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('/categories');
    }

}
