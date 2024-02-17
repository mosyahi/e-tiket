<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <?= $this->include('layouts/head-front-end') ?>
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid" data-layout="container-fluid">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container-fluid');
                    container.classList.add('container');
                }
            </script>
            <?= $this->include('layouts/sidebar-front-end') ?>
            <div class="content">
                <?= $this->include('layouts/topbar-front-end') ?>
                <?= $this->renderSection('content') ?>
                <footer class="footer">
                    <?= $this->include('layouts/footer-front-end') ?>
                </footer>
            </div>
            <?= $this->include('layouts/modal-front-end') ?>
        </div>
    </main>
    <?= $this->include('layouts/customize-front-end') ?>
    <?= $this->include('layouts/script-front-end') ?>
    <?= $this->renderSection('scripting') ?>
</body>

</html>