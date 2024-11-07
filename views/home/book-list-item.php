<div class="mb-4 p-3 border rounded">
<div class="item d-flex justify-content-between align-items-start ">
    <div class="title">
        <h3 class="mb-2"> Title: <?= $item->title; ?></h3>
        <p class="mb-0">
            Description:
        </p>
        <p class="mb-0 w-25 "><?= $item->description; ?></p>
    </div>
</div>
<div class="buttons mt-3 ">
        <a href="/author/edit/<?= $item->id; ?>" class="btn btn-sm btn-primary me-2">Edit</a>
        <a href="#" class="btn btn-sm btn-danger">Delete</a>
</div>  
</div>