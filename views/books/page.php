<div class="container mt-5">
    <div class="row">
        <?php foreach ($books as $book) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Title: <?= htmlspecialchars($book->title); ?></h5>
                        <p class="card-text"><strong>Description:</strong> <?= htmlspecialchars($book->description); ?></p>
                        
                        <!-- Author Information -->
                        <?php 
                            if ($book->author_id) : 
                                $author = $book->getAuthor();
                                if ($author && isset($author->firstname) && isset($author->surname)) : ?>
                                    <p class="card-text"><strong>Author:</strong> <?= htmlspecialchars($author->firstname) ?> <?= htmlspecialchars($author->surname) ?></p>
                                <?php else: ?>
                                    <p class="card-text"><strong>Author:</strong> Unknown</p>
                                <?php endif; 
                            else: ?>
                                <p class="card-text"><strong>Author:</strong> Unknown</p>
                            <?php endif; ?>
                    </div>
                    <div class="card-footer d-flex gap-1">
                        <a href="/books/edit/<?= $book->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/books/delete/<?= $book->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                        <a href="/books/<?= $book->id; ?>" class="btn btn-sm btn-secondary">View</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>