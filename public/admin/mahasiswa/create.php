<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Mahasiswa</h3>
                <p class="text-subtitle text-muted">Form untuk menambahkan data mahasiswa</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Mahasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Mahasiswa</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?= base_url('admin/students/store'); ?>" method="post" class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="npm-column">NPM (9 digits)</label>
                                            <input type="text" id="npm-column" class="form-control"
                                                placeholder="NPM" name="npm" pattern="\d{9}" required
                                                title="NPM harus berisi 9 digit angka">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="nama-column">Nama</label>
                                            <input type="text" id="nama-column" class="form-control"
                                                placeholder="nama" name="nama" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control"
                                                name="email" placeholder="Email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <fieldset class="form-group">
                                            <label for="jurusan-column">Jurusan</label>
                                            <select class="form-select" id="jurusan-column" name="jurusan" required>
                                                <option value="" disabled selected>Pilih Jurusan</option>
                                                <option value="Teknik Informatika">Teknik Informatika</option>
                                                <option value="Sistem Informasi">Sistem Informasi</option>
                                                <option value="Tekpang">Teknologi Pangan (Tekpang)</option>
                                                <option value="Hukum">Hukum</option>
                                                <option value="Manajemen">Manajemen</option>
                                            </select>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="semester-column">Semester</label>
                                            <input type="number" id="semester-column" class="form-control"
                                                name="semester" placeholder="Semester" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="angkatan-column">Angkatan (Tahun)</label>
                                            <input type="number" id="angkatan-column" class="form-control"
                                                name="angkatan" placeholder="Angkatan (Tahun)" min="2000" max="2099" required>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>