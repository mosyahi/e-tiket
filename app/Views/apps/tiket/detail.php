<?= $this->extend('layouts/master-front-end') ?>
<?= $this->section('content') ?>

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-1.png);">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h4><?= $title; ?></h4>
                <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= current_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php if ($act == 'detail-tiket-darat') : ?>
    <div class="card mb-3 mt-3">
        <div class="card-body">
            <div class="row">
                <?php foreach ($tiket as $item) : ?>
                    <?php if ($item['jenis_tiket'] == 1) : ?>
                        <div class="mb-4 col-md-6 col-lg-4 mx-auto">
                            <div class="border h-100 d-flex flex-column justify-content-between pb-3 mt-3 mb-3" style="border-radius: 15px;">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden text-center mt-3"><a class="d-block" href="../../../app/e-commerce/product/product-details.html">
                                            <?php if (1 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-bus-alt fa-4x"></i>
                                            <?php elseif (2 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-subway fa-4x"></i>
                                            <?php elseif (3 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-taxi fa-4x"></i>
                                            <?php elseif (4 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-ship fa-4x"></i>
                                            <?php else : ?>
                                                <i class="fas fa-plane-departure fa-4x"></i>
                                            <?php endif ?>
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h5 class="fs-0"><a class="text-dark" href="../../../app/e-commerce/product/product-details.html"><?= $item['nama_tiket'] ?></a></h5>
                                            <p class="fs--1 mb-3 mt-3">
                                                <a class="text-500" href="#!">
                                                    <?php if (1 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                    <?php elseif (2 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                    <?php elseif (3 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                    <?php elseif (4 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                    <?php else : ?>
                                                        <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                    <?php endif ?>
                                                </a>
                                                <a class="text-500" href="#!">
                                                    <?php if (1 == $item['jenis_tiket']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI DARAT</span>
                                                    <?php elseif (2 == $item['jenis_tiket']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI LAUT</span>
                                                    <?php else : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI UDARA</span>
                                                    <?php endif ?>
                                                </a>
                                            </p>
                                            <h5 class="fs-md-2 text-warning mb-3">RP <?= number_format($item['harga_tiket'], 0, ',', '.'); ?></h5>
                                        </div>
                                        <p class="fs--1 mb-1">Penjual :
                                            <strong>
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </p>
                                        <p class="fs--1 mb-1">Jalur : <strong class="text-success"><?= $item['alamat_tiket'] ?></strong></p>
                                        <p class="fs--1 mb-1">Kontak : <strong class="text-success"><?= $item['no_telepon'] ?></strong></p>
                                        <p class="fs--1 mb-1">Penjual :
                                            <strong>
                                                <?php foreach ($user as $u) : ?>
                                                    <?php if ($u['id_user'] == $item['user_id']) : ?>
                                                        <?= $u['email'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-between-center px-3">
                                    <div>
                                        <?php foreach ($user as $verif) : ?>
                                            <?php if ($verif['id_user'] == $item['user_id']) : ?>
                                                <?php if ($verif['status'] == 0) : ?>
                                                    <span class="badge badge rounded-pill badge-soft-danger">
                                                        <i class="fas fa-times me-1"></i>Belum Terverifikasi
                                                    </span>
                                                <?php else : ?>
                                                    <span class="badge badge rounded-pill badge-soft-success">
                                                        <i class="fas fa-check me-1"></i>Terverifikasi
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                    <div>
                                        <a class="btn btn-sm btn-falcon-default" href="<?= base_url('admin/payment/' . $item['id_tiket'] . '/' . $item['nama_tiket'] . '/' . $item['jenis_transportasi']) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Pesan Sekarang"><span class="fas fa-shopping-cart"></span> Pesan E-Tiket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php elseif ($act == 'detail-tiket-laut') : ?>
    <div class="card mb-3 mt-3">
        <div class="card-body">
            <div class="row">
                <?php foreach ($tiket as $item) : ?>
                    <?php if ($item['jenis_tiket'] == 2) : ?>
                        <div class="mb-4 col-md-6 col-lg-4 mx-auto">
                            <div class="border h-100 d-flex flex-column justify-content-between pb-3 mt-3 mb-3" style="border-radius: 15px;">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden text-center mt-3"><a class="d-block" href="../../../app/e-commerce/product/product-details.html">
                                            <?php if (1 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-bus-alt fa-4x"></i>
                                            <?php elseif (2 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-subway fa-4x"></i>
                                            <?php elseif (3 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-taxi fa-4x"></i>
                                            <?php elseif (4 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-ship fa-4x"></i>
                                            <?php else : ?>
                                                <i class="fas fa-plane-departure fa-4x"></i>
                                            <?php endif ?>
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h5 class="fs-0"><a class="text-dark" href="../../../app/e-commerce/product/product-details.html"><?= $item['nama_tiket'] ?></a></h5>
                                            <p class="fs--1 mb-3 mt-3">
                                                <a class="text-500" href="#!">
                                                    <?php if (1 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                    <?php elseif (2 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                    <?php elseif (3 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                    <?php elseif (4 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                    <?php else : ?>
                                                        <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                    <?php endif ?>
                                                </a>
                                                <a class="text-500" href="#!">
                                                    <?php if (1 == $item['jenis_tiket']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI DARAT</span>
                                                    <?php elseif (2 == $item['jenis_tiket']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI LAUT</span>
                                                    <?php else : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI UDARA</span>
                                                    <?php endif ?>
                                                </a>
                                            </p>
                                            <h5 class="fs-md-2 text-warning mb-3">RP <?= number_format($item['harga_tiket'], 0, ',', '.'); ?></h5>
                                        </div>
                                        <p class="fs--1 mb-1">Penjual :
                                            <strong>
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </p>
                                        <p class="fs--1 mb-1">Jalur : <strong class="text-success"><?= $item['alamat_tiket'] ?></strong></p>
                                        <p class="fs--1 mb-1">Kontak : <strong class="text-success"><?= $item['no_telepon'] ?></strong></p>
                                        <p class="fs--1 mb-1">Penjual :
                                            <strong>
                                                <?php foreach ($user as $u) : ?>
                                                    <?php if ($u['id_user'] == $item['user_id']) : ?>
                                                        <?= $u['email'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-between-center px-3">
                                    <div>
                                        <?php foreach ($user as $verif) : ?>
                                            <?php if ($verif['id_user'] == $item['user_id']) : ?>
                                                <?php if ($verif['status'] == 0) : ?>
                                                    <span class="badge badge rounded-pill badge-soft-danger">
                                                        <i class="fas fa-times me-1"></i>Belum Terverifikasi
                                                    </span>
                                                <?php else : ?>
                                                    <span class="badge badge rounded-pill badge-soft-success">
                                                        <i class="fas fa-check me-1"></i>Terverifikasi
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                    <div>
                                        <a class="btn btn-sm btn-falcon-default" href="<?= base_url('admin/payment/' . $item['id_tiket'] . '/' . $item['nama_tiket'] . '/' . $item['jenis_transportasi']) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Pesan Sekarang"><span class="fas fa-shopping-cart"></span> Pesan E-Tiket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mb-3 mt-3">
        <div class="card-body">
            <div class="row">
                <?php foreach ($tiket as $item) : ?>
                    <?php if ($item['jenis_tiket'] == 3) : ?>
                        <div class="mb-4 col-md-6 col-lg-4 mx-auto">
                            <div class="border h-100 d-flex flex-column justify-content-between pb-3 mt-3 mb-3" style="border-radius: 15px;">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden text-center mt-3"><a class="d-block" href="../../../app/e-commerce/product/product-details.html">
                                            <?php if (1 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-bus-alt fa-4x"></i>
                                            <?php elseif (2 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-subway fa-4x"></i>
                                            <?php elseif (3 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-taxi fa-4x"></i>
                                            <?php elseif (4 == $item['jenis_transportasi']) : ?>
                                                <i class="fas fa-ship fa-4x"></i>
                                            <?php else : ?>
                                                <i class="fas fa-plane-departure fa-4x"></i>
                                            <?php endif ?>
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h5 class="fs-0"><a class="text-dark" href="../../../app/e-commerce/product/product-details.html"><?= $item['nama_tiket'] ?></a></h5>
                                            <p class="fs--1 mb-3 mt-3">
                                                <a class="text-500" href="#!">
                                                    <?php if (1 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                    <?php elseif (2 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                    <?php elseif (3 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                    <?php elseif (4 == $item['jenis_transportasi']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                    <?php else : ?>
                                                        <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                    <?php endif ?>
                                                </a>
                                                <a class="text-500" href="#!">
                                                    <?php if (1 == $item['jenis_tiket']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI DARAT</span>
                                                    <?php elseif (2 == $item['jenis_tiket']) : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI LAUT</span>
                                                    <?php else : ?>
                                                        <span class="badge badge rounded-pill badge-soft-secondary text-dark">TRANSPORTASI UDARA</span>
                                                    <?php endif ?>
                                                </a>
                                            </p>
                                            <h5 class="fs-md-2 text-warning mb-3">RP <?= number_format($item['harga_tiket'], 0, ',', '.'); ?></h5>
                                        </div>
                                        <p class="fs--1 mb-1">Penjual :
                                            <strong>
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </p>
                                        <p class="fs--1 mb-1">Jalur : <strong class="text-success"><?= $item['alamat_tiket'] ?></strong></p>
                                        <p class="fs--1 mb-1">Kontak : <strong class="text-success"><?= $item['no_telepon'] ?></strong></p>
                                        <p class="fs--1 mb-1">Penjual :
                                            <strong>
                                                <?php foreach ($user as $u) : ?>
                                                    <?php if ($u['id_user'] == $item['user_id']) : ?>
                                                        <?= $u['email'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-between-center px-3">
                                    <div>
                                        <?php foreach ($user as $verif) : ?>
                                            <?php if ($verif['id_user'] == $item['user_id']) : ?>
                                                <?php if ($verif['status'] == 0) : ?>
                                                    <span class="badge badge rounded-pill badge-soft-danger">
                                                        <i class="fas fa-times me-1"></i>Belum Terverifikasi
                                                    </span>
                                                <?php else : ?>
                                                    <span class="badge badge rounded-pill badge-soft-success">
                                                        <i class="fas fa-check me-1"></i>Terverifikasi
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                    <div>
                                        <a class="btn btn-sm btn-falcon-default" href="<?= base_url('admin/payment/' . $item['id_tiket'] . '/' . $item['nama_tiket'] . '/' . $item['jenis_transportasi']) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Pesan Sekarang"><span class="fas fa-shopping-cart"></span> Pesan E-Tiket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>


<?= $this->endSection() ?>