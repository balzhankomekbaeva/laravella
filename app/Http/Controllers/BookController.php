<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id){
//        $books = Book::all();
//        dd($books);
        return view('books.index', ['id' => $id]);
    }

//    public function show($id){
//        $book = Book::find($id);
//        dd($book->author);
//        return view('books.index', ['id' => $id]);
//    }
}
