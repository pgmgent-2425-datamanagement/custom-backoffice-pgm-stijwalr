<div class="container mt-5">
    <h1>Edit Book</h1>

    <!-- Display the book details -->
    <form action="/books/edit/<?= htmlspecialchars($book->id) ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($book->title) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($book->description) ?></textarea>
        </div>
        
        <!-- Display the author details -->
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" value="<?= htmlspecialchars($author->firstname) ?> <?= htmlspecialchars($author->surname) ?>" readonly>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
