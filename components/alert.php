<div class="container p-2">
    <?php
    $flash_data = '';
    $hide = 'd-none';
    if (isset($_SESSION['flash_data'])) {
        $flash_data = $_SESSION['flash_data'];
        unset($_SESSION['flash_data']);
        $hide = '';
    }
    ?>
    <div class="alert alert-info <?= $hide; ?>" role="alert">
        <?= $flash_data; ?>
    </div>
</div>