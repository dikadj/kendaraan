<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = mysqli_connect("localhost", "root", "", "kendaraan");
// $conn = mysqli_connect("localhost", "id20066206_admin", "Qwertyuiop12345!", "id20066206_kendaraan");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    if ($result) {
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }

    return $rows;
}

// Add record
function add($data) {
    global $conn;

    $nomor_registrasi_kendaraan = htmlspecialchars($data["nomor_registrasi_kendaraan"]);
    $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
    $merk_kendaraan = htmlspecialchars($data["merk_kendaraan"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tahun_pembuatan = htmlspecialchars($data["tahun_pembuatan"]);
    $kapasitas_silinder = htmlspecialchars($data["kapasitas_silinder"]);
    $warna_kendaraan = htmlspecialchars($data["warna_kendaraan"]);
    $bahan_bakar = htmlspecialchars($data["bahan_bakar"]);

    // Update database
    $query = "INSERT INTO kendaraan (
        nomor_registrasi_kendaraan,
        nama_pemilik,
        merk_kendaraan,
        alamat,
        tahun_pembuatan,
        kapasitas_silinder,
        warna_kendaraan,
        bahan_bakar
    ) VALUES (
        '$nomor_registrasi_kendaraan',
        '$nama_pemilik',
        '$merk_kendaraan',
        '$alamat',
        '$tahun_pembuatan',
        '$kapasitas_silinder',
        '$warna_kendaraan',
        '$bahan_bakar'
    )";
    mysqli_query($conn, $query);

    // return status (1 = success, 0 = no changes, -1 = failed)
    return mysqli_affected_rows($conn);
}

// Delete record
function delete($nopol) {
    global $conn;
    mysqli_query($conn, "DELETE FROM kendaraan WHERE nomor_registrasi_kendaraan = '$nopol'");
    return mysqli_affected_rows($conn);
}

// Edit record
function edit($data) {
    global $conn;
    global $nopol;

    $nomor_registrasi_kendaraan = htmlspecialchars($data["nomor_registrasi_kendaraan"]);
    $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
    $merk_kendaraan = htmlspecialchars($data["merk_kendaraan"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tahun_pembuatan = htmlspecialchars($data["tahun_pembuatan"]);
    $kapasitas_silinder = htmlspecialchars($data["kapasitas_silinder"]);
    $warna_kendaraan = htmlspecialchars($data["warna_kendaraan"]);
    $bahan_bakar = htmlspecialchars($data["bahan_bakar"]);

    // Update database
    $query = "UPDATE kendaraan SET 
        nomor_registrasi_kendaraan = '$nomor_registrasi_kendaraan',
        nama_pemilik = '$nama_pemilik',
        merk_kendaraan = '$merk_kendaraan',
        alamat = '$alamat',
        tahun_pembuatan = '$tahun_pembuatan',
        kapasitas_silinder = '$kapasitas_silinder',
        warna_kendaraan = '$warna_kendaraan',
        bahan_bakar = '$bahan_bakar'
    WHERE nomor_registrasi_kendaraan = '$nopol'
    ";
    mysqli_query($conn, $query);

    // return status (1 = success, 0 = no changes, -1 = failed)
    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $nopol = $keyword["cari_nopol"];
    $nama = $keyword["cari_nama_pemilik"];
    $query = "SELECT * FROM kendaraan WHERE nomor_registrasi_kendaraan LIKE '%$nopol%' AND nama_pemilik LIKE '%$nama%' ORDER BY id ASC";
    // $query = "SELECT * FROM kendaraan WHERE nomor_registrasi_kendaraan = '$nopol' AND nama_pemilik = '$nama' ORDER BY id ASC";

    return query($query);
}

?>