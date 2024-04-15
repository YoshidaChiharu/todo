<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = [];
        return view('category', ['items' => $items]);
    }
}
