<div class="container-form">
    <div class="form">
        <h1>Forgot Password?</h1>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('auth/forgotpassword'); ?>" method="POST">
            <div class="email">
                <input type="text" name="email" id="email" placeholder="Email address" value="<?= set_value('email'); ?>">
                <?= form_error('email', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="btn-form">
                <button type="submit" class="btn-login">Reset Password</button>
            </div>
            <div class="create-account">
                <small><a href="<?= base_url('auth'); ?>">Back to login</a></small>
            </div>
        </form>
    </div>
</div>