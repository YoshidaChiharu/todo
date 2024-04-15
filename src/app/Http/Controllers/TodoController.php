<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todos;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todos::all();
        // dd($items);
        return view('index', ['items' => $items]);
    }

    public function store(TodoRequest $request)
    {
        $content = $request->only(['content']);
        // dd($content);
        Todos::create($content);
        return redirect('/')->with('status', 'Todoを作成しました');
    }

    public function update(TodoRequest $request, $id)
    {
        $content = $request->only(['content']);
        Todos::find($id)->update($content);
        return redirect('/');
    }

    public function destroy($id)
    {
        // dd($id);
        Todos::find($id)->delete();
        return redirect('/');
    }
}
