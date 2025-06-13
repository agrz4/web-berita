<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    $author = Author::where('username', $username)->first();

    return view('pages.author.show', compact('author'));
}
