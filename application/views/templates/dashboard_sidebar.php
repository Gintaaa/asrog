<div class="sidebar">
    <div class="logo-details">
        <a href="<?= base_url('home'); ?>">
            <i class='bx bx-home-heart'></i>
            <span class="logo_name">Asrog</span>
        </a>
    </div>

    <ul class="nav-links">
        <!-- QUERY MENU SESUAI HAK AKSES -->
        <?php
        $role_id = $this->session->userdata('role_id');
        // Join table menu & user_access_menu
        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";

        $menu = $this->db->query($queryMenu)->result_array();
        ?>


        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
            <!-- QUERY SUB MENU -->
            <?php
            $menu_id = $m['id'];
            $querySubMenu = "SELECT *
                        FROM `user_sub_menu` JOIN `user_menu`
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                       WHERE `user_sub_menu`.`menu_id` = $menu_id
                         AND `user_sub_menu`.`is_active` = 1
                    ";

            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>
            <!-- LOOPING SUB MENU -->
            <?php foreach ($subMenu as $sm) : ?>
                <li>
                    <a href="<?= base_url($sm['url']); ?>" class="active">
                        <i class='<?= $sm['icon']; ?>'></i>
                        <span class="links_name"><?= $sm['title']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <li class="log_out">
            <a href="<?= base_url('auth/logout'); ?>">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>