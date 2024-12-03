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

        <!-- Form untuk menambah admin -->
        <div class="card mt-3">
            <div class="card-header">
                <h3>Tambah Admin</h3>
<!-- Form untuk menambah admin -->
<div class="card mt-3">
            <div class="card-header">
                <h3>Tambah Admin</h3>
            </div>
            <div class="card-body">
                <form action="/admin/tambah" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Username</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
               