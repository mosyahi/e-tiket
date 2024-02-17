<?= $this->extend('layouts/master-front-end') ?>
<?= $this->section('content') ?>
<?php if ($act == 'tiket-darat') : ?>
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-4.png);">
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
    <?= $this->include('notification/alerts') ?>
    <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Views Data</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <div id="orders-actions">
                        <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">Tambah Data</span>
                        </button>
                        <!-- <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button>
                    <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Tiket</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Jalur</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        <?php $i = 1; ?>
                        <?php foreach ($tiket as $item) : ?>
                            <?php if ($item['jenis_tiket'] == '1') : ?>
                                <tr class="btn-reveal-trigger">
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap">
                                        <?php foreach ($biodata as $bio) : ?>
                                            <?php if ($bio['id_biodata'] == $item['biodata_id']) : ?>
                                                <?= $bio['nama_lengkap'] ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </td>
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $item['nama_tiket'] ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap">
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
                                    </td>
                                    <td class="order py-2 align-middle white-space-nowrap">RP <?= number_format($item['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $item['alamat_tiket'] ?></td>
                                    <td class="py-2 align-middle white-space-nowrap text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                <div class="bg-white py-2">
                                                    <a class="dropdown-item" href="#" data-bs-target="#edit-<?= $item['id_tiket'] ?>" data-bs-toggle="modal">Edit</a>
                                                    <!-- <a class="dropdown-item" href="#!">View</a> -->
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-target="#hapus-<?= $item['id_tiket'] ?>" data-bs-toggle="modal">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
<?php elseif ($act == 'tiket-laut') : ?>
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-4.png);">
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
    <?= $this->include('notification/alerts') ?>
    <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Views Data</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <div id="orders-actions">
                        <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">Tambah Data</span>
                        </button>
                        <!-- <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button>
                    <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Tiket</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Jalur</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        <?php $i = 1; ?>
                        <?php foreach ($tiket as $item) : ?>
                            <?php if ($item['jenis_tiket'] == '2') : ?>
                                <tr class="btn-reveal-trigger">
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap">
                                        <?php foreach ($biodata as $bio) : ?>
                                            <?php if ($bio['id_biodata'] == $item['biodata_id']) : ?>
                                                <?= $bio['nama_lengkap'] ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </td>
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $item['nama_tiket'] ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap">
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
                                    </td>
                                    <td class="order py-2 align-middle white-space-nowrap">RP <?= number_format($item['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $item['alamat_tiket'] ?></td>
                                    <td class="py-2 align-middle white-space-nowrap text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                <div class="bg-white py-2">
                                                    <a class="dropdown-item" href="#" data-bs-target="#edit-<?= $item['id_tiket'] ?>" data-bs-toggle="modal">Edit</a>
                                                    <!-- <a class="dropdown-item" href="#!">View</a> -->
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-target="#hapus-<?= $item['id_tiket'] ?>" data-bs-toggle="modal">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../template/plugins/assets/img/icons/spot-illustrations/corner-4.png);">
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
    <?= $this->include('notification/alerts') ?>
    <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Views Data</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <div id="orders-actions">
                        <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">Tambah Data</span>
                        </button>
                        <!-- <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button>
                    <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Tiket</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Jalur</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        <?php $i = 1; ?>
                        <?php foreach ($tiket as $item) : ?>
                            <?php if ($item['jenis_tiket'] == '3') : ?>
                                <tr class="btn-reveal-trigger">
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap">
                                        <?php foreach ($biodata as $bio) : ?>
                                            <?php if ($bio['id_biodata'] == $item['biodata_id']) : ?>
                                                <?= $bio['nama_lengkap'] ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </td>
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $item['nama_tiket'] ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap">
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
                                    </td>
                                    <td class="order py-2 align-middle white-space-nowrap">RP <?= number_format($item['harga_tiket'], 0, ',', '.'); ?></td>
                                    <td class="order py-2 align-middle white-space-nowrap"><?= $item['alamat_tiket'] ?></td>
                                    <td class="py-2 align-middle white-space-nowrap text-end">
                                        <div class="dropdown font-sans-serif position-static">
                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                <div class="bg-white py-2">
                                                    <a class="dropdown-item" href="#" data-bs-target="#edit-<?= $item['id_tiket'] ?>" data-bs-toggle="modal">Edit</a>
                                                    <!-- <a class="dropdown-item" href="#!">View</a> -->
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-target="#hapus-<?= $item['id_tiket'] ?>" data-bs-toggle="modal">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
<?php endif ?>
<?= $this->endSection() ?>


<!-- >>>>>>>>>>>>>>>>>>>> MODAL <<<<<<<<<<<<<<<<<<<< -->
<?= $this->section('scripting') ?>
<link href="<?= base_url() ?>template/plugins/vendors/choices/choices.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>template/plugins/vendors/choices/choices.min.js"></script>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add-label" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                    <h4 class="mb-0 text-white" id="add-label">Form Tambah Tiket</h4>
                    <p class="fs--1 mb-0 text-white">Pastikan semua form terisi</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 px-5">
                <form method="POST" action="<?= base_url('admin/create-tiket') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="status" value="1">
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Penjual E-Tiket<span class="text-danger">*</span></label>
                        <select class="form-select js-choice" id="organizerSingle" size="1" name="biodata_id" data-options='{"removeItemButton":false,"placeholder":true}'>
                            <option disabled selected>Pilih Penjual</option>
                            <?php foreach ($user as $us) : ?>
                                <?php foreach ($biodata as $bio) : ?>
                                    <?php if ($bio['user_id'] == $us['id_user'] && $us['role'] == '2') : ?>
                                        <option value="<?= $bio['id_biodata'] ?>"><?= $bio['nama_lengkap'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-email">Nama Tiket<span class="text-danger">*</span></label>
                        <input class="form-control" id="basic-form-name" type="text" placeholder="Nama E-Tiket" name="nama_tiket" value="<?= old('nama_tiket') ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-gender">Jenis Tiket<span class="text-danger">*</span></label>
                        <select class="form-select" name="jenis_tiket" id="basic-form-gender" aria-label="Default select example">
                            <option selected="selected">Pilih Jenis Tiket</option>
                            <option value="1">Transportasi Darat</option>
                            <option value="2">Transportasi Laut</option>
                            <option value="3">Transportasi Udara</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-gender">Jenis Transportasi<span class="text-danger">*</span></label>
                        <select class="form-select" name="jenis_transportasi" id="basic-form-gender" aria-label="Default select example">
                            <option selected="selected">Pilih Jenis Transportasi</option>
                            <option value="1">Bus</option>
                            <option value="2">Kereta</option>
                            <option value="3">Angkutan Umum</option>
                            <option value="4">Kapal</option>
                            <option value="5">Pesawat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-email">Harga Tiket<span class="text-danger">*</span></label>
                        <input class="form-control" id="basic-form-name" type="text" placeholder="Harga E-Tiket" name="harga_tiket" value="<?= old('harga_tiket') ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-email">Jumlah Tiket<span class="text-danger">*</span></label>
                        <input class="form-control" id="basic-form-name" type="text" placeholder="Jumlah E-Tiket" name="jumlah_tiket" value="<?= old('jumlah_tiket') ?>" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-textarea">Alamat Tiket<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="alamat_tiket" id="basic-form-textarea" rows="3" placeholder="Alamat Tiket" reuired><?= old('alamat_tiket') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($tiket as $item) : ?>
    <div class="modal fade" id="edit-<?= $item['id_tiket'] ?>" tabindex="-1" role="dialog" aria-labelledby="add-label" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                    <div class="position-relative z-index-1 light">
                        <h4 class="mb-0 text-white" id="add-label">Form Tambah Tiket</h4>
                        <p class="fs--1 mb-0 text-white">Pastikan semua form terisi</p>
                    </div>
                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 px-5">
                    <form method="POST" action="<?= base_url('admin/update-tiket/' . $item['id_tiket']) ?>">
                        <input type="hidden" name="status" value="1">
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-name">Penjual E-Tiket<span class="text-danger">*</span></label>
                            <select class="form-select js-choice" id="organizerSingle" size="1" name="biodata_id" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option disabled selected>Pilih Penjual</option>
                                <?php foreach ($user as $us) : ?>
                                    <?php foreach ($biodata as $bio) : ?>
                                        <?php if ($bio['user_id'] == $us['id_user'] && $us['role'] == '2') : ?>
                                            <option value="<?= $bio['id_biodata'] ?>" <?= ($bio['id_biodata'] == $item['biodata_id']) ? 'selected' : '' ?>><?= $bio['nama_lengkap'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-email">Nama Tiket<span class="text-danger">*</span></label>
                            <input class="form-control" id="basic-form-name" type="text" placeholder="Nama E-Tiket" name="nama_tiket" value="<?= $item['nama_tiket'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-gender">Jenis Tiket<span class="text-danger">*</span></label>
                            <select class="form-select" name="jenis_tiket" id="basic-form-gender" aria-label="Default select example">
                                <option selected="selected">Pilih Jenis Tiket</option>
                                <option value="1" <?= ($item['jenis_tiket'] == 1) ? 'selected' : '' ?>>Transportasi Darat</option>
                                <option value="2" <?= ($item['jenis_tiket'] == 2) ? 'selected' : '' ?>>Transportasi Laut</option>
                                <option value="3" <?= ($item['jenis_tiket'] == 3) ? 'selected' : '' ?>>Transportasi Udara</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-gender">Jenis Transportasi<span class="text-danger">*</span></label>
                            <select class="form-select" name="jenis_transportasi" id="basic-form-gender" aria-label="Default select example">
                                <option selected="selected">Pilih Jenis Transportasi</option>
                                <option value="1" <?= ($item['jenis_transportasi'] == 1) ? 'selected' : '' ?>>Bus</option>
                                <option value="2" <?= ($item['jenis_transportasi'] == 2) ? 'selected' : '' ?>>Kereta</option>
                                <option value="3" <?= ($item['jenis_transportasi'] == 3) ? 'selected' : '' ?>>Angkutan Umum</option>
                                <option value="4" <?= ($item['jenis_transportasi'] == 4) ? 'selected' : '' ?>>Kapal</option>
                                <option value="5" <?= ($item['jenis_transportasi'] == 5) ? 'selected' : '' ?>>Pesawat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-email">Harga Tiket<span class="text-danger">*</span></label>
                            <input class="form-control" id="basic-form-name" type="text" placeholder="Harga E-Tiket" name="harga_tiket" value="<?= $item['harga_tiket'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-email">Jumlah Tiket<span class="text-danger">*</span></label>
                            <input class="form-control" id="basic-form-name" type="text" placeholder="Jumlah E-Tiket" name="jumlah_tiket" value="<?= $item['jumlah_tiket'] ?>" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-form-textarea">Alamat Tiket<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="alamat_tiket" id="basic-form-textarea" rows="3" placeholder="Alamat Tiket" reuired><?= $item['alamat_tiket'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus-<?= $item['id_tiket'] ?>" tabindex="-1" role="dialog" aria-labelledby="add-label" aria-hidden="true">
        <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                    <div class="position-relative z-index-1 light">
                        <h4 class="mb-0 text-white" id="add-label">Konfirmasi Penghapusan Data</h4>
                        <p class="fs--1 mb-0 text-white">Data akan terhapus permanen</p>
                    </div>
                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 px-5">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" type="button" href="<?= base_url('admin/delete-tiket/' . $item['id_tiket']) ?>">Hapus </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>