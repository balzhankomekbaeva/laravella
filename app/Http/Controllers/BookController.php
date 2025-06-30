<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show($id){
        $author = Author::find(1);
        $author->books()->attach($id);
        dd($author->books);


//        $book = new Book();
//        $book->title = 'my life 3';
//        $book->save();
//        dd($book);


//        $book = Book::create(['title'=>'my life 2']);
//        $author = Author::find(1);
//        $author->books()->attach($book->id);
//        dd($author->books);
        return view('books.index', ['id' => $id]);
    }
}
