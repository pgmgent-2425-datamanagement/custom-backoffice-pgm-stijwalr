<?php

namespace App\Models;

class BookGenre extends BaseModel {
    public $book_id;
    public $genre_id;

    // Save the book-genre relationship to the database
    public function save() {
        $sql = "INSERT INTO `book_genre` (`book_id`, `genre_id`) VALUES (:book_id, :genre_id)";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':book_id' => $this->book_id,
            ':genre_id' => $this->genre_id,
        ]);
    }

    public static function getBooksByGenre() {
        $sql = "SELECT genres.name AS genre, COUNT(book_genre.book_id) AS book_count
                FROM genres
                LEFT JOIN book_genre ON genres.id = book_genre.genre_id
                GROUP BY genres.name";

        $pdo_statement = (new self)->db->prepare($sql);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();
    }

    public function getBooksCountByGenre() {
        $sql = "
            SELECT g.name AS genre_name, COUNT(bg.book_id) AS book_count
            FROM genres g
            LEFT JOIN book_genre bg ON g.id = bg.genre_id
            GROUP BY g.id, g.name
        ";
        
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();
    }

    public function findByBookId($book_id) {
        $sql = 'SELECT * FROM `book_genre` WHERE `book_id` = :book_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':book_id' => $book_id]);
        return $pdo_statement->fetch();
    }

    public function updateGenre($book_id, $genre_id) {
        $sql = "UPDATE `book_genre` SET `genre_id` = :genre_id WHERE `book_id` = :book_id";
        $pdo_statement = $this->db->prepare($sql);
        return $pdo_statement->execute([
            ':book_id' => $book_id,
            ':genre_id' => $genre_id
        ]);
    }
}
