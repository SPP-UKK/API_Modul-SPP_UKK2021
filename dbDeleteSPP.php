<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $response = array();
  //mendapatkan data
  $id_spp = $_POST['id_spp'];

  $sql = "DELETE FROM spp WHERE id_spp = '$id_spp'";
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
