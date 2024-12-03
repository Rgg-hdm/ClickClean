<form action="/customers/update/<?= $customer['id'] ?>" method="post">
    <?= csrf_field() ?>
    <label for="name">Name</label>
    <input type="text" name="name" value="<?= $customer['name'] ?>" required>

    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $customer['email'] ?>" required>

    <label for="phone">Phone</label>
    <input type="text" name="phone" value="<?= $customer['phone'] ?>" required>

    <label for="address">Address</label>
    <textarea name="address" required><?= $customer['address'] ?></textarea>

    <button type="submit">Update</button>
</form>
