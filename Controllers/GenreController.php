<?php

namespace App\Controllers;

use App\Models\Genre;

class GenreController extends BaseController {

    // Save a new genre
    public function save() {
        if (isset($_POST['new_genre']) && !empty($_POST['new_genre'])) {
            $genre = new Genre();
            $genre->name = $_POST['new_genre'];
            $genre->save();
        }
    }
}
