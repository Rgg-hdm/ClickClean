<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
</head>
<body>
    <div class="container">
        <h2>Edit Review</h2>

        <!-- Notifikasi Error -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk mengedit review -->
        <form action="/reviews/update/<?= $review['id']; ?>" method="post">
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="number" class="form-control" name="order_id" value="<?= esc($review['order_id']); ?>" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" class="form-control" name="rating" value="<?= esc($review['rating']); ?>" min="1" max="5" required>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment"><?= esc($review['comment']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Review</button>
            <a href="/reviews" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
