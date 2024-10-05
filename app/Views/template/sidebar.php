<?php
$db     = \Config\Database::connect();

$user = $db->table('tbl_user')
    ->where('id_user')
    ->get()->getRowArray();

?>

<div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="<?= base_url() ?>/foto/logo.png" alt="" width="30px">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">SIAKADINKA</span>
    </a>

    <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
    <!-- Dashboard -->


    <?php if (session()->get('level') == 1) { ?>
        <li class="menu-item <?= $menu == 'admin' ? 'active' : '' ?>">

            <a href="<?= base_url('admin') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>

        </li>
    <?php } else if (session()->get('level') == 2) { ?>

        <li class="menu-item <?= $menu == 'admin' ? 'active' : '' ?>">

            <a href="<?= base_url('guru') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>

        </li>
    <?php } else if (session()->get('level') == 3) { ?>
        <li class="menu-item <?= $menu == 'siswa' ? 'active' : '' ?>">
            <a href="<?= base_url('siswa') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
    <?php } ?>
    <?php if (session()->get('level') == 1) { ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
        </li>
        <li class="menu-item <?= $menu == 'ta' ? 'active' : '' ?>">
            <a href="<?= base_url('ta') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Account Settings">Tahun Pelajaran</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'setting' ? 'active' : '' ?>">
            <a href="<?= base_url('setting') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Account Settings">Profile Sekolah</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-lock-alt"></i>
                <div data-i18n="Account Settings">Akun</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Akademik</span></li>
        <!-- Cards -->
        <li class="menu-item <?= $menu == 'peserta' ? 'active' : '' ?>">
            <a href="<?= base_url('peserta') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Basic">Peserta Didik</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'guru' ? 'active' : '' ?>">
            <a href="<?= base_url('guru') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Basic">PTK</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'kelas' ? 'active' : '' ?>">
            <a href="<?= base_url('kelas') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div data-i18n="Basic">Rombel</div>
            </a>
        </li>

    <?php } ?>

    <?php if (session()->get('level') == 3) { ?>
        <li class="menu-item <?= $menu == 'profile' ? 'active' : '' ?>">

            <a href="<?= base_url('siswa/profile') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Profile</div>
            </a>
        </li>
    <?php } ?>



</ul>