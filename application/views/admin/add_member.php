<div class="container-form">
    <div class="form">
        <h1>Add Member</h1>
        <form method="POST" action="<?= base_url('admin/add'); ?>">
            <div class="name">
                <input type="text" name="name" id="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                <?= form_error('name', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="telp">
                <input type="number" id="phone" name="phone" placeholder="Phone Number" value="<?= set_value('phone'); ?>" style="background-color: white;">
                <?= form_error('phone', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="email">
                <input type="text" name="email" id="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                <?= form_error('email', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="address">
                <input type="text" name="address" id="address" placeholder="Full Address" value="<?= set_value('address'); ?>">
                <?= form_error('address', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="password">
                <input type="password" name="password1" id="password1" placeholder="Password">
                <?= form_error('password1', ' <small class="text-danger">', '</small>'); ?>
            </div>
            <div class="password">
                <input type="password" name="password2" id="password2" placeholder="Confirm Password">
            </div>
            <div class="btn-form">
                <button type="submit" class="btn-login">Add Member</button>
            </div>
            <div class="asked-for">
                <small class="already"><a href="<?= base_url('admin'); ?>">Cancel</a>
                </small>
            </div>
        </form>
    </div>
</div>