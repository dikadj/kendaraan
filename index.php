<?php
require "functions.php";

// Queries
$data_kendaraan = query("SELECT * FROM kendaraan ORDER BY id ASC");

// Check whether search button has been submitted or not
if (isset($_POST["cari"])) {
  $data_kendaraan = search($_POST);
  // var_dump(search($_POST));
}
?>

<!-- HEADER -->
<?php require "components/header.php" ?>
<!-- HEADER -->

  <!-- Start of content here -->

  <main class="m-3">
    <div class="">
      
      <!-- Search bar -->
      <form action="" method="post" class="m-2" id="search_bar">
        <div class="row">
          <div class="col-12" style="background: lavenderblush; border: 1px solid red">
            <div class="row">
              <div class="col-12 col-lg-4 m-3 text-danger">
                <div class="form-group">
                  <label for="cari_nopol" class="text-dark">No. Registrasi</label>
                  <input class="form-control" type="text" placeholder="Mis. B-1234-XYZ" id="cari_nopol" name="cari_nopol" autofocus value="<?= isset($_POST['cari_nopol']) ? $_POST['cari_nopol'] : '' ?>">
                </div>
                <div class="form-group">
                  <label for="cari_nama_pemilik" class="text-dark">Nama Pemilik</label>
                  <input class="form-control" type="text" placeholder="Mis. Budi Susanto" id="cari_nama_pemilik" name="cari_nama_pemilik" value="<?= isset($_POST['cari_nama_pemilik']) ? $_POST['cari_nama_pemilik'] : '' ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end row my-3">
          <button class="btn btn-primary px-5 py-2 rounded mx-1" type="submit" name="cari">Search</button>
          <a class="btn btn-primary px-5 py-2 rounded" href="add.php">Add</a>
        </div>
      </form>
  
      <table class="table table-bordered">
        <tr class="" style="background: lightblue;">
          <th>No.</th>
          <th>No. Registrasi</th>
          <th>Nama Pemilik</th>
          <th>Merk Kendaraan</th>
          <th>Tahun Pembuatan</th>
          <th>Kapasitas</th>
          <th>Warna</th>
          <th>Bahan Bakar</th>
          <th>Action</th>
        </tr>
  
        <?php
        $i = 1;
        foreach ($data_kendaraan as $res) : 
        ?>
  
        <?php $nopol = $res['nomor_registrasi_kendaraan'] ?>
        
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $res["nomor_registrasi_kendaraan"] ?></td>
          <td><?= $res["nama_pemilik"] ?></td>
          <td><?= $res["merk_kendaraan"] ?></td>
          <td><?= $res["tahun_pembuatan"] ?></td>
          <td><?= $res["kapasitas_silinder"] ?> cc</td>
          <td><?= $res["warna_kendaraan"] ?></td>
          <td><?= $res["bahan_bakar"] ?></td>
          <td><a href="detail.php?nopol=<?= $res['nomor_registrasi_kendaraan'] ?>" class="text-warning font-weight-bold">Detail</a> <a href="edit.php?nopol=<?= $res['nomor_registrasi_kendaraan'] ?>" class="text-primary font-weight-bold">Edit</a> <a href="delete.php?nopol=<?= $res['nomor_registrasi_kendaraan'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $nopol ?>?')" class="text-danger font-weight-bold">Delete</a></td>
        </tr>
        
        <?php endforeach;
        
        // Close connection
        mysqli_close($conn);
        ?>      
      </table>

    </div>  

  </main>

  <script>
    $("#search_bar").validate();
  </script>

  <!-- End of content here -->

  <!-- FOOTER -->
  <?php require "components/footer.php" ?>
  <!-- FOOTER -->