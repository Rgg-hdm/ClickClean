<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Create New Order</h3>
                <p class="text-subtitle text-muted">Fill in the details to create a new order</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/orders">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Order</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                New Order Details
            </div>
            <div class="card-body">
                <form action="/orders/store" method="post">

                <div class="form-group">
                        <label for="id">ID Order</label>
                        <input type="text" id="id" name="id" class="form-control" required>
                    </div>

                    <!-- Customer ID dropdown -->
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer</label>
                        <select id="customer_id" name="customer_id" class="form-select" required>
                            <option value="">Select a Customer</option>
                            <?php foreach ($customers as $customer): ?>
                                <option value="<?= esc($customer['id']) ?>">
                                    <?= esc($customer['id']) ?> - <?= esc($customer['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select id="service_id" name="service_id" class="form-select" required>
                            <option value="">Select a Service</option>
                            <?php foreach ($services as $service): ?>
                                <option value="<?= esc($service['id']) ?>">
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
                                <option value="<?= esc($employee['id']) ?>">
                                    <?= esc($employee['id']) ?> - <?= esc($employee['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Order Date -->
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="date" id="order_date" name="order_date" class="form-control" required>
                    </div>

                    <!-- Start Time -->
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" id="start_time" name="start_time" class="form-control" required>
                    </div>

                    <!-- Status dropdown -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    

                    <button type="submit" class="btn btn-primary">Create Order</button>
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
