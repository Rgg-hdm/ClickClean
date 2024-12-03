<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Create Payment</h3>
                <p class="text-subtitle text-muted">Fill in the details to create a new payment</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/payments">Payments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Payment</li>
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

                <form action="/payments/store" method="post">
                    <?= csrf_field(); ?> <!-- Tambahkan CSRF untuk keamanan -->

                    <!-- Order ID -->
                    <select id="order_id" name="order_id" class="form-select" required>
                        <option value="" disabled selected>-- Select Order --</option>
                        <?php foreach ($orders as $order): ?>
                            <option value="<?= esc($order['id']) ?>" data-price="<?= esc($order['service_price']) ?>">
                                Order ID: <?= esc($order['id']) ?> | Service: <?= esc($order['service_name']) ?>
                            </option>
                        <?php endforeach; ?>
                        </select>



                        <!-- Amount -->
                        <!-- <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" required step="0.01">
                    </div> -->

                        <!-- Payment Date -->
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Payment Date</label>
                            <input type="date" id="payment_date" name="payment_date" class="form-control" required>
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select id="payment_method" name="payment_method" class="form-select" required>
                                <option value="" disabled selected>-- Select Payment Method --</option>
                                <option value="cash">Cash</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select" required>
                                <option value="" disabled selected>-- Select Status --</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="failed">Failed</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Payment</button>
                        <a href="/payments" class="btn btn-secondary">Cancel</a>
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