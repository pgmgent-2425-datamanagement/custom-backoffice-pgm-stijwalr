<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController {
    
    // List all users
    public static function list() {
        $search = $_GET['search'] ?? '';
        $users = User::search($search);
        
        self::loadView('users/page', [
            'title' => 'Users',
            'users' => $users,
            'search' => $search
        ]);
    }

    public function detail($id) {
        $user = User::find($id); // Fetch the user by ID
        $author = $user->getAuthor(); // Get the author of the user
        
        // Pass user and author data to the view
        self::loadView('users/detail', [
            'user' => $user,
            'author' => $author
        ]);
    }

    public static function add() {

        // Get all genres
        self::loadView('users/edit');
    }

    public function delete($id) {
        $user = User::find($id); // Fetch the user by ID
        if ($user) {
            $user->delete(); // Delete the user
        }
        header('Location: /users'); // Redirect back to the users list
    }

    public function edit($id) {
        // Fetch the user and author for the edit form
        $user = User::find($id);
        $author = $user->getAuthor();
    
        // Load the edit form view
        self::loadView('users/edit', [
            'user' => $user,
            'author' => $author
        ]);
    }
    
    public function saveEdit($id) {
        // Fetch the user to be edited
        $user = User::find($id);
        if ($user) {
            // Update the user with the form data
            $user->title = $_POST['title'];
            $user->description = $_POST['description'];
            $user->author_id = $_POST['author_id'] ?? $user->author_id; // Update author if needed
    
            // Save the updated user
            $user->edit();
    
            // Redirect to the user detail page after the update
            header('Location: /users/' . $user->id);
            exit;
        }
    }
    
    public function save() {
        
        // Create and save the new user
        $user = new User();
        $user->username = $_POST['username'];// Associate the user with the author
        $user->save();
        // Redirect to users list
        header('Location: /users');
        exit;
    }
}

