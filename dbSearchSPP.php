<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $search = $_POST['search'];

  $sql = "SELECT * FROM spp WHERE tahun LIKE '%$search%' ORDER BY angkatan ASC";
  $result = array();
  $res = mysqli_query($con, $sql);
  $res2 = mysqli_query($con, $sql);
  $check = mysqli_fetch_array($res2);

  if (isset($check)) {
    while ($row = mysqli_fetch_array($res)) {
      array_push($result, array('id_spp' => $row[0], 'angkatan' => $row[1], 'tahun' => $row[2], 'nominal' => $row[3]));
    }
    echo json_encode(array("value" => 1, "result" => $result));
  } else {
    $result["value"] = 0;
    $result["message"] = "Data Kosong...";
    echo json_encode($result);
  }

  mysqli_close($con);
}
