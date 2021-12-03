<?php require 'layouts/loader.php'; ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <?php require 'layouts/header.php'; ?>
    <section>
        <?php require 'layouts/nav.php'; ?>
    </section>
    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php  echo $_SESSION['id'] ?>
            </div>
        </div>
    </section>
    <!-- ./CONTENT -->