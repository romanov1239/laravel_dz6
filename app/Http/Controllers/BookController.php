<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book-add-form');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:books',
            'author' => 'required|string|max:100',
            'genre' => 'required|string'
        ]);

        $book = Book::create($validatedData);

        return response()->json('Book is successfully validated and data has been saved');
    }
    //
}
