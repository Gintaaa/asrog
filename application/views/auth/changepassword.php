<div class="container-form">
    <div class="form">
        <h1>Change Password</h1>
        <?= $this->session->userdata('reset_email'); ?>
        <form action="<?= base_url('auth/changepassword'); ?>" method="POST">
            <div class="password">
                <input type="password" name="password1" id="password1" placeholder="New Password">
                <?= form_error('password1', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="password">
                <input type="password" name="password2" id="password2" placeholder="Confirm Password">
                <?= form_error('password2', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="btn-form">
                <button type="submit" class="btn-login">Change Password</button>
            </div>
        </form>
    </div>
</div>