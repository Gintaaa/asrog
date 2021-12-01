<!-- hero -->
<section class="hero">
    <div class="container-hero">
        <div class="text-hero">
            <h1>The best place <br> to stay is right here</h1>
            <p>Are you looking for a place that is cheap, <br>
                complete and comfortable? <br>
                do not worry we have provided it for you
            </p>
            <div class="show-me">
                <a href="#mainContent" id="show-me">Show Me</a>
            </div>
        </div>
        <div class="image-hero">
            <img src="<?= base_url('assets/'); ?>images/hero.jpg" alt="AsRog">
            <div class="overlay"></div>
        </div>
    </div>
</section>
<!-- akhir hero -->

<!-- main content -->
<main id="mainContent">
    <section class="container-boarding-house">
        <h2>Explore Your Stay</h2>
        <div class="list-boarding-house">
            <?php foreach ($kost as $k) : ?>
                <div class="boarding-house-item">
                    <div class="img-item">
                        <img src="<?= base_url('assets/images/'); ?><?= $k['image_primary']; ?>" alt="Cipinang">
                        <div class="overlay-img"></div>
                    </div>
                    <div class="rating">
                        <p>Rating <?= $k['rating']; ?></p>
                    </div>
                    <div class="location">
                        <h3 class="city">
                            <a href="<?= base_url('home/details/'); ?><?= $k['kode_kost']; ?>"><?= $k['location']; ?></a>
                        </h3>
                        <p class="price">IDR. <?= number_format($k['price']); ?> / month</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- most popular -->
    <section class="most-popular">
        <h2>Most Popular</h2>
        <p>
            one of kost that
            is very much in demand by
            many young people.
        </p>
        <div class="most-popular-content">
            <?php foreach ($kost as $k) : ?>
                <?php if ($k['kode_kost'] == 'K04') :  ?>
                    <div class="img-most-popular">
                        <img src="<?= base_url('assets/images/'); ?><?= $k['image_primary']; ?>" alt="Pluit">
                    </div>
                    <div class="text-most-popular">
                        <h2>Kost Pluit </h2>
                        <h3><?= $k['description']; ?></h3>
                        <div class="button-most-popular" style="margin-top: 40px;">
                            <div class="detail-btn">
                                <a href="<?= base_url('home/details/'); ?><?= $k['kode_kost']; ?>">Detail</a>
                            </div>
                            <div class="chat">
                                <a href="<?= base_url('home/booking/'); ?><?= $k['kode_kost']; ?>">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- akhir most popular -->

</main>
<!-- akhir main content -->