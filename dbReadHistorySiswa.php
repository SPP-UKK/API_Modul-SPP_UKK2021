<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $sql = "SELECT p.id_pembayaran, pe.nama_petugas, s.nisn, s.nama, k.nama_kelas, p.tgl_bayar, sp.nominal,
  YEAR(p.tgl_bayar) AS tahun_spp, MONTH(p.tgl_bayar) AS bulan_spp
  FROM pembayaran p 
  INNER JOIN siswa s ON p.nisn = s.nisn
  INNER JOIN kelas k ON p.id_kelas = k.id_kelas 
  INNER JOIN spp sp ON p.id_spp = sp.id_spp 
  INNER JOIN petugas pe ON p.id_petugas = pe.id_petugas   
  GROUP BY p.id_pembayaran ORDER BY p.id_pembayaran ASC";

  $res = mysqli_query($con, $sql);
  $result = array();

  while ($row = mysqli_fetch_array($res)) {
    array_push($result, array('id_pembayaran' => $row[0], 'nama_petugas' => $row[1], 'nisn' => $row[2], 'nama' => $row[3], 'nama_kelas' => $row[4], 'tgl_bayar' => $row[5], 'nominal' => $row[6], 'tahun_bayar' => $row[7], 'bulan_bayar' => $row[8]));
  }
  echo json_encode(array("value" => 1, "result" => $result));
  mysqli_close($con);
}
