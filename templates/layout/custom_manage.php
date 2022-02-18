<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'BAAP: Bhartiya Awakend Azad Party';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
   <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/4538d33149.js" crossorigin="anonymous"></script>

    <?php // echo $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>
    <?php // echo  $this->Html->css(['styles']) ?>
    <?= $this->Html->css(['manage/sb-admin-2']) ?>
    <?= $this->Html->css(['manage/sb-admin-2.min']) ?>
    <?= $this->Html->css(['manage/all.min']) ?>
    <?= $this->Html->css(['manage/custom']) ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    
    <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav> -->
    <main class="main">
        <div class="">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>

    <?= $this->Html->script(['bootstrap.bundle.min']) ?>
    <?= $this->Html->script(['scripts']) ?>
    <?= $this->Html->script(['sb-forms-latest']) ?>
    <!-- admin js -->
    <?= $this->Html->script(['manage/jquery/jquery.min']) ?>
    <?= $this->Html->script(['manage/bootstrap.bundle.min']) ?>
    <?= $this->Html->script(['manage/jquery.easing.min']) ?>
    <?= $this->Html->script(['manage/sb-admin-2.min']) ?>
    <?= $this->Html->script(['manage/all.min']) ?>
    
</body>
</html>
