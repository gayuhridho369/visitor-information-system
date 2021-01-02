<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('public_space') ?>" class="brand-link">
        <img src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> Move. & Track. System</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3  mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="text-light"> <b><?= $public_space['name'] ?></b></p>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('public_space') ?>" class="nav-link <?= $this->uri->segment(2) == '' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?= $this->uri->segment(2) == 'visitor_inside' || $this->uri->segment(2) == 'visitor_history'  ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $this->uri->segment(2) == 'visitor_inside' || $this->uri->segment(2) == 'visitor_history'  ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Visitor
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('public_space/visitor_inside') ?>" class="nav-link <?= $this->uri->segment(2) == 'visitor_inside' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inside</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('public_space/visitor_history') ?>" class="nav-link <?= $this->uri->segment(2) == 'visitor_history'  ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>History</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('public_space/account') ?>" class="nav-link <?= $this->uri->segment(2) == 'account'  ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Account
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>