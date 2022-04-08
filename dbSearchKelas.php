<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $search = $_POST['search'];

  $sql = "SELECT * FROM kelas WHERE nama_kelas LIKE '%$search%' ORDER BY jurusan ASC, angkatan DESC";
  $result = array();
  $res = mysqli_query($con, $sql);
  $res2 = mysqli_query($con, $sql);
  $check = mysqli_fetch_array($res2);

  if (isset($check)) {
    while ($row = mysqli_fetch_array($res)) {
      array_push($result, array('id_kelas'=>$row[0], 'nama_kelas'=>$row[1], 'jurusan'=>$row[2], 'angkatan'=>$row[3]));
    }
    echo json_encode(array("value" => 1, "result" => $result));
  } else {
    $result["value"] = 0;
    $result["message"] = "Data Kosong...";
    echo json_encode($result);
  }

  mysqli_close($con);
}
