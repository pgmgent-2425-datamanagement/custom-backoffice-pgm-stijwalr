<?php

namespace App\Models;

use App\Models\BaseModel;

class Book extends BaseModel {
    // Search method to find books by title
    protected function search($search) {

        $sql = 'SELECT * FROM `'.$this->table. '` WHERE title LIKE :search OR description LIKE :search ORDER BY id DESC';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute(
            [':search' => '%'.$search.'%']
        );
        $db_items = $pdo_statement->fetchAll();
        return self::castToModel($db_items);
    }

    public function save(){
        $sql = "INSERT INTO `books`(`title`, `description`) VALUES (:title, :description)";
        $pdo_statement = $this->db->prepare($sql);
        $succes = $pdo_statement->execute([
            ':title' => $this->title,
            ':description' => $this->description
        ]);

        var_dump($succes);
    }

    public function delete() {
        $sql = 'DELETE FROM `books` WHERE id = :id';
        $pdo_statement = $this->db->prepare($sql);
        return $pdo_statement->execute([':id' => $this->id]);
    }
    
    public function edit() {
        // Prepare SQL query to update the book's title and description
        $sql = "UPDATE `books` SET `title` = :title, `description` = :description WHERE `id` = :id";
        
        // Prepare the statement and execute the query with the new values
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':title' => $this->title,
            ':description' => $this->description,
            ':id' => $this->id
        ]);
        
        return $success; // Return whether the update was successful
    }
    

    public function getAuthor() {
        $sql = 'SELECT * FROM `authors` WHERE id = :author_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':author_id' => $this->author_id]);
        $author_data = $pdo_statement->fetch();
        
        // Assuming you have an Author model to cast the data to
        $authorModel = new Author();
        return $authorModel->castToModel($author_data); // This will return the author as a model object
    }
}

