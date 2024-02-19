<?= $this->extend('layouts/authenticated/master-front-end') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape" src="<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
            <div class="card overflow-hidden z-index-1">
                <div class="card-body p-0">
                    <div class="row g-0 h-100">
                        <div class="col-md-5 text-center bg-card-gradient">
                            <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                <div class="bg-holder bg-auth-card-shape" style="background-image:url(<?= base_url() ?>template/plugins/assets/img/icons/spot-illustrations/half-circle.png);">
                                </div>
                                <!--/.bg-holder-->

                                <div class="z-index-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="<?= current_url() ?>">M-Tick</a>
                                    <p class="opacity-75 text-white">Sistem Informasi Marketplace Manajemen Pemesanan E-Ticket Berbasis Website!</p>
                                    <p class="opacity-75 text-white">Pastikan untuk mengisi semua formulir</p>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                <p class="text-white">Anda sudah memiliki akun?<br><a class="text-decoration-underline link-light" href="<?= base_url('/') ?>">Sign-In Disini!</a></p>
                                <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">&copy; <?= date('Y') ?><a class="text-white" href="#!"> M-Tick Indonesia</a></p>
                            </div>
                        </div>
                        <div class="col-md-7 d-flex flex-center">
                            <div class="p-4 p-md-5 flex-grow-1">
                                <?= $this->include('notification/alerts') ?>
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <h3>Register Akun</h3>
                                    </div>
                                </div>
                                <form action="<?= base_url('register') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-name">Name</label>
                                        <input class="form-control" id="basic-form-name" type="text" placeholder="Nama Lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" required />
                                    </div>
                                    <div class="row gx-2">
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="basic-form-email">Email</label>
                                            <input class="form-control" id="basic-form-name" type="email" placeholder="example@gmail.com" name="email" value="<?= old('email') ?>" required />
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="basic-form-password">No Telp</label>
                                            <input class="form-control" id="basic-form-name" type="text" placeholder="089886xxxxx" name="no_telepon" value="<?= old('no_telepon') ?>" required />
                                        </div>
                                    </div>
                                    <div class="row gx-2">
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="basic-form-dob">Tanggal Lahir</label>
                                            <input class="form-control" id="basic-form-dob" type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required />
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="basic-form-gender">Role</label>
                                            <select class="form-select" name="role" id="basic-form-gender" aria-label="Default select example">
                                                <option selected="selected">Pilih Role</option>
                                                <option value="2">Penjual</option>
                                                <option value="3">Pembeli</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-password">No KTP</label>
                                        <input class="form-control" id="basic-form-password" type="text" placeholder="Nomor KTP" name="nomor_ktp" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto KTP</label>
                                        <input class="form-control" type="file" name="foto_ktp" required />
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="card-password">Password</label>
                                        </div>
                                        <input class="form-control" id="card-password" type="password" name="password" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-textarea">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="basic-form-textarea" rows="3" placeholder="alamat Lengkap" reuired></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Submit</button>
                                    </div>
                                </form>
                                <!-- <div class="position-relative mt-4">
                                    <hr class="bg-300" />
                                    <div class="divider-content-center">or log in with</div>
                                </div>
                                <div class="row g-2 mt-2">
                                    <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                                    <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>