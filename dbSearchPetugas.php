<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $search = $_POST['search'];

  $sql = "SELECT * FROM petugas WHERE nama_petugas LIKE '%$search%' ORDER BY level ASC, nama_petugas ASC";
  $result = array();
  $res = mysqli_query($con, $sql);
  $res2 = mysqli_query($con, $sql);
  $check = mysqli_fetch_array($res2);

  if (isset($check)) {
    while ($row = mysqli_fetch_array($res)) {
      array_push($result, array('id_petugas'=>$row[0], 'username'=>$row[1], 'password'=>$row[2], 'nama_petugas'=>$row[3], 'level'=>$row[4]));
    }
    echo json_encode(array("value" => 1, "result" => $result));
  } else {
    $result["value"] = 0;
    $result["message"] = "Data Kosong...";
    echo json_encode($result);
  }

  mysqli_close($con);
}
