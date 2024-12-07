<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Employee List</h3>
                <p class="text-subtitle text-muted">List of employees and their details</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employees</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Employees
                <a href="/employees/create" class="btn btn-primary btn-sm float-end">Add New Employee</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="employeesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Position</th>
                            <th>Hire Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($employees) && is_array($employees)): ?>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td><?= esc($employee['id']) ?></td>
                                    <td><?= esc($employee['name']) ?></td>
                                    <td><?= esc($employee['email']) ?></td>
                                    <td><?= esc($employee['phone']) ?></td>
                                    <td><?= esc($employee['position']) ?></td>
                                    <td><?= esc($employee['hire_date']) ?></td>
                                    <td>                                        
                                        <a href="/employees/edit/<?= $employee['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/employees/delete/<?= $employee['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No employees found.</td>
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
    // Simple Datatable
    let employeesTable = document.querySelector('#employeesTable');
    let dataTable = new simpleDatatables.DataTable(employeesTable);
</script>
<?= $this->endSection() ?>