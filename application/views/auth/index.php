<div class="container-form">
    <div class="form">
        <h1>Login</h1>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('auth'); ?>" method="POST">
            <div class="email">
                <input type="text" name="email" id="email" placeholder="Email address" value="<?= set_value('email'); ?>">
                <?= form_error('email', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Password">
                <?= form_error('password', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="btn-form">
                <button type="submit" class="btn-login">Login</button>
            </div>
            <div class="forgot-password asked-for">
                <small><a href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a></small>
            </div>
            <div class="create-account">
                <small><a href="<?= base_url('auth/registration'); ?>">Create an Account!</a></small>
            </div>
        </form>
    </div>
</div>