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
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('user/changepassword'); ?>" method="POST">
                    <div class="row-input">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password">
                        <?= form_error('current_password', ' <small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row-input">
                        <label for="new_password1">New Password</label>
                        <input type="password" name="new_password1" id="new_password1">
                        <?= form_error('new_password1', ' <small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row-input">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password">
                        <?= form_error('confirm_password', ' <small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="btn">
                        <button type="submit" class="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>