<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM siswa s INNER JOIN kelas k ON s.id_kelas = k.id_kelas INNER JOIN spp sp ON s.id_spp = sp.id_spp ORDER BY k.nama_kelas ASC";

  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('nisn'=>$row[0], 'nis'=>$row[1], 'nama'=>$row[2], 'id_kelas'=>$row[3], 'id_spp'=>$row[4], 'alamat'=>$row[5], 'no_telp'=>$row[6], 'nama_kelas'=>$row[9], 'jurusan'=>$row[10], 'angkatan'=>$row[13]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
} 