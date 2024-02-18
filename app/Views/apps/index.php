<?= $this->extend('layouts/master-front-end') ?>
<?= $this->section('content') ?>

<?php if (session('role') == '1') : ?>

    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                            </div>
                            <!--/.bg-holder-->

                            <div class="position-relative z-index-2">
                                <div>
                                    <h3 class="text-primary mb-1">Welcome, <?= session('nama') ?>!</h3>
                                    <p>Anda login sebagai <b><?= (session('role') == 1) ? 'Admin' : ''; ?></b> menggunakan email <b><?= session('email') ?></b></p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs--1 fw-medium">Total Pesanan Masuk</p>
                                        <h4 class="text-800 mb-0"><?= count($pesanan) ?> Pesanan</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs--1">Total Sales Keseluruhan</p>
                                        <h4 class="text-800 mb-0"><?= $countTransaksi; ?> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-1.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Penjual<span class="badge badge-soft-warning rounded-pill ms-2">M-Tick Owner</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'><?= $countPenjual; ?> Akun</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('admin/biodata/penjual') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-2.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Pembeli<span class="badge badge-soft-info rounded-pill ms-2">M-Tick Customer</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'><?= $countPembeli; ?> Akun</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('admin/biodata/pembeli') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-3.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Transaksi Sukses<span class="badge badge-soft-success rounded-pill ms-2">M-Tick Success</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":43594,"prefix":"$"}'><?= $countTransaksiSuccess; ?> Pay</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('admin/transaksi/bus') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-5.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Pending/Gagal<span class="badge badge-soft-info rounded-pill ms-2">M-Tick Failed</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'><?= $countTransaksiFail; ?> Pay</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('admin/transaksi/kereta') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php elseif (session('role') == '2') : ?>

    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                            </div>
                            <!--/.bg-holder-->

                            <div class="position-relative z-index-2">
                                <div>
                                    <h3 class="text-primary mb-1">Welcome, <?= session('nama') ?>!</h3>
                                    <p>Anda login sebagai <b><?= (session('role') == 2) ? 'Penjual' : ''; ?></b> menggunakan email <b><?= session('email') ?></b></p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs--1 fw-medium">Total Pesanan Masuk</p>
                                        <h4 class="text-800 mb-0"><?= $pesanan; ?> Pesanan</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs--1">Total Sales Keseluruhan</p>
                                        <h4 class="text-800 mb-0"><?= $countTransaksi; ?> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-2.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Sales<span class="badge badge-soft-info rounded-pill ms-2">M-Tick Sales</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'><?= $countTransaksi; ?></div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('penjual/pesanan/bus') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-1.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Produk Anda<span class="badge badge-soft-warning rounded-pill ms-2">M-Tick Product</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'><?= $tiket; ?> Ticket</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('penjual/tiket-darat') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-3.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Transaksi Sukses<span class="badge badge-soft-success rounded-pill ms-2">M-Tick Success</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":43594,"prefix":"$"}'><?= $countTransaksiSuccess; ?> Pay</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('penjual/transaksi/bus') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-5.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Pending/Gagal<span class="badge badge-soft-info rounded-pill ms-2">M-Tick Failed</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'><?= $countTransaksiFail; ?> Pay</div><a class="fw-semi-bold fs--1 text-nowrap" href="app/e-commerce/orders/order-list.html">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>

    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                            </div>
                            <!--/.bg-holder-->

                            <div class="position-relative z-index-2">
                                <div>
                                    <h3 class="text-primary mb-1">Welcome, <?= session('nama') ?>!</h3>
                                    <p>Anda login sebagai <b><?= (session('role') == 3) ? 'Pembeli' : ''; ?></b> menggunakan email <b><?= session('email') ?></b></p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs--1 fw-medium">Hystory Pesanan</p>
                                        <h4 class="text-800 mb-0"><?= $pesanan; ?> Pesanan</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs--1">Total Transaksi Anda</p>
                                        <h4 class="text-800 mb-0"><?= $countTransaksi; ?> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-2.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Transaksi<span class="badge badge-soft-info rounded-pill ms-2">M-Tick Transaksi</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'><?= $countTransaksi; ?></div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('pembeli/pesanan/bus') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-3.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Transaksi Sukses<span class="badge badge-soft-success rounded-pill ms-2">M-Tick Success</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":43594,"prefix":"$"}'><?= $countTransaksiSuccess; ?> Pay</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('pembeli/transaksi/bus') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-1.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Pending/Gagal<span class="badge badge-soft-info rounded-pill ms-2">M-Tick Failed</span></h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'><?= $countTransaksiFail; ?> Pay</div><a class="fw-semi-bold fs--1 text-nowrap" href="<?= base_url('pembeli/transaksi/bus') ?>">Lihat Data<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif ?>
<?= $this->endSection() ?>