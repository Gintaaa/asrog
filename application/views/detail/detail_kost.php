<main id="mainContent">
    <section class="kelapa-gading">
        <h1>Kost in <?= $detail['location']; ?></h1>
        <div class="image-boarding">
            <div class="outside-theHouse">
                <img src="<?= base_url('assets/images/'); ?><?= $detail['image_primary']; ?>" alt="Cipinang">
            </div>
            <div class="inside-theHouse">
                <div class="bed-room">
                    <img src="<?= base_url('assets/images/'); ?><?= $detail['image1']; ?>" alt="Cipinang bed room">
                </div>
                <div class="kitchen-room">
                    <img src="<?= base_url('assets/images/'); ?><?= $detail['image2']; ?>" alt="Cipinang kitchen room">
                </div>
            </div>
        </div>
    </section>

    <section class="detail-description">
        <div class="description">
            <h2>Description</h2>
            <p><?= $detail['description']; ?></p>
            <p><span>Full address : </span> <?= $detail['full_address']; ?></p>
        </div>
        <div class="facilitas">
            <h2>Facilitas</h2>
            <p><?= $detail['facility']; ?></p>
            <p><span>Payment per month : </span> IDR. <?= number_format($detail['price']); ?></p>
            <p><span>Room size : </span> <?= $detail['room_size']; ?> m</p>
            <p><span>Available room : </span> <?= $detail['empty']; ?> room</p>
            <div class="chat" style="margin-top: 40px;">
                <a href="<?= base_url('transaction/booking/'); ?><?= $detail['kode_kost']; ?>">Book Now</a>
            </div>
        </div>
    </section>
    <!-- akhir most popular -->

</main>
<!-- akhir main content -->