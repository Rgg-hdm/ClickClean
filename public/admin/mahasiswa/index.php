<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Dosen</h3>
                <p class="text-subtitle text-muted">Daftar mahasiswa beserta detail informasi mereka</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Mahasiswa
                <a href="/admin/students/create" class="btn btn-primary btn-sm float-end">Add New</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th>Angkatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?= $mhs['npm'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['email'] ?></td>
                                <td><?= $mhs['jurusan'] ?></td>
                                <td><?= $mhs['semester'] ?></td>
                                <td><?= $mhs['angkatan'] ?></td>
                                <td>
                                    <a href="/admin/students/edit<?= $mhs['npm'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/admin/students/delete/<?= $mhs['npm'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>
