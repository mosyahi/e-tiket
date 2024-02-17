<?php if (session()->has('success')) : ?>
    <div class="alert alert-success capek" role="alert">
        <i class="me-2 fas fa-check-circle"></i>
        <?= session('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('warning')) : ?>
    <div class="alert alert-warning capek" role="alert">
        <i class="me-2 fas fa-check-circle"></i>
        <?= session('warning') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger capek" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <?= session('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger capek" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <?php foreach (session('errors') as $error) : ?>
            <?= esc($error) ?><br>
        <?php endforeach ?>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alertElements = document.querySelectorAll('.capek');
        alertElements.forEach(function(alertElement) {
            setTimeout(function() {
                alertElement.style.display = 'none';
            }, 3500);
        });
    });
</script>