<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Payments List</h3>
                <p class="text-subtitle text-muted">List of payments and their details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payments</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Payments
                <a href="/payments/create" class="btn btn-primary btn-sm float-end">Add Payment</a>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <table class="table table-striped" id="paymentsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($payments) && is_array($payments)): ?>
                            <?php foreach ($payments as $payment): ?>
                                <tr>
                                    <td><?= esc($payment['id']) ?></td>
                                    <td><?= esc($payment['order_id']) ?></td>
                                    <td>Rp <?= number_format($payment['service_price'], 0, ',', '.') ?></td>
                                    <td><?= esc($payment['payment_date']) ?></td>
                                    <td><?= esc($payment['payment_method']) ?></td>
                                    <td>
                                <span class="badge bg-<?= isset($getStatusColor) ? $getStatusColor($order['status']) : 'secondary' ?>">
                                    <?= esc($payment['status']) ?>
                                </span>
                            </td>
                                    <td>
                                        <a href="/payments/edit/<?= esc($payment['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/payments/delete/<?= esc($payment['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this payment?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No payments found.</td>
                            </tr>
                        <?php endif; ?>
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
    document.addEventListener('DOMContentLoaded', function() {
        let paymentsTable = document.querySelector('#paymentsTable');
        if (paymentsTable) {
            new simpleDatatables.DataTable(paymentsTable);
        }
    });
</script>
<?= $this->endSection() ?>