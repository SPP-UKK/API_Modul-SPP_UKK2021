<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Data Petugas
  $level = $_POST['level'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_petugas = $_POST['nama_petugas'];

  $response = array();
  $username = "SELECT * FROM petugas WHERE username ='$username'";
  $password = "SELECT * FROM petugas WHERE password ='$password'";
  $checkusername = mysqli_fetch_array(mysqli_query($con, $username));
  $checkpassword = mysqli_fetch_array(mysqli_query($con, $password));

  if (isset($checkusername)) {
    $response["value"] = 0;
    $response["message"] = "Username sudah terdaftar, silahkan coba lagi...";
    echo json_encode($response);
  } else if (isset($checkpassword)) {
    $response["value"] = 0;
    $response["message"] = "Password sudah terdaftar, silahkan coba lagi...";
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
