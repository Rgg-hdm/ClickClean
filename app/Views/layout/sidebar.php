<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'index'; // Default to 'index' for admin dashboard
$uri2 = $uri[2] ?? '';
$uri3 = $uri[3] ?? '';
$uri3 = $uri[4] ?? '';
$uri3 = $uri[5] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="/assets/images/logo/logo2-removebg-preview.png" alt="Logo"style="width:120px;height:100px;" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item <?= ($uri1 == 'index') ? 'active' : '' ?> ">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'users') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Management</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'users') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'customers') ? 'active' : '' ?>">
                            <a href="/customers">Customers</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'orders') ? 'active' : '' ?>">
                            <a href="/orders">Orders</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'employees') ? 'active' : '' ?>">
                            <a href="/employees">Employees</a>
                        </li>

                        <li class="submenu-item <?= ($uri2 == 'payments') ? 'active' : '' ?>">
                            <a href="/payments">Payments</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'services') ? 'active' : '' ?>">
                            <a href="/services">Service</a>
                        </li>
                     
                    </ul>


                <!-- <li class="sidebar-item <?= ($uri1 == 'evaluation') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-check-circle"></i>
                        <span>Evaluation Data</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'evaluation') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'criteria') ? 'active' : '' ?>">
                            <a href="/admin/evaluation/criteria">Evaluation Criteria</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'ratings') ? 'active' : '' ?>">
                            <a href="/admin/evaluation/ratings">Rating Scales</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'services') ? 'active' : '' ?>">
                            <a href="/admin/evaluation/services">Services</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'questions') ? 'active' : '' ?>">
                            <a href="/admin/evaluation/questions">Questions</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'group') ? 'active' : '' ?>">
                            <a href="/admin/evaluation/group">Group</a>
                        </li>
                    </ul>
                </li> -->
<!-- 
                <li class="sidebar-item <?= ($uri1 == 'period') ? 'active' : '' ?>">
                    <a href="/admin/period" class='sidebar-link'>
                        <i class="bi bi-calendar"></i>
                        <span>Period</span>
                    </a>
                </li> -->

                <!-- <li class="sidebar-item <?= ($uri1 == 'reports') ? 'active' : '' ?>">
                    <a href="/admin/reports" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Reports</span>
                    </a>
                </li> -->
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>