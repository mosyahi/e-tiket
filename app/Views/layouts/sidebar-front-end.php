<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="<?= current_url() ?>">
            <div class="d-flex align-items-center py-3"><img class="me-2" src="<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">M-TICK</span>
            </div>
        </a>
    </div>
    <?php if (session('role') == 1) : ?>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
                <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                    <li class="nav-item mt-2">
                        <a class="nav-link <?= ($act == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-home"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Account
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link <?= ($act == 'user') ? 'active' : '' ?>" href="<?= base_url('admin/data-user') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-lock"></span></span><span class="nav-link-text ps-1">Data User</span>
                            </div>
                        </a>
                        <a class="nav-link dropdown-indicator <?= ($act == 'penjual' || $act == 'pembeli') ? 'active' : '' ?>" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="<?= ($act == 'penjual' || $act == 'pembeli') ? 'true' : 'false' ?>" aria-controls="user">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Biodata</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'penjual' || $act == 'pembeli') ? 'show' : '' ?>" id="user">
                            <li class="nav-item">
                                <a class="nav-link <?= ($act == 'penjual') ? 'active' : '' ?>" href="<?= base_url('admin/biodata/penjual') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Penjual Ticket</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($act == 'pembeli') ? 'active' : '' ?>" href="<?= base_url('admin/biodata/pembeli') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pembeli Ticket</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Pages
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link dropdown-indicator <?= ($act == 'tiket-darat' || $act == 'tiket-laut' || $act == 'tiket-udara') ? 'active' : '' ?>" href="#e-ticket" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">E-Ticket</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'tiket-darat' || $act == 'tiket-laut' || $act == 'tiket-udara') ? 'show' : '' ?>" id="e-ticket">
                            <li class="nav-item"><a class="nav-link <?= ($act == 'tiket-darat') ? 'active' : '' ?>" href="<?= base_url('admin/tiket-darat') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'tiket-laut') ? 'active' : '' ?>" href="<?= base_url('admin/tiket-laut') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'tiket-udara') ? 'active' : '' ?>" href="<?= base_url('admin/tiket-udara') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                        <a class="nav-link dropdown-indicator <?= ($act == 'detail-tiket-darat' || $act == 'detail-tiket-laut' || $act == 'detail-tiket-udara') ? 'active' : '' ?>" href="#e-ticket-d" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-clipboard-list"></span></span><span class="nav-link-text ps-1">E-Ticket Detail</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'detail-tiket-darat' || $act == 'detail-tiket-laut' || $act == 'detail-tiket-udara' || $act == 'tiket') ? 'show' : '' ?>" id="e-ticket-d">
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-darat') ? 'active' : '' ?>" href="<?= base_url('admin/detail/tiket-darat') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-laut') ? 'active' : '' ?>" href="<?= base_url('admin/detail/tiket-laut') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-udara') ? 'active' : '' ?>" href="<?= base_url('admin/detail/tiket-udara') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Payment
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link dropdown-indicator <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan' || $act == 'kapal' || $act == 'pesawat') ? 'active' : '' ?>" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Pemesanan</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan' || $act == 'kapal' || $act == 'pesawat') ? 'show' : '' ?>" id="forms">
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan') ? 'active' : '' ?>" href="#darat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan') ? 'show' : '' ?>" id="darat">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'bus') ? 'active' : '' ?>" href="<?= base_url('admin/pesanan/bus') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bus</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'kereta') ? 'active' : '' ?>" href="<?= base_url('admin/pesanan/kereta') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kereta</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'angkutan') ? 'active' : '' ?>" href="<?= base_url('admin/pesanan/angkutan') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Angkutan Umum</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'kapal') ? 'active' : '' ?>" href="#laut" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'kapal') ? 'show' : '' ?>" id="laut">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'kapal') ? 'active' : '' ?>" href="<?= base_url('admin/pesanan/kapal') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kapal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator <?= ($act == 'pesawat') ? 'active' : '' ?>" href="#udara" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pesawat') ? 'show' : '' ?>" id="udara">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pesawat') ? 'active' : '' ?>" href="<?= base_url('admin/pesanan/pesawat') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pesawat</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class="nav-link dropdown-indicator <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan' || $act == 'pay-kapal' || $act == 'pay-pesawat') ? 'active' : '' ?>" href="#pay" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pay">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-money-bill-wave"></span></span><span class="nav-link-text ps-1">Transaksi</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan' || $act == 'pay-kapal' || $act == 'pay-pesawat') ? 'show' : '' ?>" id="pay">
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan') ? 'active' : '' ?>" href="#pay-darat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pay">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan') ? 'show' : '' ?>" id="pay-darat">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-bus') ? 'active' : '' ?>" href="<?= base_url('admin/transaksi/bus') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bus</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-kereta') ? 'active' : '' ?>" href="<?= base_url('admin/transaksi/kereta') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kereta</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-angkutan') ? 'active' : '' ?>" href="<?= base_url('admin/transaksi/angkutan') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Angkutan Umum</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'pay-kapal') ? 'active' : '' ?>" href="#pay-laut" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-kapal') ? 'show' : '' ?>" id="pay-laut">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-kapal') ? 'active' : '' ?>" href="<?= base_url('admin/transaksi/kapal') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kapal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator <?= ($act == 'pay-pesawat') ? 'active' : '' ?>" href="#pay-udara" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-pesawat') ? 'show' : '' ?>" id="pay-udara">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-pesawat') ? 'active' : '' ?>" href="<?= base_url('admin/transaksi/pesawat') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pesawat</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Log
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link" href="<?= base_url('logout') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-sign-out-alt"></span></span><span class="nav-link-text ps-1">Sign-Out</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="settings mb-3">
                    <div class="card alert p-0 shadow-none" role="alert">
                        <div class="btn-close-falcon-container">
                            <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                        </div>
                        <div class="card-body text-center"><img src="<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80" />
                            <p class="fs--2 mt-2">Perlu tiket? <br />Silahkan pesan E-tiket <a href="#!">Disini</a></p>
                            <div class="d-grid"><a class="btn btn-sm btn-purchase" href="<?= base_url('admin/detail/tiket-darat') ?>">Pesan Sekarang</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif (session('role') == 2) : ?>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
                <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                    <li class="nav-item mt-2">
                        <a class="nav-link <?= ($act == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('penjual/dashboard') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-home"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Pages
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link dropdown-indicator <?= ($act == 'tiket-darat' || $act == 'tiket-laut' || $act == 'tiket-udara') ? 'active' : '' ?>" href="#e-ticket" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">E-Ticket</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'tiket-darat' || $act == 'tiket-laut' || $act == 'tiket-udara') ? 'show' : '' ?>" id="e-ticket">
                            <li class="nav-item"><a class="nav-link <?= ($act == 'tiket-darat') ? 'active' : '' ?>" href="<?= base_url('penjual/tiket-darat') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'tiket-laut') ? 'active' : '' ?>" href="<?= base_url('penjual/tiket-laut') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'tiket-udara') ? 'active' : '' ?>" href="<?= base_url('penjual/tiket-udara') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                        <a class="nav-link dropdown-indicator <?= ($act == 'detail-tiket-darat' || $act == 'detail-tiket-laut' || $act == 'detail-tiket-udara') ? 'active' : '' ?>" href="#e-ticket-d" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-clipboard-list"></span></span><span class="nav-link-text ps-1">E-Ticket Detail</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'detail-tiket-darat' || $act == 'detail-tiket-laut' || $act == 'detail-tiket-udara' || $act == 'tiket') ? 'show' : '' ?>" id="e-ticket-d">
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-darat') ? 'active' : '' ?>" href="<?= base_url('penjual/detail/tiket-darat') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-laut') ? 'active' : '' ?>" href="<?= base_url('penjual/detail/tiket-laut') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-udara') ? 'active' : '' ?>" href="<?= base_url('penjual/detail/tiket-udara') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Payment
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link dropdown-indicator <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan' || $act == 'kapal' || $act == 'pesawat') ? 'active' : '' ?>" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Pemesanan</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan' || $act == 'kapal' || $act == 'pesawat') ? 'show' : '' ?>" id="forms">
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan') ? 'active' : '' ?>" href="#darat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan') ? 'show' : '' ?>" id="darat">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'bus') ? 'active' : '' ?>" href="<?= base_url('penjual/pesanan/bus') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bus</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'kereta') ? 'active' : '' ?>" href="<?= base_url('penjual/pesanan/kereta') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kereta</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'angkutan') ? 'active' : '' ?>" href="<?= base_url('penjual/pesanan/angkutan') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Angkutan Umum</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'kapal') ? 'active' : '' ?>" href="#laut" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'kapal') ? 'show' : '' ?>" id="laut">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'kapal') ? 'active' : '' ?>" href="<?= base_url('penjual/pesanan/kapal') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kapal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator <?= ($act == 'pesawat') ? 'active' : '' ?>" href="#udara" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pesawat') ? 'show' : '' ?>" id="udara">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pesawat') ? 'active' : '' ?>" href="<?= base_url('penjual/pesanan/pesawat') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pesawat</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class="nav-link dropdown-indicator <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan' || $act == 'pay-kapal' || $act == 'pay-pesawat') ? 'active' : '' ?>" href="#pay" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pay">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-money-bill-wave"></span></span><span class="nav-link-text ps-1">Transaksi</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan' || $act == 'pay-kapal' || $act == 'pay-pesawat') ? 'show' : '' ?>" id="pay">
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan') ? 'active' : '' ?>" href="#pay-darat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pay">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan') ? 'show' : '' ?>" id="pay-darat">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-bus') ? 'active' : '' ?>" href="<?= base_url('penjual/transaksi/bus') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bus</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-kereta') ? 'active' : '' ?>" href="<?= base_url('penjual/transaksi/kereta') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kereta</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-angkutan') ? 'active' : '' ?>" href="<?= base_url('penjual/transaksi/angkutan') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Angkutan Umum</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'pay-kapal') ? 'active' : '' ?>" href="#pay-laut" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-kapal') ? 'show' : '' ?>" id="pay-laut">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-kapal') ? 'active' : '' ?>" href="<?= base_url('penjual/transaksi/kapal') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kapal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator <?= ($act == 'pay-pesawat') ? 'active' : '' ?>" href="#pay-udara" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-pesawat') ? 'show' : '' ?>" id="pay-udara">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-pesawat') ? 'active' : '' ?>" href="<?= base_url('penjual/transaksi/pesawat') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pesawat</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Log
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link" href="<?= base_url('logout') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-sign-out-alt"></span></span><span class="nav-link-text ps-1">Sign-Out</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="settings mb-3">
                    <div class="card alert p-0 shadow-none" role="alert">
                        <div class="btn-close-falcon-container">
                            <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                        </div>
                        <div class="card-body text-center"><img src="<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80" />
                            <p class="fs--2 mt-2">Perlu tiket? <br />Silahkan pesan E-tiket <a href="#!">Disini</a></p>
                            <div class="d-grid"><a class="btn btn-sm btn-purchase" href="<?= base_url('penjual/detail/tiket-darat') ?>">Pesan Sekarang</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
                <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                    <li class="nav-item mt-2">
                        <a class="nav-link <?= ($act == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('penjual/dashboard') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-home"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">M-Tick
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link dropdown-indicator <?= ($act == 'detail-tiket-darat' || $act == 'detail-tiket-laut' || $act == 'detail-tiket-udara') ? 'active' : '' ?>" href="#e-ticket-d" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-clipboard-list"></span></span><span class="nav-link-text ps-1">Pesan Ticket</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'detail-tiket-darat' || $act == 'detail-tiket-laut' || $act == 'detail-tiket-udara' || $act == 'tiket') ? 'show' : '' ?>" id="e-ticket-d">
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-darat') ? 'active' : '' ?>" href="<?= base_url('pembeli/detail/tiket-darat') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-laut') ? 'active' : '' ?>" href="<?= base_url('pembeli/detail/tiket-laut') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link <?= ($act == 'detail-tiket-udara') ? 'active' : '' ?>" href="<?= base_url('pembeli/detail/tiket-udara') ?>" aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Payment
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link dropdown-indicator <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan' || $act == 'kapal' || $act == 'pesawat') ? 'active' : '' ?>" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Hystori Pemesanan</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan' || $act == 'kapal' || $act == 'pesawat') ? 'show' : '' ?>" id="forms">
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan') ? 'active' : '' ?>" href="#darat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'bus' || $act == 'kereta' || $act == 'angkutan') ? 'show' : '' ?>" id="darat">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'bus') ? 'active' : '' ?>" href="<?= base_url('pembeli/pesanan/bus') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bus</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'kereta') ? 'active' : '' ?>" href="<?= base_url('pembeli/pesanan/kereta') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kereta</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'angkutan') ? 'active' : '' ?>" href="<?= base_url('pembeli/pesanan/angkutan') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Angkutan Umum</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'kapal') ? 'active' : '' ?>" href="#laut" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'kapal') ? 'show' : '' ?>" id="laut">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'kapal') ? 'active' : '' ?>" href="<?= base_url('pembeli/pesanan/kapal') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kapal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator <?= ($act == 'pesawat') ? 'active' : '' ?>" href="#udara" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pesawat') ? 'show' : '' ?>" id="udara">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pesawat') ? 'active' : '' ?>" href="<?= base_url('pembeli/pesanan/pesawat') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pesawat</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class="nav-link dropdown-indicator <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan' || $act == 'pay-kapal' || $act == 'pay-pesawat') ? 'active' : '' ?>" href="#pay" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pay">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-money-bill-wave"></span></span><span class="nav-link-text ps-1">Hystori Transaksi</span>
                            </div>
                        </a>
                        <ul class="nav collapse <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan' || $act == 'pay-kapal' || $act == 'pay-pesawat') ? 'show' : '' ?>" id="pay">
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan') ? 'active' : '' ?>" href="#pay-darat" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pay">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Darat</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-bus' || $act == 'pay-kereta' || $act == 'pay-angkutan') ? 'show' : '' ?>" id="pay-darat">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-bus') ? 'active' : '' ?>" href="<?= base_url('pembeli/transaksi/bus') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bus</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-kereta') ? 'active' : '' ?>" href="<?= base_url('pembeli/transaksi/kereta') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kereta</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-angkutan') ? 'active' : '' ?>" href="<?= base_url('pembeli/transaksi/angkutan') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Angkutan Umum</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator <?= ($act == 'pay-kapal') ? 'active' : '' ?>" href="#pay-laut" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Laut</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-kapal') ? 'show' : '' ?>" id="pay-laut">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-kapal') ? 'active' : '' ?>" href="<?= base_url('pembeli/transaksi/kapal') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Kapal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator <?= ($act == 'pay-pesawat') ? 'active' : '' ?>" href="#pay-udara" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transportasi Udara</span>
                                    </div>
                                </a>
                                <!-- more inner pages-->
                                <ul class="nav collapse <?= ($act == 'pay-pesawat') ? 'show' : '' ?>" id="pay-udara">
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($act == 'pay-pesawat') ? 'active' : '' ?>" href="<?= base_url('pembeli/transaksi/pesawat') ?>" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Pesawat</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Log
                            </div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link" href="<?= base_url('logout') ?>" role="button" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-sign-out-alt"></span></span><span class="nav-link-text ps-1">Sign-Out</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="settings mb-3">
                    <div class="card alert p-0 shadow-none" role="alert">
                        <div class="btn-close-falcon-container">
                            <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                        </div>
                        <div class="card-body text-center"><img src="<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80" />
                            <p class="fs--2 mt-2">Perlu tiket? <br />Silahkan pesan E-tiket <a href="#!">Disini</a></p>
                            <div class="d-grid"><a class="btn btn-sm btn-purchase" href="<?= base_url('pembeli/detail/tiket-darat') ?>">Pesan Sekarang</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</nav>