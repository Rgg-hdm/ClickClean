<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">Macam-Macam Paket Pembersihan</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard" class="btn btn-warning btn-sm ml-2">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if (session()->get('logged_in')): ?>
                                <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm ml-2">Logout</a>
                            <?php endif; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="servicesTable">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($services) && is_array($services)): ?>
                        <?php foreach ($services as $service): ?>
                            <tr>
                                <!-- <td><?= esc($service['id']) ?></td> -->
                                <td><?= esc($service['name']) ?></td>
                                <td><?= esc($service['description']) ?></td>
                                <td>Rp <?= number_format($service['price'], 0, ',', '.') ?></td>
                                <td><?= esc($service['duration']) ?> minutes</td>
                                <!-- <td>
                                    <a href="/services/edit/<?= esc($service['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/services/delete/<?= esc($service['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?');">Delete</a>
                                </td> -->
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

<!-- <section class="section">
        <div class="row">
            <div class="col-12 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Orders</h6>
                                <h6 class="font-extrabold mb-0"><?= $ordersToday ?? 112 ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Reports</h6>
                                <h6 class="font-extrabold mb-0"><?= $totalReports ?? 28 ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Payments</h6>
                                <h6 class="font-extrabold mb-0"><?= $totalPayments ?? 80 ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon red mb-2">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Karyawan</h6>
                                <h6 class="font-extrabold mb-0"><?= $totalEmployees ?? 12 ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<!-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>Status</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($activities ?? [] as $activity): ?>
                                    <tr>
                                        <td><?= esc($activity['date'] ?? '2024-11-10') ?></td>
                                        <td><?= esc($activity['activity'] ?? 'System Update') ?></td>
                                        <td>
                                            <span class="badge <?= esc($activity['statusClass'] ?? 'bg-success') ?>">
                                                <?= esc($activity['status'] ?? 'Complete') ?>
                                            </span>
                                        </td>
                                        <td><?= esc($activity['user'] ?? 'Admin') ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info">View</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($activities)): ?>
                                    <tr>
                                        <td>2024-11-10</td>
                                        <td>System Update</td>
                                        <td><span class="badge bg-success">Complete</span></td>
                                        <td>Admin</td>
                                        <td>
                                            <button class="btn btn-sm btn-info">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2024-11-09</td>
                                        <td>Data Backup</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>System</td>
                                        <td>
                                            <button class="btn btn-sm btn-info">View</button>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
</div>
<br><br><br><b><br><br><br><br></b>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let table1 = document.querySelector('#table1');
        if (table1) {
            new simpleDatatables.DataTable(table1);
        }
    });
</script>
<?= $this->endSection() ?>