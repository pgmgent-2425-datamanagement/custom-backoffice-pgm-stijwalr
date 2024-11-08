<div class="col-lg-3 col-md-4 bg-light p-4">
    <h2>Add Book</h2>
    <form action="/books/edit/<?= htmlspecialchars($book->id) ?>" method="POST">
    <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Book Description</label>
            <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-control" id="genre" name="genre_id">
                <option value="">Select Genre</option>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= htmlspecialchars($genre->id) ?>"><?= htmlspecialchars($genre->name) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="new_genre" class="form-label">Or Add New Genre</label>
            <input type="text" class="form-control" id="new_genre" name="new_genre">
        </div>

        <!-- Author Field -->
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select class="form-control" id="author" name="author_id">
                <option value="">Select Author</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?= htmlspecialchars($author->id) ?>"><?= htmlspecialchars($author->firstname) . ' ' . htmlspecialchars($author->surname) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
