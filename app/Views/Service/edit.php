<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <!-- Tambahkan CSS Bootstrap atau style lain jika diperlukan -->
</head>
<body>
    <div class="container">
        <h2>Edit Service</h2>

        <!-- Notifikasi Error -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk mengedit service -->
        <form action="/services/update/<?= $service['id']; ?>" method="post">
            <div class="form-group">
                <label for="name">Service Name</label>
                <input type="text" class="form-control" name="name" value="<?= esc($service['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"><?= esc($service['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="<?= esc($service['price']); ?>" required step="0.01">
            </div>

            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" class="form-control" name="duration" value="<?= esc($service['duration']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Service</button>
            <a href="/services" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
