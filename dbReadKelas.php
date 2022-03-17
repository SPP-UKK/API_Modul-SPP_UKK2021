<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * 
  FROM kelas k
  ORDER BY k.jurusan ASC, k.angkatan ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_kelas'=>$row[0], 'nama_kelas'=>$row[1], 'jurusan'=>$row[2], 'angkatan'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
} 