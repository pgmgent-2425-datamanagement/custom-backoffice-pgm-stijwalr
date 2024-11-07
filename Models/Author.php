<?php

namespace App\Models;

use App\Models\BaseModel;

class Author extends BaseModel {
    protected function search($search) {
        $sql = 'SELECT * FROM `'.$this->table.'` WHERE firstname LIKE :search OR surname LIKE :search OR bio LIKE :search ORDER BY id DESC';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':search' => '%'.$search.'%']);
        $db_items = $pdo_statement->fetchAll();
        return self::castToModel($db_items);
    }

    public function save() {
        if (isset($this->id)) {
            // Update existing author
            $sql = "UPDATE `authors` SET `firstname` = :firstname, `surname` = :surname, `bio` = :bio WHERE `id` = :id";
            $pdo_statement = $this->db->prepare($sql);
            $success = $pdo_statement->execute([
                ':firstname' => $this->firstname,
                ':surname' => $this->surname,
                ':bio' => $this->bio,
                ':id' => $this->id
            ]);
        } else {
            // Insert new author
            $sql = "INSERT INTO `authors`(`firstname`, `surname`, `bio`) VALUES (:firstname, :surname, :bio)";
            $pdo_statement = $this->db->prepare($sql);
            $success = $pdo_statement->execute([
                ':firstname' => $this->firstname,
                ':surname' => $this->surname,
                ':bio' => $this->bio
            ]);
            if ($success) {
                $this->id = $this->db->lastInsertId(); // Set the ID of the newly inserted record
            }
        }

        return $success;
    }

    public function delete() {
        $sql = 'DELETE FROM `authors` WHERE id = :id';
        $pdo_statement = $this->db->prepare($sql);
        return $pdo_statement->execute([':id' => $this->id]);
    }

    public function getBooks() {
        $sql = 'SELECT books.*, authors.firstname, authors.surname 
                FROM `books` 
                INNER JOIN `authors` ON books.author_id = authors.id 
                WHERE books.author_id = :author_id';
    
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':author_id' => $this->id]);
    
        $db_items = $pdo_statement->fetchAll();
        
        $bookModel = new Book(); 
        return $bookModel->castToModel($db_items);
    }
    
    
    
}
