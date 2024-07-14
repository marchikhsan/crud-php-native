<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "home";
}
$nav = explode('-', $page);
$nav =  $nav[0];
$nav_items = [
    'home' => 'Home',
    'peserta' => 'Peserta',
    'skema' => 'Skema Sertifikasi'
];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
    <div class="container container-fluid ">
        <a class="navbar-brand" href="#">SERTIFIKASI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php foreach ($nav_items as $menu => $label) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $nav == $menu ? 'active' : ''; ?>" aria-current="page" href="<?= base_url($menu) ?>"><?= $label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>