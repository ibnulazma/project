<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="<?= base_url() ?>/foto/logo.png" alt="" width="30px">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> My Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                <i class="fas fa-sign-out mr-2"></i> Logout
            </a>
        </div>
    </li>
</ul>