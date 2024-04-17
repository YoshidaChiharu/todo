<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return view('category', ['items' => $items]);
    }

    public function store(CategoryRequest $request)
    {
        $name = $request->only(['name']);
        Category::create($name);
        return redirect('/categories')->with('status', 'Categoryを作成しました');
    }

    public function update(CategoryRequest $request)
    {
        $name = $request->only(['name']);
        Category::find($request->id)->update($name);
        return redirect('/categories');
    }

    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/categories');
    }

}
