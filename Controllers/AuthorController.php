<?php

namespace App\Controllers;

use App\Models\Author;

class AuthorController extends BaseController {
    
    // List all books
    public static function list() {
        $search = $_GET['search'] ?? '';
        $authors = Author::search($search);
        
        self::loadView('authors/page', [
            'title' => 'Authors',
            'authors' => $authors,
            'search' => $search
        ]);
    }

    // Show detail of a book
    public function delete($id) {
        $author = Author::find($id); // Fetch the author by ID
        if ($author) {
            $author->delete(); // Delete the author
        }
        header('Location: /authors'); // Redirect back to the authors list
    }
    

    public static function add() {
        self::loadView('authors/form');
    }

    public static function save() {
        $author = new Author();
        $author->firstname = $_POST['firstname'];
        $author->surname = $_POST['surname'];
        $author->bio = $_POST['bio'];
        $author->age = $_POST['age'];
    
        $author->save();
    
        header('Location: /authors');
    }
    
    // In AuthorController.php

public function detail($id) {
    // Find the author by ID
    $author = Author::find($id);

    if ($author) {
        // Get books of the author
        $books = $author->getBooks(); // Make sure you are fetching books

        // Load the view and pass the author and books data
        self::loadView('authors/detail', [
            'author' => $author, // Pass the author details
            'books' => $books   // Pass the books array
        ]);
    } else {
        // Handle case where author is not found (optional)
        self::loadView('error', [
            'message' => 'Author not found.'
        ]);
    }
}



}