<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<style>
    table {
        width: 100%; /* Agar tabel memenuhi kontainer */
        table-layout: auto; /* Kolom akan menyesuaikan konten */
    }

    th, td {
        white-space: nowrap; /* Mencegah teks terpotong */
    }

    th {
        text-align: left; /* Perataan teks pada header */
    }

    .table-responsive {
        overflow-x: auto; /* Agar tabel bisa digulir horizontal jika konten terlalu lebar */
    }
</style>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Service List</h3>
                <p class="text-subtitle text-muted">List of services and their details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Services
                <a href="/services/create" class="btn btn-primary btn-sm float-end">Add New Service</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="servicesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($services) && is_array($services)): ?>
                                <?php foreach ($services as $service): ?>
                                    <tr>
                                        <td><?= esc($service['id']) ?></td>
                                        <td><?= esc($service['name']) ?></td>
                                        <td><?= esc($service['description']) ?></td>
                                        <td>Rp <?= number_format($service['price'], 0, ',', '.') ?></td>
                                        <td><?= esc($service['duration']) ?> minutes</td>
                                        <td>
                                            <a href="/services/edit/<?= esc($service['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/services/delete/<?= esc($service['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No services found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        let servicesTable = document.querySelector('#servicesTable');
        if (servicesTable) {
            new simpleDatatables.DataTable(servicesTable);
        }
    });
</script>
<?= $this->endSection() ?>
