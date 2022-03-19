<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $response = array();
  //mendapatkan data
  $nisn = $_POST['nisn'];

  $sql = "DELETE FROM siswa WHERE nisn = '$nisn'";
  if (mysqli_query($con, $sql)) {
    $response["value"] = 1;
    $response["message"] = "Sukses menghapus";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi!";
    echo json_encode($response);
  }
  // tutup database
  mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Coba lagi!";
  echo json_encode($response);
}
