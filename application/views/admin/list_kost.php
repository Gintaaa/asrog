<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard"><?= $title; ?></span>
        </div>
    </nav>
    <div class="home-content">
        <div class="action-admin">
            <a href="<?= base_url('admin/add'); ?>" class="add"><i class='bx bxs-user-plus'></i></a>
        </div>

        <div class="overview-boxes member list-kost">
            <?php foreach ($kost as $k) : ?>
                <div class="box">
                    <div class="card-user">
                        <div class="picture-profile">
                            <img src="<?= base_url('assets/images/') . $k['image_primary']; ?>" alt="<?= $k['location']; ?>">
                        </div>
                        <div class="right-side">
                            <h3 class="user-name"><?= $k['location']; ?></h3>
                            <div class="indicator">
                                <span class="text"><?= $k['full_address']; ?></span>
                            </div>
                        </div>
                        <div class="devider"></div>
                        <div class="action">
                            <a onclick="return confirm('are you sure want to delete this kost?')" href="<?= base_url('admin/deleteKost/'); ?><?= $k['id']; ?>" class="remove">Delete</a>
                            <a href="<?= base_url('admin/editKost/'); ?><?= $k['id']; ?>" id="btn-edit" class="btn edit" title="edit">Edit</a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>


    </div>
    </div>
</section>