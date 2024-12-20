<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Order</h3>
                <p class="text-subtitle text-muted">Update the order details below</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/orders">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Edit Order Details
            </div>
            <div class="card-body">
                <form action="/orders/update/<?= $order['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <!-- Customer ID dropdown -->
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer</label>
                        <select id="customer_id" name="customer_id" class="form-select" required>
                            <option value="">Select a Customer</option>
                            <?php foreach ($customers as $customer): ?>
                                <option value="<?= esc($customer['id']) ?>" <?= $order['customer_id'] == $customer['id'] ? 'selected' : '' ?>>
                                    <?= esc($customer['id']) ?> - <?= esc($customer['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Service ID dropdown -->
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select id="service_id" name="service_id" class="form-select" required>
                            <option value="">Select a Service</option>
                            <?php foreach ($services as $service): ?>
                                <option value="<?= esc($service['id']) ?>" <?= $order['service_id'] == $service['id'] ? 'selected' : '' ?>>
                                    <?= esc($service['id']) ?> - <?= esc($service['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Employee ID dropdown -->
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee</label>
                        <select id="employee_id" name="employee_id" class="form-select">
                            <option value="">Select an Employee</option>
                            <?php foreach ($employees as $employee): ?>
                                <option value="<?= esc($employee['id']) ?>" <?= $order['employee_id'] == $employee['id'] ? 'selected' : '' ?>>
                                    <?= esc($employee['id']) ?> - <?= esc($employee['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Order Date -->
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="date" id="order_date" name="order_date" class="form-control" value="<?= esc($order['order_date']) ?>" required>
                    </div>

                    <!-- Start Time -->
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" id="start_time" name="start_time" class="form-control" value="<?= esc($order['start_time']) ?>" required>
                    </div>

                    <!-- Status dropdown -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="confirmed" <?= $order['status'] == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                            <option value="in_progress" <?= $order['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="cancelled" <?= $order['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="/orders" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Order</button>
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
