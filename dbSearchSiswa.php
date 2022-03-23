<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $search = $_POST['search'];

  $sql = "SELECT * FROM siswa s INNER JOIN kelas k ON s.id_kelas = k.id_kelas WHERE s.nama LIKE '%$search%' ORDER BY nama ASC";
  $result = array();
  $res = mysqli_query($con, $sql);
  $res2 = mysqli_query($con, $sql);
  $check = mysqli_fetch_array($res2);

  if (isset($check)) {
    while ($row = mysqli_fetch_array($res)) {
      array_push($result, array('nisn' => $row[0], 'nis' => $row[1], 'nama' => $row[2], 'id_kelas' => $row[3], 'alamat' => $row[4], 'no_telp' => $row[5], 'nama_kelas' => $row[8], 'jurusan' => $row[9], 'angkatan' => $row[10]));
    }
    echo json_encode(array("value" => 1, "result" => $result));
  } else {
    $result["value"] = 0;
    $result["message"] = "Data Kosong...";
    echo json_encode($result);
  }

  mysqli_close($con);
}
