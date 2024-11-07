<div class="col-lg-3 col-md-4 bg-light p-4">
            <h2>Add Book</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Book Description</label>
                    <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>