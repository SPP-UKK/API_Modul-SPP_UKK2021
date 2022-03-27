<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Data Siswa
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $password = $_POST['password'];
  $id_petugas = $_POST['id_petugas'];
  $id_kelas = $_POST['id_kelas'];
  $id_spp = $_POST['id_spp'];

  //Data Pembayaran
  $bulan = 7;
  $tahun = 2021;

  //Checker
  $sql_a = "SELECT nisn FROM siswa WHERE nisn ='$nisn'";
  $sql_b = "SELECT password FROM siswa WHERE password =MD5('$password')";
  $sql_c = "SELECT nis FROM siswa WHERE nis ='$nis'";
  $sql_d = "SELECT nama FROM siswa WHERE nama ='$nama'";
  $sql_e = "SELECT no_telp FROM siswa WHERE no_telp ='$no_telp'";
  $response = array();
  $check_nisn = mysqli_fetch_array(mysqli_query($con, $sql_a));
  $check_pass = mysqli_fetch_array(mysqli_query($con, $sql_b));
  $check_nis = mysqli_fetch_array(mysqli_query($con, $sql_c));
  $check_nama = mysqli_fetch_array(mysqli_query($con, $sql_d));
  $check_no_telp = mysqli_fetch_array(mysqli_query($con, $sql_e));

  if (isset($check_nisn)) {
    $response["value"] = 0;
    $response["message"] = "NISN sudah terdaftar!";
    echo json_encode($response);

  } else if (isset($check_pass)) {
    $response["value"] = 0;
    $response["message"] = "Gunakan Password lain";
    echo json_encode($response);

  } else if (isset($check_nis)) {
    $response["value"] = 0;
    $response["message"] = "NIS sudah terdaftar!";
    echo json_encode($response);

  } else if (isset($check_nama)) {
    $response["value"] = 0;
    $response["message"] = "Nama sudah terdaftar!";
    echo json_encode($response);

  } else if (isset($check_no_telp)) {
    $response["value"] = 0;
    $response["message"] = "Nomor Ponsel sudah terdaftar!";
    echo json_encode($response);
  } else {
    $sql_c = "INSERT INTO siswa (nisn,nis,nama,id_kelas,alamat,no_telp,password) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp',MD5('$password'))";
    if (mysqli_query($con, $sql_c)) {
      $response["value"] = 1;
      $response["message"] = "Sukses mendaftar Siswa";
      echo json_encode($response);

      for ($b = 0; $b < 12; $b++) {
        $sql_d = "INSERT INTO pembayaran (id_petugas,id_spp,nisn,tgl_bayar,bulan_spp,tahun_spp,status_bayar) VALUES('$id_petugas','$id_spp','$nisn',NULL,'$bulan','$tahun','Belum')";
        if (mysqli_query($con, $sql_d)) {
          $bulan++;
        } else {
          $response["value"] = 0;
          $response["message"] = "Gagal mendaftar Pembayaran";
          echo json_encode($response);
        }

        if ($bulan > 12) {
          $bulan = 1;
          $tahun++;
        }
      }
    } else {
      $response["value"] = 0;
      $response["message"] = "Gagal mendaftar Siswa";
      echo json_encode($response);
    }
  }
  mysqli_close($con);
}
