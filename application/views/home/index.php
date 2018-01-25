<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <?php
    $is_login = $this->session->userdata('is_login');
    $nama = $this->session->userdata('nama');
    $level = $this->session->userdata('level');
    ?>
    <!-- <?= var_dump($this->session->userdata()); ?> -->
    <?php if ($is_login): ?>

        <?php if ($level === 'admin'): ?>
            <!--Untuk tampilan home admin-->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body bg-deep-purple"><p>Halo, <strong><?= ucfirst($nama) ?></strong>!</p>
                            <p>Selamat Bekerja</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!--Untuk tampilan home anggota-->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body bg-deep-purple"><p>Halo, <strong><?= ucfirst($nama) ?></strong>!</p>
                            <p>Selamat Datang</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>

    <?php else: ?>
        <!--Untuk tampilan home tanpa login-->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body bg-deep-purple"><p>Selamat datang di Aplikasi Inventory !!!</p>
                        <p>Untuk menggunakan aplikasi ini silakan <strong>"login"</strong> terlebih dahulu.</p>
                    </div>
                </div>
            </div>
        </div>


    <?php endif ?>


</div>