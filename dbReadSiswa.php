<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * 
  FROM siswa s
  INNER JOIN kelas k ON s.id_kelas = k.id_kelas 
  ORDER BY k.nama_kelas ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('nisn'=>$row[0], 'nis'=>$row[1], 'nama'=>$row[2], 'id_kelas'=>$row[3], 'alamat'=>$row[4], 'no_telp'=>$row[5], 'nama_kelas'=>$row[8], 'jurusan'=>$row[9], 'angkatan'=>$row[10]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
} 