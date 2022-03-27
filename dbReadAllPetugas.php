<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM petugas ORDER BY level ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_petugas'=>$row[0], 'username'=>$row[1], 'password'=>$row[2], 'nama_petugas'=>$row[3], 'level'=>$row[4]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
} 