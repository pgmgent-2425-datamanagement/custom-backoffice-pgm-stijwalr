<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1>Dashboard</h1>
            <p>Manage all authors</p>
            <a href="/authors/add" class="btn btn-primary mb-3">Add author</a>

            <div>
                <div class="d-flex justify-content-between">
                    <h2>Authors</h2>
                    <form>
                        <label>Search: 
                            <input type="text" name="search" placeholder="Specific author in mind?" value="<?= htmlspecialchars($search) ?>" class="form-control">
                        </label>
                        <input type="submit" value="Search" class="btn btn-secondary ms-2">
                    </form>
                </div>
                <div class="row">
                    <?php foreach ($authors as $author) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($author->firstname); ?> <?= htmlspecialchars($author->surname ?? ''); ?></h5>
                                    <p class="card-text"><strong>Description:</strong> <?= htmlspecialchars($author->bio ?? 'No bio available'); ?></p>
                                </div>
                                <div class="card-footer d-flex gap-1 ">
                                    <a href="/authors/edit/<?= htmlspecialchars($author->id); ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="/authors/delete/<?= htmlspecialchars($author->id); ?>" class="btn btn-sm btn-danger">Delete</a>
                                    <a href="/authors/<?= htmlspecialchars($author->id); ?>" class="btn btn-sm btn-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
