<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todos;
use App\Models\Category;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todos::all();
        $categories = Category::all();
        // dd($items, $categories);
        return view('index', ['items' => $items, 'categories' => $categories]);
    }

    public function store(TodoRequest $request)
    {
        $new_todo = $request->only(['category_id', 'content']);
        Todos::create($new_todo);
        return redirect('/')->with('status', 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $content = $request->only(['content']);
        Todos::find($request->id)->update($content);
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Todos::find($request->id)->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $categories = Category::all();

        $items = Todos::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->content)->get();

        return view('index', ['items' => $items, 'categories' => $categories]);
    }
}
