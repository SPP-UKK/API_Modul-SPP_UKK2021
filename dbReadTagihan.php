<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $nisn = $_POST['nisn'];

  $sql = "SELECT p.id_pembayaran, pe.nama_petugas, s.nisn, s.nama, k.nama_kelas, p.tgl_bayar, sp.nominal,
  p.bulan_spp, p.tahun_spp, p.status_bayar, p.jumlah_bayar, p.kurang_bayar
  FROM pembayaran p 
  INNER JOIN siswa s ON p.nisn = s.nisn AND p.nisn = '$nisn'
  INNER JOIN kelas k ON s.id_kelas = k.id_kelas 
  INNER JOIN spp sp ON p.id_spp = sp.id_spp 
  INNER JOIN petugas pe ON p.id_petugas = pe.id_petugas WHERE p.status_bayar LIKE '%belum%'
  ORDER BY p.id_pembayaran ASC";

  $result = array();
  $res = mysqli_query($con, $sql);
  $res2 = mysqli_query($con, $sql);
  $check = mysqli_fetch_array($res2);

  if (isset($check)) {
    while ($row = mysqli_fetch_array($res)) {
      array_push($result, array('id_pembayaran' => $row[0], 'nama_petugas' => $row[1], 'nisn' => $row[2], 'nama' => $row[3], 'nama_kelas' => $row[4], 'tgl_bayar' => $row[5], 'nominal' => $row[6], 'bulan_bayar' => $row[7], 'tahun_bayar' => $row[8], 'status_bayar' => $row[9], 'jumlah_bayar' => $row[10], 'kurang_bayar' => $row[11]));
    }
    echo json_encode(array("value" => 1, "result" => $result));
  } else {
    $result["value"] = 0;
    $result["message"] = "Data Kosong...";
    echo json_encode($result);
  }

  mysqli_close($con);
}
