<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Customers List</h3>
                <p class="text-subtitle text-muted">List of customers and their details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Customers
                <a href="/customers/create" class="btn btn-primary btn-sm float-end">Create New Order</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="customersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer) : ?>
                            <tr>
                                <td><?= esc($customer['id']) ?></td>
                                <td><?= esc($customer['name']) ?></td>
                                <td><?= esc($customer['email']) ?></td>
                                <td><?= esc($customer['phone']) ?></td>
                                <td><?= esc($customer['address']) ?></td>
                                <td>
                                    <!-- <a href="/customers/show/<?= esc($customer['id']) ?>" class="btn btn-info btn-sm">View</a> -->
                                    <a href="/customers/edit/<?= esc($customer['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/customers/delete/<?= esc($customer['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
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
    document.addEventListener('DOMContentLoaded', function () {
        let customersTable = document.querySelector('#customersTable');
        if (customersTable) {
            new simpleDatatables.DataTable(customersTable);
        }
    });
</script>
<?= $this->endSection() ?>
