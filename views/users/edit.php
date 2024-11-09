<div class="container mt-5">
    <h1>Edit user</h1>
    <form action="/users/edit/<?= htmlspecialchars($user->id) ?>" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user->username) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <textarea class="form-control" id="email" name="email" rows="3" required><?= htmlspecialchars($user->email) ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
