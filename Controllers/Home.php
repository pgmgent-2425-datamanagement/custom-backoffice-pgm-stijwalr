<?php

namespace App\Controllers;

use App\Models\Author;

class HomeController extends BaseController {

    public static function index () {

       $authors =  Author::all();

        print

        self::loadView('/home', [
            'title' => 'Home',
            'authors' => $authors,
        ]);
    }

    public static function edit ($id) {
        $author = Author::find($id);
        self::loadView('/edit', [
            'title' => 'Edit author',
            'author' => $author
        ]);
    }

}