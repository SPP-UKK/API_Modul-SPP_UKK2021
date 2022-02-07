<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $search = $_POST['search'];

  $sql = "SELECT * FROM siswa s INNER JOIN kelas k ON s.id_kelas = k.id_kelas WHERE s.nama LIKE '%$search%' OR k.nama_kelas LIKE '%$search%' ORDER BY nama ASC";
  $result = array();
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($res);

  if (isset($row)) {
    array_push($result, array('nisn' => $row[0], 'nis' => $row[1], 'nama' => $row[2], 'id_kelas' => $row[3], 'alamat' => $row[4], 'no_telp' => $row[5], 'nama_kelas' => $row[7], 'jurusan' => $row[8], 'angkatan' => $row[9]));
    echo json_encode(array("value" => 1, "result" => $result));
  } else {
    $result["value"] = 0;
    $result["message"] = "Data Siswa tidak ditemukan";
    echo json_encode($result);
}

  mysqli_close($con);
}
