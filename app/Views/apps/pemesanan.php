<?= $this->extend('layouts/master-front-end') ?>
<?= $this->section('content') ?>
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
<?php if (session('role') == 1) : ?>
    <?php if ($act == 'bus') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 1) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                            <td class="py-2 align-middle white-space-nowrap text-end">
                                                <div class="dropdown font-sans-serif position-static">
                                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                        <div class="bg-white py-2">
                                                            <a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#hapus-<?= $item['id_pemesanan'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'kereta') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 2) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                            <td class="py-2 align-middle white-space-nowrap text-end">
                                                <div class="dropdown font-sans-serif position-static">
                                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                        <div class="bg-white py-2">
                                                            <a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#hapus-<?= $item['id_pemesanan'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'angkutan') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 3) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                            <td class="py-2 align-middle white-space-nowrap text-end">
                                                <div class="dropdown font-sans-serif position-static">
                                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                        <div class="bg-white py-2">
                                                            <a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#hapus-<?= $item['id_pemesanan'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'kapal') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 4) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                            <td class="py-2 align-middle white-space-nowrap text-end">
                                                <div class="dropdown font-sans-serif position-static">
                                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                        <div class="bg-white py-2">
                                                            <a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#hapus-<?= $item['id_pemesanan'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 5) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                            <td class="py-2 align-middle white-space-nowrap text-end">
                                                <div class="dropdown font-sans-serif position-static">
                                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                        <div class="bg-white py-2">
                                                            <a class="dropdown-item text-danger" href="#!" data-bs-toggle="modal" data-bs-target="#hapus-<?= $item['id_pemesanan'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
<?php elseif (session('role') == 2) : ?>
    <?php if ($act == 'bus') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="status" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="amount" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 1 && $t['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'kereta') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 2 && $t['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'angkutan') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 3 && $t['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'kapal') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 4 && $t['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 5 && $t['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
<?php else : ?>
    <?php if ($act == 'bus') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="status" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="amount" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 1 && $item['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'kereta') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 2 && $item['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'angkutan') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 3 && $item['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
    <?php elseif ($act == 'kapal') : ?>
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 4 && session('user_id') == $item['user_id']) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
        <?= $this->include('notification/alerts') ?>
        <div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0"><?= $title; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                                <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Pembeli</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Nama Tiket</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Jenis Transportasi</th>
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Expired Ticket</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-orders-body">
                            <?php $i = 1; ?>
                            <?php foreach ($pesanan as $item) : ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <?php if ($t['id_tiket'] == $item['tiket_id'] && $t['jenis_transportasi'] == 5 && $item['user_id'] == session('user_id')) : ?>
                                        <tr class="btn-reveal-trigger">
                                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($biodata as $b) : ?>
                                                    <?php if ($b['id_biodata'] == $item['biodata_id']) : ?>
                                                        <?= $b['nama_lengkap'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $tik) : ?>
                                                    <?php if ($tik['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?= $tik['nama_tiket'] ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?php foreach ($tiket as $t) : ?>
                                                    <?php if ($t['id_tiket'] == $item['tiket_id']) : ?>
                                                        <?php if (1 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-warning">BUS</span>
                                                        <?php elseif (2 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-primary">KERETA</span>
                                                        <?php elseif (3 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-info">ANGKUTAN UMUM</span>
                                                        <?php elseif (4 == $t['jenis_transportasi']) : ?>
                                                            <span class="badge badge rounded-pill badge-soft-danger">KAPAL</span>
                                                        <?php else : ?>
                                                            <span class="badge badge rounded-pill badge-soft-success">PESAWAT</span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="date py-2 align-middle">
                                                <?= date('d M Y', strtotime($item['tanggal_pembelian'])) ?>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
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
<?php endif ?>
<?= $this->endSection() ?>

<?= $this->section('scripting') ?>
<?php foreach ($pesanan as $item) : ?>
    <div class="modal fade" id="hapus-<?= $item['id_pemesanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="add-label" aria-hidden="true">
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
                    <a class="btn btn-primary" type="button" href="<?= base_url('admin/pesanan/delete/' . $item['id_pemesanan']) ?>">Hapus </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>