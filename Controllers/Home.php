<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;

class HomeController extends BaseController {

    public static function index () {

       $authors =  Author::all();
       $book = Book::all();

        print

        self::loadView('/home', [
            'title' => 'Home',
            'authors' => $authors,
            'books' => $book
        ]);
    }

    public static function edit ($id) {
        $author = Author::find($id);
        // print_r($author);

        // load view
        self::loadView('/edit', [
            'title' => 'Edit author',
            'author' => $author
        ]);
    }

}