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

<div class="card mb-3" id="ordersTable" data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Orders</h5>
            </div>
            <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                <div class="d-none" id="orders-bulk-actions">
                    <div class="d-flex">
                        <select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                        </select>
                        <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                    </div>
                </div>
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
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                        <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Nama</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Email</th>
                        <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Role</th>
                        <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Status</th>
                        <th class="no-sort"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-orders-body">
                    <?php $i = 1; ?>
                    <?php foreach ($user as $item) : ?>
                        <tr class="btn-reveal-trigger">
                            <td class="order py-2 align-middle white-space-nowrap"><?= $i++; ?></td>
                            <td class="date py-2 align-middle"><?= $item['nama'] ?></td>
                            <td class="date py-2 align-middle"><?= $item['email'] ?></td>
                            <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                <?php if ($item['role'] == '1') : ?>
                                    <span class="badge badge rounded-pill d-block badge-soft-success"><?= ($item['role'] == '1') ? 'Admin' : '' ?></span>
                                <?php elseif ($item['role'] == '2') : ?>
                                    <span class="badge badge rounded-pill d-block badge-soft-primary"><?= ($item['role'] == '2') ? 'Penjual' : '' ?></span>
                                <?php else : ?>
                                    <span class="badge badge rounded-pill d-block badge-soft-warning"><?= ($item['role'] == '3') ? 'Pembeli' : '' ?></span>
                                <?php endif ?>
                            </td>
                            <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                <?php if ($item['status'] == '0') : ?>
                                    <span class="badge badge rounded-pill badge-soft-danger">Non-Active</span>
                                <?php else : ?>
                                    <span class="badge badge rounded-pill badge-soft-info">Active</span>
                                <?php endif ?>
                            </td>
                            <td class="py-2 align-middle white-space-nowrap text-end">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                        <div class="bg-white py-2">
                                            <a class="dropdown-item" href="#" data-bs-target="#edit-<?= $item['id_user'] ?>" data-bs-toggle="modal">Edit</a>
                                            <a class="dropdown-item" href="#!">View</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#!">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
<?= $this->endSection() ?>

<?= $this->section('scripting') ?>
<?php foreach ($user as $item) : ?>
    <div class="modal fade" id="edit-<?= $item['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="add-label" aria-hidden="true">
        <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                    <div class="position-relative z-index-1 light">
                        <h4 class="mb-0 text-white" id="add-label">Form Edit User</h4>
                        <p class="fs--1 mb-0 text-white">pastikan semua form terisi</p>
                    </div>
                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 px-5">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="modal-auth-name">Nama<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="modal-auth-email">Email<span class="text-danger">*</span></label>
                            <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                        </div>
                        <div class="row gx-2">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="modal-auth-password">Password<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="modal-auth-confirm-password">Confirm Password<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>