<div class="container mt-5">
    <h1>Edit Book</h1>

    <!-- Display the book details -->
    <form method="POST">
        
        <!-- Title field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($book->title ?? '') ?>" required>
        </div>

        <!-- Description field -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($book->description ?? '') ?></textarea>
        </div>
        
        <!-- Display the author details as a dropdown -->
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select class="form-control" id="author" name="author_id" required>
                <option value="">Select Author</option> <!-- Optional placeholder for no selection -->
                <?php foreach ($authors as $author): ?>
                    <option value="<?= htmlspecialchars($author->id) ?>" <?= $author->id == $book->author_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($author->firstname) ?> <?= htmlspecialchars($author->surname) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Genre Dropdown -->
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-control" id="genre" name="genre_id">
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= htmlspecialchars($genre->id) ?>" <?= $genre->id == $book->genre_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($genre->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- New Genre Input -->
        <div class="mb-3">
            <label for="new_genre" class="form-label">New Genre (if not listed)</label>
            <input type="text" class="form-control" id="new_genre" name="new_genre" placeholder="Add new genre">
        </div>
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
