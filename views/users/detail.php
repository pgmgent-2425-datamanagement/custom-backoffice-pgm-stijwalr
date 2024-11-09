<div class="container mt-5">
    <h1>User Detail</h1>
    
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" value="<?= htmlspecialchars($user->username) ?>" readonly>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <textarea class="form-control" id="email" rows="3" readonly><?= htmlspecialchars($user->email) ?></textarea>
    </div>

    <a href="/users/edit/<?= htmlspecialchars($user->id) ?>" class="btn btn-warning">Edit User</a>
</div>
