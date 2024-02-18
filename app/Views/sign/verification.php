<?= $this->extend('layouts/authenticated/master-front-end') ?>
<?= $this->section('content') ?>

<div class="row flex-center min-vh-100 py-6 text-center">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href="../../../index.html"><img class="me-2" src="../../../assets/img/icons/spot-illustrations/falcon.png" alt="" width="58" /><span class="font-sans-serif fw-bolder fs-5 d-inline-block">falcon</span></a>
        <div class="card">
            <div class="card-body p-4 p-sm-5">
                <h5 class="mb-0">Verifikasi OTP Email</h5><small>Silahkan cek email anda dan masukkan kode OTP kehalaman ini.</small>
                <form id="twoStepsForm" class="mt-4" action="<?= base_url('verifikasi-otp') ?>" method="POST">
                    <?= csrf_field() ?>
                    <?= $this->include('notification/alerts') ?>
                    <input class="form-control" type="text" id="otp" placeholder="Kode OTP" name="otp" />
                    <small class="formtext text-muted" id="countdown-message"> Kode OTP akan expired dalam waktu <span id="countdown"></span> menit</small>
                    <div class="mb-3"></div>
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripting') ?>
<script>
    function startCountdown(duration, display, messageDisplay) {
        var startTime = new Date().getTime();
        localStorage.setItem('countdown_start', startTime);

        function updateCountdown() {
            var currentTime = new Date().getTime();
            var elapsedTime = currentTime - startTime;
            var remainingTime = duration - Math.floor(elapsedTime / 1000);

            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                localStorage.removeItem('countdown_start');
                display.textContent = "00:00";
                messageDisplay.textContent = "Kode OTP sudah melebihi batas waktu (EXPIRED)";
            } else {
                var minutes = parseInt(remainingTime / 60, 10);
                var seconds = remainingTime % 60;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;
            }
        }

        updateCountdown();
        var countdownInterval = setInterval(updateCountdown, 1000);
    }

    window.onload = function() {
        var fiveMinutes = 5 * 60,
            display = document.querySelector('#countdown'),
            messageDisplay = document.querySelector('#countdown-message');

        var storedStartTime = localStorage.getItem('countdown_start');
        if (storedStartTime) {
            var currentTime = new Date().getTime();
            var elapsedTime = currentTime - storedStartTime;
            var remainingTime = fiveMinutes - Math.floor(elapsedTime / 1000);

            if (remainingTime > 0) {
                startCountdown(remainingTime, display, messageDisplay);
            } else {
                localStorage.removeItem('countdown_start');
                display.textContent = "00:00";
                messageDisplay.textContent = "Kode OTP sudah melebihi batas waktu (Expired)";
            }
        } else {
            startCountdown(fiveMinutes, display, messageDisplay);
        }
    };
</script>
<?= $this->endSection() ?>