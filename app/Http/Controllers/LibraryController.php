<?php

namespace App\Http\Controllers;
use App\Models\Library;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::all();
        return view("library.index", ['libraries' => $libraries]);
    }
}
