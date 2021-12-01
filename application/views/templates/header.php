<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>index.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>responsive.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>comment.css">
    <title><?= $title; ?></title>
</head>

<body>
    <!-- header -->
    <header class="app-bar">
        <div class="container-header">
            <div class="brand">
                <h1>
                    <a href="<?= base_url(); ?>">AsRog</a>
                </h1>
            </div>
            <div class="menu-button">
                <button id="hamburgerButton" title="menu" aria-label="menu">☰</button>
            </div>
            <nav id="navigationDrawer" class="navigation">
                <ul class="nav-list">
                    <li class="nav-item"><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url('home/about'); ?>">About us</a></li>
                    <li class="nav-item"><a href="<?= base_url('home/contact'); ?>">Contact us</a></li>
                    <li class="nav-item">
                        <?php if (!$user) : ?>
                            <a href="<?= base_url('auth'); ?>">Login</a>
                        <?php else : ?>
                            <?php if ($user['role_id'] == 1) :  ?>
                                <a href="<?= base_url('admin'); ?>">
                                <?php else : ?>
                                    <a href="<?= base_url('user'); ?>">
                                    <?php endif; ?>
                                    <img src="<?= base_url('assets/images/profil/') . $user['image']; ?>" alt="<?= $user['name']; ?>" width="32px" style="border-radius: 100%;">
                                    </a>
                                <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- akhir header -->