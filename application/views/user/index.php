<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard"><?= $title; ?></span>
        </div>
    </nav>

    <div class="home-content">
        <div class="card">
            <div class="card-name">
                <div class="status">
                    <p><?= $user['status']; ?></p>
                </div>
                <div class="profile-img">
                    <img src="<?= base_url('assets/images/profil/') . $user['image']; ?>" class="img-fluid rounded-start" alt="<?= $user['name']; ?>">
                </div>
                <div class="profile-description">
                    <h3 class="user-name"><?= $user['name']; ?></h3>
                    <p><?= $user['email']; ?></p>
                    <p><?= $user['telp']; ?></p>

                </div>
                <div class="footer-card">
                    <small>
                        Member since <br> <?= date('d F Y', strtotime(str_replace('/', '-', $user['member_since']))); ?>
                    </small>
                    <small>
                        Location kost <br>
                        <?php
                        $kost = $user['kost'];
                        if ($kost === '') {
                            echo "Not booked yet";
                        }
                        echo $kost;
                        ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>