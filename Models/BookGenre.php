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
}
