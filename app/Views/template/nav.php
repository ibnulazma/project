<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <?php if (session()->get('level') == '1') { ?>
                <img src="<?= base_url('foto_user/' .  session()->get('foto')) ?>" class=" mr-3" style="width:25px;height:25px; border-radius:50%">
            <?php  } else if (session()->get('level') == 'siswa') { ?>
                <img src="<?= base_url('foto_siswa/' .  session()->get('foto')) ?>" class=" mr-3" style="width:25px;height:25px;border-radius:50%">
            <?php  } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">

                <div class="media">
                    <?php if (session()->get('level') == '1') { ?>
                        <img src="<?= base_url('foto_user/' .  session()->get('foto')) ?>" class=" mr-3" style="width:25px;height:25px; border-radius:50%">
                    <?php  } else if (session()->get('level') == 'siswa') { ?>
                        <img src="<?= base_url('foto_siswa/' .  session()->get('foto')) ?>" class=" mr-3" style="width:25px;height:25px;border-radius:50%">
                    <?php  } ?>
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            <?= session()->get('nama') ?>
                        </h3>
                        <?php if (session()->get('level') == 1) { ?>
                            <p class="text-sm">Administrator</p>
                        <?php } elseif (session()->get('level') == 2) { ?>
                            <p class="text-sm">Piket</p>
                        <?php } ?>

                    </div>



                </div>
            </a>
            <p>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> My Profile
                </a>
            </p>
            <p>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                    <i class="fas fa-sign-out mr-2"></i> Logout
                </a>
            </p>
        </div>
    </li>
</ul>