<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->include('template/header') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?= $this->include('template/nav') ?>
        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <?= $this->include('template/sidebar') ?>
        </aside>
        <div class="content-wrapper">
            <?php

            $db     = \Config\Database::connect();

            $ta = $db->table('tbl_ta')
                ->where('status', '1')
                ->get()->getRowArray();

            ?>
            <?= $this->renderSection('content') ?>

        </div>
        <?= $this->include('template/footer') ?>