<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard"><?= $title; ?></span>
        </div>
    </nav>

    <div class="home-content">
        <div class="card-form">
            <div class="form">
                <?php foreach ($user as $u) : ?>
                    <form action="<?= base_url('admin/updateUser'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $u['id'] ?>">
                        <div class="row-input">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" value="<?= $u['name']; ?>">
                            <?= form_error('name', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="name">No Telp</label>
                            <input type="number" name="telp" id="telp" value="<?= $u['telp']; ?>">
                            <?= form_error('telp', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="name">Kost</label>
                            <input type="text" name="kost" id="kost" value="<?= $u['kost']; ?>">
                            <?= form_error('kost', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="name">Member Since</label>
                            <input type="date" class="form-control" name="member_since" value="<?php echo isset($itemOutData->member_since) ? set_value('member_since', date('Y-m-d', strtotime($itemOutData->member_since))) : set_value('member_since'); ?>">
                            <?= form_error('member_since', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="btn">
                            <button type="submit" class="btn-save">Save</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>