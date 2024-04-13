<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store()
    {}

    public function update()
    {}

    public function destroy()
    {}
}
