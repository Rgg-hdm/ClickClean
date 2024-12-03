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
                <h3>Order List</h3>
                <p class="text-subtitle text-muted">List of orders and their details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Orders
                <a href="/orders/create" class="btn btn-primary btn-sm float-end">Add New Order</a>
            </div>
            <div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped" id="ordersTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Service ID</th>
                    <th>Employee ID</th>
                    <th>Order Date</th>
                    <th>Start Time</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders) && is_array($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= esc($order['id']) ?></td>
                            <td><?= esc($order['customer_name']) ?> (ID: <?= esc($order['customer_id']) ?>)</td>
                            <td><?= esc($order['services_name']) ?></td>
                            <td><?= esc($order['employee_name']) ?> (ID: <?= esc($order['customer_id']) ?>)</td>
                            <td><?= esc($order['order_date']) ?></td>
                            <td><?= esc($order['start_time']) ?></td>
                            <td>
                                <span class="badge bg-<?= isset($getStatusColor) ? $getStatusColor($order['status']) : 'secondary' ?>">
                                    <?= esc($order['status']) ?>
                                </span>
                            </td>
                            <td>Rp <?= number_format($order['service_price'], 0, ',', '.') ?></td>
                            <td>
                                
                                <a href="/orders/edit/<?= esc($order['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/orders/delete/<?= esc($order['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No orders found.</td>
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
        let ordersTable = document.querySelector('#ordersTable');
        if (ordersTable) {
            new simpleDatatables.DataTable(ordersTable);
        }
    });
</script>
<?= $this->endSection() ?>