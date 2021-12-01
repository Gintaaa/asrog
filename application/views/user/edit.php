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
                </form>
                <?= $this->session->flashdata('message'); ?>
                <?= form_open_multipart('user/edit'); ?>
                <div class="row-input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                </div>
                <div class="row-input">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', ' <small class="text-danger">', '</small>'); ?>
                </div>
                <div class="picture-input">
                    <label for="image">Picture</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="btn">
                    <button type="submit" class="btn-save">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>