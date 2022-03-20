<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

  $angkatan = $_POST['angkatan'];
  $sql = "SELECT * FROM kelas k INNER JOIN spp s ON k.angkatan = s.angkatan AND k.angkatan = '$angkatan' ORDER BY k.nama_kelas ASC";

  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_kelas'=>$row[0], 'nama_kelas'=>$row[1], 'jurusan'=>$row[2], 'angkatan'=>$row[3], 'id_spp'=>$row[4], 'tahun'=>$row[6], 'nominal'=>$row[7]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
} 