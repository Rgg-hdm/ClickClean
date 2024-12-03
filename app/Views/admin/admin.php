<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Admin</h1>
        <table class="table table-bordered table-striped mt-3">
        <button type="submit" class="btn btn-primary" href="/admin/tambah" >Tambah Admin</button>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>password</th>
                  
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($admin) && is_array($admin)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($admin as $admin): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($admin['username']); ?></td>
                            <td><?= esc($admin['password']); ?></td>
                          
                            <td>
                                <a href="/admin/edit/<?= $admin['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/admin/delete/<?= $admin['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data admin.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
