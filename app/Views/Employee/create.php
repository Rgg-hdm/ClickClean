<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Create Employee</h3>
                <p class="text-subtitle text-muted">Fill in the form below to add a new employee</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/employees">Employees</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Add Employee
            </div>
            <div class="card-body">
                <form action="/employees/store" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" id="position" name="position" class="form-control" placeholder="Enter job position" required>
                    </div>

                    <div class="form-group">
                        <label for="hire_date">Hire Date</label>
                        <input type="date" id="hire_date" name="hire_date" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="/employees" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
