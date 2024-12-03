<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
    <form action="<?= base_url('auth/login'); ?>" method="post">
        <?= csrf_field(); ?>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= old('username'); ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
