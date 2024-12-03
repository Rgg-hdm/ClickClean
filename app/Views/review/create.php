<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Review</title>
</head>
<body>
    <div class="container">
        <h2>Create Review</h2>

        <!-- Notifikasi Error -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk membuat review -->
        <form action="/reviews/store" method="post">
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="number" class="form-control" name="order_id" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" class="form-control" name="rating" min="1" max="5" required>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Review</button>
            <a href="/reviews" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
