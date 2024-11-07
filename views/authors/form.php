<div class="col-lg-3 col-md-4 bg-light p-4">
            <h2>Add Author</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label">Author bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="6" required></textarea>
                </div>
                <div class="mb-3">
                <label>Age: <input type="number" name="age" required></label>

                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Add author</button>
            </form>
        </div>