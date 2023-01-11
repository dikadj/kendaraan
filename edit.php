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
        
        <h3>Edit Data Kendaraan</h3>
        
        <form action="" method="post" id="edit_data_kendaraan">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group text-danger">
                        <label for="nomor_registrasi_kendaraan" class="text-dark">No. Registrasi Kendaraan</label>
                        <input class="form-control" type="text" placeholder="Mis. B-1234-XYZ" id="nomor_registrasi_kendaraan" value="<?= $item['nomor_registrasi_kendaraan'] ?>" disabled>
                        <!-- Cannot be edited -->
                        <input type="hidden" name="nomor_registrasi_kendaraan" value="<?= $item['nomor_registrasi_kendaraan'] ?>" pattern="^[A-Z]{1,2}\s{1}\d{0,4}\s{0,1}[A-Z]{0,3}$" required>
                    </div>
                    <div class="form-group text-danger">
                        <label for="nama_pemilik" class="text-dark">Nama Pemilik</label>
                        <input class="form-control" placeholder="Mis. Budi Susanto" type="text" name="nama_pemilik" id="nama_pemilik" value="<?= $item['nama_pemilik'] ?>" required>
                    </div>
                    <div class="form-group text-danger">
                        <label for="merk_kendaraan" class="text-dark">Merk Kendaraan</label>
                        <input class="form-control" placeholder="Mis. Honda Vario" type="text" name="merk_kendaraan" id="merk_kendaraan" value="<?= $item['merk_kendaraan'] ?>" required>
                    </div>
                    <div class="form-group text-danger">
                        <label for="alamat" class="text-dark">Alamat Pemilik Kendaraan</label>
                        <textarea class="form-control" placeholder="Mis. Jalan Kaliurang No. 23F, Kayen, Condongcatur, Depok, Sleman" name="alamat" id="alamat" required><?= $item['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group text-danger">
                        <label for="tahun_pembuatan" class="text-dark">Tahun Pembuatan</label>
                        <input class="form-control year" placeholder="Mis. 2022" min=1800 max=<?= (int)date('Y') ?> type="text" name="tahun_pembuatan" id="tahun_pembuatan" value="<?= $item['tahun_pembuatan'] ?>" required>
                    </div>
                    <div class="form-group text-danger">
                        <label for="kapasitas_silinder" class="text-dark">Kapasitas Silinder</label>
                        <input class="form-control" placeholder="Mis. 125cc ditulis '125' saja" type="text" name="kapasitas_silinder" id="kapasitas_silinder" value="<?= $item['kapasitas_silinder'] ?>" required>
                    </div>
                    <div class="form-group text-danger">
                        <label for="warna_kendaraan" class="text-dark">Warna Kendaraan</label>
                        <select class="form-control" name="warna_kendaraan" id="warna_kendaraan">
                            <option>Pilih warna...</option>
                            <option value="Merah" <?= $item['warna_kendaraan'] === 'Merah' ? 'selected' : '' ?>>Merah</option>
                            <option value="Hitam" <?= $item['warna_kendaraan'] === 'Hitam' ? 'selected' : '' ?>>Hitam</option>
                            <option value="Biru" <?= $item['warna_kendaraan'] === 'Biru' ? 'selected' : '' ?>>Biru</option>
                            <option value="Abu-Abu" <?= $item['warna_kendaraan'] === 'Abu-Abu' ? 'selected' : '' ?>>Abu-Abu</option>
                        </select>
                    </div>
                    <div class="form-group text-danger">
                        <label for="bahan_bakar" class="text-dark">Bahan Bakar</label>
                        <input class="form-control" type="text" name="bahan_bakar" placeholder="Mis. Bensin" id="bahan_bakar" value="<?= $item['bahan_bakar'] ?>" required>
                    </div>
                </div>
                <button class="btn btn-primary px-5 py-2 rounded mx-1" type="submit" name="submit">Ubah</button>
                <a class="btn btn-secondary px-5 py-2 rounded" href="index.php">Kembali</a>
            </div>
        </form>
    </div>

    
    <script>
        $("#edit_data_kendaraan").validate();
        // $(".year").mask("0000")
    </script>

    
    <!-- End of content here -->

<!-- FOOTER -->
<?php require "components/footer.php" ?>
<!-- FOOTER -->
