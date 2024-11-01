<div class="container p-2">
    <?php
    switch ($page) {
        case "peserta":
            include "./apps/peserta/list.php";
            break;
        case "peserta-create":
            include "./apps/peserta/create.php";
            break;
        case "peserta-update":
            include "./apps/peserta/update.php";
            break;
        case "peserta-delete":
            include "./apps/peserta/list.php";
            break;
        case "skema":
            include "./apps/skema/list.php";
            break;
        case "skema-create":
            include "./apps/skema/create.php";
            break;
        case "skema-update":
            include "./apps/skema/update.php";
            break;
        case "skema-delete":
            include "./apps/skema/delete.php";
            break;
        default:
            echo "Halaman Tidak Ditemukan";
            break;
    }
    ?>
</div>