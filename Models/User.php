<?php

namespace App\Models;

use App\Models\BaseModel;

class User extends BaseModel {
    protected function search($search) {

        $sql = 'SELECT * FROM `'.$this->table. '` WHERE username LIKE :search OR email LIKE :search ORDER BY id DESC';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute(
            [':search' => '%'.$search.'%']
        );
        $db_items = $pdo_statement->fetchAll();
        return self::castToModel($db_items);
    }

    public function save() {
        $sql = "INSERT INTO `users`(`username`, `email`) VALUES (:username, :email)";
        $pdo_statement = $this->db->prepare($sql);
        $succes = $pdo_statement->execute([
            ':username' => $this->username,
            ':email' => $this->email
        ]);
    
        return $succes;
    }
    
    

    public function delete() {
        $sql = 'DELETE FROM `users` WHERE id = :id';
        $pdo_statement = $this->db->prepare($sql);
        return $pdo_statement->execute([':id' => $this->id]);
    }
    
    public function edit() {
        $sql = "UPDATE `users` SET `username` = :username, `email` = :email WHERE `id` = :id";
        
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':username' => $this->username,
            ':email' => $this->email,
            ':id' => $this->id
        ]);
        
        return $success; // Return whether the update was successful
    }
}

