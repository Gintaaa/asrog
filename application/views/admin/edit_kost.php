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
                <?php foreach ($details as $detail) : ?>
                    <form action="<?= base_url('admin/updateKost'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $detail['id'] ?>">
                        <div class="row-input">
                            <label for="kode_kost">Kode Kost</label>
                            <input type="text" name="kode_kost" id="kode_kost" value="<?= $detail['kode_kost'] ?>" readonly>
                            <?= form_error('kode_kost', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="room_size">Room Size</label>
                            <input type="text" name="room_size" id="room_size" value="<?= $detail['room_size'] ?>">
                            <?= form_error('room_size', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="room_qty">Total Room</label>
                            <input type="number" name="room_qty" id="room_qty" value="<?= $detail['room_qty'] ?>">
                            <?= form_error('room_qty', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="<?= $detail['price'] ?>"">
                            <?= form_error('price', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class=" row-input">
                            <label for="facility">Facility</label>
                            <input type="text" name="facility" id="facility" value="<?= $detail['facility'] ?>">
                            <?= form_error('facility', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="empty">Available Room</label>
                            <input type="number" name="empty" id="empty" value="<?= $detail['empty'] ?>">
                            <?= form_error('empty', ' <small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row-input">
                            <label for="filled">Room Filled</label>
                            <input type="number" name="filled" id="filled" value="<?= $detail['filled'] ?>">
                            <?= form_error('filled', ' <small class="text-danger">', '</small>'); ?>
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