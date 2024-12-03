<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="btn btn-link sidebar-toggler">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="notificationDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">New Order #123</a></li>
                        <li><a class="dropdown-item" href="#">New User Registration</a></li>
                        <li><a class="dropdown-item" href="#">Server Update</a></li>
                    </ul>
                </div>
                
                <div class="dropdown ms-3">
                    <button class="btn btn-link dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown">
                        <img src="<?= base_url('assets/images/avatar.jpg') ?>" class="rounded-circle me-2" width="32">
                        <span><?= session()->get('user_name') ?? 'Admin' ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('settings') ?>"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>