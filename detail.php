<?php
require "functions.php";

// GET data from URL
$nopol = $_GET["nopol"];

// Queries
$item = query("SELECT * FROM kendaraan WHERE nomor_registrasi_kendaraan='$nopol'")[0];

// Check whether form submitted or not
if ( isset($_POST["submit"]) ) {

    // Check whether data has been updated or not
    if ( edit($_POST) > 0 ) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            window.location.replace('index.php');
        </script>
        ";
        // header('Location: index.php');
    } else {
        echo "Data gagal diubah!<br>", mysqli_error($conn);
    }
}
?>

<!-- HEADER -->
<?php require "components/header.php" ?>
<!-- HEADER -->

    <!-- Start of content here -->

    <div class="m-3">
        <h3>Detail Data Kendaraan</h3>
    
        <form action="" method="post">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="nomor_registrasi_kendaraan">No. Registrasi Kendaraan</label>
                        <input class="form-control" type="text" name="nomor_registrasi_kendaraan" id="nomor_registrasi_kendaraan" value="<?= $item['nomor_registrasi_kendaraan'] ?>" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input class="form-control" type="text" name="nama_pemilik" id="nama_pemilik" value="<?= $item['nama_pemilik'] ?>" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="merk_kendaraan">Merk Kendaraan</label>
                        <input class="form-control" type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?= $item['merk_kendaraan'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pemilik Kendaraan</label>
                        <textarea class="form-control" name="alamat" id="alamat" disabled><?= $item['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="tahun_pembuatan">Tahun Pembuatan</label>
                        <input class="form-control" type="text" name="tahun_pembuatan" id="tahun_pembuatan" value="<?= $item['tahun_pembuatan'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kapasitas_silinder">Kapasitas Silinder</label>
                        <input class="form-control" type="text" name="kapasitas_silinder" id="kapasitas_silinder" value="<?= $item['kapasitas_silinder'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="warna_kendaraan">Warna Kendaraan</label>
                        <input class="form-control" type="text" name="warna_kendaraan" id="warna_kendaraan" value="<?= $item['warna_kendaraan'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="bahan_bakar">Bahan Bakar</label>
                        <input class="form-control" type="text" name="bahan_bakar" id="bahan_bakar" value="<?= $item['bahan_bakar'] ?>" disabled>
                    </div>
                </div>
            </div>
            <a class="btn btn-secondary px-5 py-2 rounded" href="index.php">Kembali</a>
        </form>
    </div>
    
    <!-- End of content here -->

<!-- FOOTER -->
<?php require "components/footer.php" ?>
<!-- FOOTER -->
