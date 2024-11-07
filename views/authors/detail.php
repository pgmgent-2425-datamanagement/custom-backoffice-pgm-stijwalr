<div class="container mt-5">
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h1>Author Details</h1>
                    <p><strong>Name:</strong> <?= htmlspecialchars($author->firstname) ?> <?= htmlspecialchars($author->surname) ?></p>
                    <p><strong>Bio:</strong> <?= htmlspecialchars($author->bio ?? 'No bio available') ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($author->age) ?></p>
                </div>
            </div>

            <h2>Books by <?= htmlspecialchars($author->firstname) ?> <?= htmlspecialchars($author->surname) ?></h2>
            <div class="books-list">
                <?php if (is_array($books) && count($books) > 0): ?> 
                    <div class="row">
                        <?php foreach ($books as $book): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= htmlspecialchars($book->title) ?></h3>
                                        <p class="card-text"><?= htmlspecialchars($book->description) ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/books/<?= htmlspecialchars($book->id) ?>" class="btn btn-secondary btn-sm">View Book</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No books found for this author.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
