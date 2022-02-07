<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Data Petugas
  $level = $_POST['level'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_petugas = $_POST['nama_petugas'];

  $response = array();
  $sql = "SELECT * FROM petugas WHERE username ='$username'";
  $check = mysqli_fetch_array(mysqli_query($con, $sql));
  
  if (isset($check)) {
    $response["value"] = 0;
    $response["message"] = "Username sudah terdaftar!";
    echo json_encode($response);
  } else {
    $sql = "INSERT INTO petugas (username,password,nama_petugas,level) VALUES('$username',MD5('$password'),'$nama_petugas','$level')";
    if (mysqli_query($con, $sql)) {
      $response["value"] = 1;
      $response["message"] = "Sukses mendaftar Petugas";
      echo json_encode($response);
    } else {
      $response["value"] = 0;
      $response["message"] = "Gagal mendaftar Petugas";
      echo json_encode($response);
    }
  }
  mysqli_close($con);
}
