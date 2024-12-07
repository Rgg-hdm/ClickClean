<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Payment</h3>
                <p class="text-subtitle text-muted">Update the details to modify an existing payment</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/payments">Payments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Payment</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Payment Details
            </div>
            <div class="card-body">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= esc($validation->listErrors()); ?>
                    </div>
                <?php endif; ?>

                <form action="/payments/update/<?= esc($payment['id']); ?>" method="post">
                    <?= csrf_field(); ?> <!-- Tambahkan CSRF untuk keamanan -->

                    <!-- Order ID -->
                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order ID</label>
                        <select id="order_id" name="order_id" class="form-select" required>
                            <option value="" disabled>Select Order</option>
                            <?php foreach ($orders as $order): ?>
                                <option value="<?= esc($order['id']) ?>" <?= ($payment['order_id'] == $order['id']) ? 'selected' : ''; ?>>
                                    Order ID: <?= esc($order['id']) ?> | Service: <?= esc($order['service_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Payment Date -->
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="date" id="payment_date" name="payment_date" class="form-control" value="<?= esc($payment['payment_date']); ?>" required>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select id="payment_method" name="payment_method" class="form-select" required>
                            <option value="cash" <?= ($payment['payment_method'] == 'cash') ? 'selected' : ''; ?>>Cash</option>
                            <option value="credit_card" <?= ($payment['payment_method'] == 'credit_card') ? 'selected' : ''; ?>>Credit Card</option>
                            <option value="bank_transfer" <?= ($payment['payment_method'] == 'bank_transfer') ? 'selected' : ''; ?>>Bank Transfer</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="pending" <?= ($payment['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="completed" <?= ($payment['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
                            <option value="failed" <?= ($payment['status'] == 'failed') ? 'selected' : ''; ?>>Failed</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="/payments" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Payment</button>
                    </div>
                </form>
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
<?= $this->endSection() ?>

<script>
    document.getElementById('order_id').addEventListener('change', function() {
        const orderId = this.value;

        if (orderId) {
            fetch(`/orders/getPrice/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('price').value = data.price; // Update input harga
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error fetching price:', error));
        }
    });
</script>
