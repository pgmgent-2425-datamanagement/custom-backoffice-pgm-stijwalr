<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\BookGenre;
use App\Models\Author;

class BookController extends BaseController {
    
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
        $book = Book::find($id);
        $author = $book->getAuthor();
        
        self::loadView('books/detail', [
            'book' => $book,
            'author' => $author
        ]);
    }

    public static function add() {
        $genres = Genre::all(); 
        $authors = Author::all();

        self::loadView('books/form', ['genres' => $genres, 'authors' => $authors]);
    }

    public static function stats() {
        $bookGenre = new BookGenre();
    $booksCountByGenre = $bookGenre->getBooksCountByGenre();

    self::loadView('statistic/page', [
        'title' => 'Stats',
        'booksCountByGenre' => $booksCountByGenre
    ]);
    }

    public function delete($id) {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
        }
        header('Location: /books');
    }

    public function edit($id) {
        $book = Book::find($id);
        $author = $book->getAuthor(); // To display the current author's details
        $genres = Genre::all(); // Get all genres
        $authors = Author::all(); // Get all authors for the dropdown
        
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->saveEdit($id);
        }
    
        self::loadView('books/edit', [
            'book' => $book,
            'author' => $author,
            'genres' => $genres,
            'authors' => $authors, // Pass the list of authors
        ]);
    }
    
    public function saveEdit($id) {
        $book = Book::find($id);
        if ($book) {
            // Update the book details
            $book->title = $_POST['title'];
            $book->description = $_POST['description'];
            $book->author_id = $_POST['author_id'] ?? $book->author_id;
    
            // Handle genre selection or creation
            if (isset($_POST['new_genre']) && !empty($_POST['new_genre'])) {
                $existingGenre = Genre::findByName($_POST['new_genre']);
                if (!$existingGenre) {
                    $genreController = new GenreController();
                    $genreController->save();
                    $newGenre = Genre::findByName($_POST['new_genre']);
                    $genre_id = $newGenre->id;
                } else {
                    $genre_id = $existingGenre->id;
                }
            } else {
                $genre_id = $_POST['genre_id'];
            }
    
            // Update the book-genre relationship
            $bookGenre = new BookGenre();
            $existingBookGenre = $bookGenre->findByBookId($book->id);
            if ($existingBookGenre) {
                $bookGenre->updateGenre($book->id, $genre_id);
            } else {
                $bookGenre->book_id = $book->id;
                $bookGenre->genre_id = $genre_id;
                $bookGenre->save();
            }
    
            $book->genre_id = $genre_id;
            $book->edit();
    
            header('Location: /books/' . $book->id);
            exit;
        }
    }
    
    
    public function save() {
        // Check if a new genre is provided
        if (isset($_POST['new_genre']) && !empty($_POST['new_genre'])) {
            // Check if the genre already exists
            $existingGenre = Genre::findByName($_POST['new_genre']);
            
            if (!$existingGenre) {
                // If the genre does not exist, create a new one
                $genreController = new GenreController();
                $genreController->save(); // Assuming this method saves the genre
                
                // Fetch the newly created genre
                $newGenre = Genre::findByName($_POST['new_genre']);
                $genre_id = $newGenre->id; // Set the genre_id to the newly created genre's ID
            } else {
                $genre_id = $existingGenre->id; // Use the existing genre ID
            }
        } else {
            // If no new genre, use the selected genre_id
            $genre_id = $_POST['genre_id'];
        }
    
        // Handle author selection or creation
        if (isset($_POST['new_author']) && !empty($_POST['new_author'])) {
            // Check if the author already exists
            $existingAuthor = Author::findByName($_POST['new_author']);
            
            if (!$existingAuthor) {
                // If the author does not exist, create a new one
                $author = new Author();
                $author->firstname = $_POST['new_author_firstname'];
                $author->surname = $_POST['new_author_surname'];
                $author->bio = $_POST['new_author_bio'];
                $author->save(); // Save the new author
                
                // Set the author_id to the newly created author's ID
                $author_id = $author->id;
            } else {
                $author_id = $existingAuthor->id; // Use the existing author ID
            }
        } else {
            // If no new author, use the selected author_id
            $author_id = $_POST['author_id'];
        }
    
        // Now save the book
        $book = new Book();
        $book->title = $_POST['title'];
        $book->description = $_POST['description'];
        $book->author_id = $author_id;
        $book->save(); // Save the book details
    
        // Save the book-genre relationship (book_genre table)
        $bookGenre = new BookGenre();
        $bookGenre->book_id = $book->id;
        $bookGenre->genre_id = $genre_id;
        $bookGenre->save(); // Insert into the book_genre table
        
        // Redirect to the books page or the newly created book's page
        header('Location: /books');
        exit;
    }
    
    
}
