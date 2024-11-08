<div class="container mt-5">
<h1>Dashboard</h1>
            <p>Manage all users</p>
            <a href="/users/add" class="btn btn-primary mb-3">Add user</a>

            <div>
                <div class="d-flex justify-content-between">
                    <h2>Users</h2>
                    <form>
                        <label>Search: 
                            <input type="text" name="search" placeholder="Specific user in mind?" value="<?= htmlspecialchars($search) ?>" class="form-control">
                        </label>
                        <input type="submit" value="Search" class="btn btn-secondary ms-2">
                    </form>
                </div>
    <div class="row">
        <?php foreach ($users as $user) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($user->username); ?></h5>
                        <p class="card-text"><strong>email:</strong> <?= htmlspecialchars($user->email); ?></p>
                    </div>
                    <div class="card-footer d-flex gap-1">
                        <a href="/users/edit/<?= $user->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/users/delete/<?= $user->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                        <a href="/users/<?= $user->id; ?>" class="btn btn-sm btn-secondary">View</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
