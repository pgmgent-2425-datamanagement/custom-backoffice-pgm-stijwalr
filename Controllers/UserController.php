<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController {
    
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
        $user = User::find($id);
        self::loadView('users/detail', [
            'user' => $user,
        ]);
    }    

    public static function add() {
        self::loadView('users/form');
    }

    public function delete($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        header('Location: /users');
    }

    public function edit($id) {
        $user = User::find($id);
        self::loadView('users/edit', [
            'user' => $user,
        ]);
    }
    
    public function saveEdit($id) {
        $user = User::find($id);
        if ($user) {
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->edit();
            header('Location: /users/' . $user->id);
            exit;
        }
    }
    
    public function save() {
        $user = new User();
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->save();
        header('Location: /users');
        exit;
    }
    
}

