<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">
                <?= $book->title; ?>
            </h1>
            <p class="lead">
                <?= $book->description; ?>
            </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Author: <?= $author->firstname ?> <?= $author->surname ?></h2>
                    <p class="card-text"><strong>Bio:</strong> <?= $author->bio ?></p>
                    <p class="card-text"><strong>Age:</strong> <?= $author->age ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
