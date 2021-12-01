    <!-- footer -->
    <footer>
        <div class="list-footer">
            <h1 class="brand">
                <a href="<?= base_url('home'); ?>">AsRog</a>
            </h1>
            <ul>
                <li><a href="#">Developer</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Terms & condition</a></li>
            </ul>
        </div>
        <div class="copyright">
            <p>Copyright &copy; 2021 | Asrog | All right reserved</p>
        </div>
    </footer>
    <!-- akhir footer -->

    <script src="<?= base_url('assets/js/'); ?>index.js"></script>
    <script>
        const btn = document.querySelector('#show-me');
        btn.addEventListener('click', smoothScroll);

        function smoothScroll(e) {
            e.preventDefault();

            window.scrollTo({
                top: 600,
                behavior: "smooth"
            });
        }
    </script>
    </body>

    </html>