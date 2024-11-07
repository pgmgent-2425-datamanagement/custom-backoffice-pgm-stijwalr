<div class="item d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
    <div>
        <span class="firstname"><?= $item->firstname ?></span>
        <span class="surname"><?= $item->surname ?></span>
    </div>

    <div class="buttons">
        <a href="/author/edit/<?= $item->id; ?>" class="btn btn-sm btn-primary me-2">Edit</a>
        <a href="#" class="btn btn-sm btn-danger">Delete</a>
    </div>
</div>
