<?php

namespace App\Controllers;

use App\Models\Book;

class BookController extends BaseController {
    
    // List all books
    public static function list() {
        $search = $_GET['search'] ?? '';
        $books = Book::search($search);
        
        self::loadView('books/page', [
            'title' => 'Books',
            'books' => $books,
            'search' => $search
        ]);
    }

    public function detail($id) {
        $book = Book::find($id); // Fetch the book by ID
        $author = $book->getAuthor(); // Get the author of the book
        
        // Pass book and author data to the view
        self::loadView('books/detail', [
            'book' => $book,
            'author' => $author
        ]);
    }

    public static function add() {
        self::loadView('books/form');
    }

    public function delete($id) {
        $book = Book::find($id); // Fetch the book by ID
        if ($book) {
            $book->delete(); // Delete the book
        }
        header('Location: /books'); // Redirect back to the books list
    }

    public static function save(){
        print_r($_POST);

        $book = new Book();
        $book->title = $_POST['title'];
        $book->description = $_POST['description'];

        $book->save();

        header('Location: /books');
    }

}
