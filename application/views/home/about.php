<main id="mainContent">
    <section class="about">
        <h1>About Us</h1>
        <article class="about-text">
            <p>
                Kos–kosan merupakan suatu kebutuhan primer bagi beberapa masyarakat yang harus dipenuhi untuk brtahan hidup. Kos–kosan merupakan tempat yang disediakan untuk memfasilitasi wanita maupun pria, dari pelajar, mahasiswa, dan pekerja umumnya untuk tinggal, dan dengan proses pembayaran per bulan atau sesuai pemilik.
            </p>
            <br>
            <p>
                Pendataan administrasi pada suatu Kos–kosan memerlukan ketepatan mekanisme dan penataan yang terorganisir agar data dapat terkemas dan terjaga keamanannya dengan baik. Aplikasi pemesanan Kos-kosan ini dapat dimanfaatkan dalam pengolahan data yang tadinya secara manual menjadi pola komputerisasi yang mempermudah proses pencarian data-data yang telah tersimpan dalam database.
            </p>
        </article>

        <h1>Our Team</h1>
        <article class="who-we-are">
            <?php foreach ($administrators as $admin) : ?>
                <div class="profil">
                    <div class="img-profil">
                        <a href="https://github.com/<?= $admin['github']; ?> " target="_blank">
                            <img src="<?= base_url('/assets/images/profil/'); ?><?= $admin['image']; ?>" alt="<?= $admin['name']; ?>">
                        </a>
                    </div>
                    <h2><?= $admin['name']; ?></h2>
                    <p><?= $admin['nim']; ?></p>
                </div>
            <?php endforeach; ?>
        </article>
    </section>

</main>