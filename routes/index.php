<div class="container p-2">
    <?php
    switch ($page) {
        case "peserta":
            include "./app/peserta/list.php";
            break;
        case "peserta-create":
            include "./app/peserta/create.php";
            break;
        case "peserta-update":
            include "./app/peserta/update.php";
            break;
        case "peserta-delete":
            include "./app/peserta/list.php";
            break;
        case "skema":
            include "./app/skema/list.php";
            break;
        case "skema-create":
            include "./app/skema/create.php";
            break;
        case "skema-update":
            include "./app/skema/update.php";
            break;
        case "skema-delete":
            include "./app/skema/delete.php";
            break;
        default:
            echo "Halaman Tidak Ditemukan";
            break;
    }
    ?>
</div>