<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
</head>
<body>
    <div class="container">
        <h2>Reviews List</h2>
        <a href="/reviews/create" class="btn btn-primary">Add Review</a>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= esc($review['id']) ?></td>
                    <td><?= esc($review['order_id']) ?></td>
                    <td><?= esc($review['rating']) ?></td>
                    <td><?= esc($review['comment']) ?></td>
                    <td>
                        <a href="/reviews/edit/<?= esc($review['id']) ?>">Edit</a>
                        <a href="/reviews/delete/<?= esc($review['id']) ?>" onclick="return confirm('Are you sure you want to delete this review?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
