<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $response = array();
  //mendapatkan data
  $id_petugas = $_POST['id_petugas'];

  $sql = "DELETE FROM petugas WHERE id_petugas = '$id_petugas'";
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
