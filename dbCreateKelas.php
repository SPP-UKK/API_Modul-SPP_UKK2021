<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $response = array();
  //mendapatkan data
  $angkatan = $_POST['angkatan'];
  $nama_kelas = $_POST['nama_kelas'];
  $jurusan = $_POST['jurusan'];

  $sql = "SELECT * FROM kelas WHERE angkatan ='$angkatan' AND nama_kelas ='$nama_kelas' AND jurusan ='$jurusan'";
  $check = mysqli_fetch_array(mysqli_query($con, $sql));
  if (isset($check)) {
    $response["value"] = 0;
    $response["message"] = "Data sudah terdaftar, silahkan coba lagi...";
    echo json_encode($response);
  } else {
    $sql = "INSERT INTO kelas (angkatan,nama_kelas,jurusan) VALUES('$angkatan','$nama_kelas','$jurusan')";
    if (mysqli_query($con, $sql)) {
      $response["value"] = 1;
      $response["message"] = "Sukses mendaftar";
      echo json_encode($response);
    } else {
      $response["value"] = 0;
      $response["message"] = "oops! Coba lagi!";
      echo json_encode($response);
    }
  }
  // tutup database
  mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Coba lagi!";
  echo json_encode($response);
 }
