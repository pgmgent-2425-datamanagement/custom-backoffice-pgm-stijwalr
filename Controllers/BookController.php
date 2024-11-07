<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\BookGenre;
use App\Models\Author;

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
        $genres = Genre::all(); 
        $authors = Author::all(); // Assuming Author::all() fetches all authors

        // Get all genres
        self::loadView('books/form', ['genres' => $genres,         'authors' => $authors
    ]);
    }

    public function delete($id) {
        $book = Book::find($id); // Fetch the book by ID
        if ($book) {
            $book->delete(); // Delete the book
        }
        header('Location: /books'); // Redirect back to the books list
    }

    public function edit($id) {
        // Fetch the book and author for the edit form
        $book = Book::find($id);
        $author = $book->getAuthor();
    
        // Load the edit form view
        self::loadView('books/edit', [
            'book' => $book,
            'author' => $author
        ]);
    }
    
    public function saveEdit($id) {
        // Fetch the book to be edited
        $book = Book::find($id);
        if ($book) {
            // Update the book with the form data
            $book->title = $_POST['title'];
            $book->description = $_POST['description'];
            $book->author_id = $_POST['author_id'] ?? $book->author_id; // Update author if needed
    
            // Save the updated book
            $book->edit();
    
            // Redirect to the book detail page after the update
            header('Location: /books/' . $book->id);
            exit;
        }
    }
    
    

    public function save() {
        // Handle genre input (either select or new genre)
        if (isset($_POST['new_genre']) && !empty($_POST['new_genre'])) {
            // Check if the genre already exists
            $existingGenre = Genre::findByName($_POST['new_genre']);
            
            if (!$existingGenre) {
                // Save the new genre if it doesn't exist
                $genreController = new GenreController();
                $genreController->save(); // Save the new genre via GenreController
        
                // Fetch the newly created genre
                $newGenre = Genre::findByName($_POST['new_genre']);
                $genre_id = $newGenre->id;
            } else {
                // Use the existing genre
                $genre_id = $existingGenre->id;
            }
        } else {
            // Use the selected genre
            $genre_id = $_POST['genre_id'];
        }
        
        // Handle author input (either select or new author)
        if (isset($_POST['new_author']) && !empty($_POST['new_author'])) {
            // Check if the author already exists
            $existingAuthor = Author::findByName($_POST['new_author']);
            
            if (!$existingAuthor) {
                // Create and save the new author if it doesn't exist
                $author = new Author();
                $author->firstname = $_POST['new_author_firstname'];
                $author->surname = $_POST['new_author_surname'];
                $author->bio = $_POST['new_author_bio'];
                $author->save();
                
                // Fetch the newly created author
                $author_id = $author->id;
            } else {
                // Use the existing author
                $author_id = $existingAuthor->id;
            }
        } else {
            // Use the selected author
            $author_id = $_POST['author_id'];
        }
        
        // Create and save the new book
        $book = new Book();
        $book->title = $_POST['title'];
        $book->description = $_POST['description'];
        $book->author_id = $author_id; // Associate the book with the author
        $book->save();
        
        // Associate the book with the genre in the book_genre table
        $bookGenre = new BookGenre();
        $bookGenre->book_id = $book->id;
        $bookGenre->genre_id = $genre_id;
        $bookGenre->save();
        
        // Redirect to books list
        header('Location: /books');
        exit;
    }
    
    
    
    

}
