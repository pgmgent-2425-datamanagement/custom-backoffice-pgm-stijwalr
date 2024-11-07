<div class="container mt-5">
    <h1>Edit Author</h1>

    <!-- Display the author details -->
    <form action="/authors/edit/<?= htmlspecialchars($author->id) ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($author->firstname) ?>" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($author->surname) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($author->bio) ?></textarea>
        </div>
        
        <!-- Display the author details -->
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" value="<?= htmlspecialchars($author->firstname) ?> <?= htmlspecialchars($author->surname) ?>" readonly>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
