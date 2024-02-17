<?= $this->extend('layouts/master-front-end') ?>
<?= $this->section('content') ?>

<div class="card mb-3">
    <div class="card-body">
        <div class="row justify-content-between align-items-center">
            <div class="col-md">
                <h5 class="mb-2 mb-md-0">Order Success</h5>
            </div>
            <!-- <div class="col-auto">
                <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span class="fas fa-arrow-down me-1"> </span>Download (.pdf)</button>
                <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span class="fas fa-print me-1"> </span>Print</button>
                <button class="btn btn-falcon-success btn-sm mb-2 mb-sm-0" type="button"><span class="fas fa-dollar-sign me-1"></span>Receive Payment</button>
            </div> -->
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row align-items-center text-center mb-3">
            <div class="col-sm-6 text-sm-start">
                <img src="../../../template/plugins/assets/img/icons/visa.png" alt="invoice" width="150" />
                <img src="../../../template/plugins/assets/img/icons/icon-payment-methods-grid.png" alt="invoice" width="150" />
                <img src="../../../template/plugins/assets/img/icons/icon-paypal-full.png" alt="invoice" width="150" />
            </div>
            <div class="col text-sm-end mt-3 mt-sm-0">
                <h2 class="mb-3"><span class="badge badge rounded-pill badge-soft-success"><i class="fas fa-check me-1"></i>Transaksi Berhasil</span></h2>
                <h5>Penjual akan merespon pesanan anda</h5>
                <p class="fs--1 mb-0">Marketplace E-Ticket Transportasi<br />Kabupaten Cirebon</p>
            </div>
            <div class="col-12">
                <hr />
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h6 class="text-500 mb-4"><span class="badge badge rounded-pill badge-soft-info"><i class="fas fa-check me-1"></i>PAYMENT SUCCESS</span></h6>
                <img src="../../../template/plugins/assets/img/icons/shield.png" alt="invoice" width="150" />
            </div>
        </div>
    </div>
    <div class="card-footer bg-light">
        <p class="fs--1 mb-0"><strong>Notes: </strong>Terima kasih atas kepercayaan anda!</p>
    </div>
</div>

<?= $this->endSection() ?>