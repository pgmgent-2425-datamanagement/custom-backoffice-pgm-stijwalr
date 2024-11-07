<?php

namespace App\Models;

class Genre extends BaseModel {
    public $name;

    // Save the genre to the database
    public function save() {
        $sql = "INSERT INTO `genres`(`name`) VALUES (:name)";
        $pdo_statement = $this->db->prepare($sql); // Use $this->db for instance methods
        $pdo_statement->execute([
            ':name' => $this->name,
        ]);
    }

    // Fetch all genres from the database
    public static function all() {
        // Create an instance of Genre (which extends BaseModel)
        $instance = new self(); 
        $sql = "SELECT * FROM `genres`";
        $pdo_statement = $instance->db->prepare($sql); // Use $instance->db here
        $pdo_statement->execute();

        // Call castToModel on an instance of the class
        return $instance->castToModel($pdo_statement->fetchAll());
    }

    // Find a genre by name
    public static function findByName($name) {
        // Create an instance of Genre (which extends BaseModel)
        $instance = new self(); 
        $sql = "SELECT * FROM `genres` WHERE `name` = :name";
        $pdo_statement = $instance->db->prepare($sql); // Use $instance->db here
        $pdo_statement->execute([':name' => $name]);
        $genre_data = $pdo_statement->fetch();
        
        if ($genre_data) {
            return $instance->castToModel($genre_data); // Call castToModel on the instance
        }
        
        return null; // Return null if the genre doesn't exist
    }
}
