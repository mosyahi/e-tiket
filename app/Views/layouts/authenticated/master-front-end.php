<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <?= $this->include('layouts/authenticated/head-front-end') ?>
</head>

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <?= $this->renderSection('content') ?>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <?= $this->include('layouts/authenticated/script-front-end') ?>
    <?= $this->renderSection('scripting') ?>

</body>

</html>