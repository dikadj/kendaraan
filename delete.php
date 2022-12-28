<?php
require "functions.php";

$nopol = $_GET["nopol"];

echo $nopol;

if ( delete($nopol) > 0 ) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php';
        </script>
    ";
    // header('Location: index.php');
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            window.location.href('index.php');
        </script>
    ";
    // header('Location: index.php');
}

?>