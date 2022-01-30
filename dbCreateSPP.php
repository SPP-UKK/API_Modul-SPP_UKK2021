<?php

if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $angkatan = $_POST['angkatan'];
   $tahun = $_POST['tahun'];
   $nominal = $_POST['nominal'];

   require_once('dbConnect.php');
     $sql = "INSERT INTO spp (angkatan,tahun,nominal) VALUES('$angkatan','$tahun','$nominal')";
     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Sukses mendaftar";
       echo json_encode($response);
     } else {
       $response["value"] = 0;
       $response["message"] = "oops! Coba lagi!";
       echo json_encode($response);
     }
   // tutup database
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Coba lagi!";
  echo json_encode($response);
}