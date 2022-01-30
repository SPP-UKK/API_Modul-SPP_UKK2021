<?php

if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $username = $_POST['username'];
   $password = $_POST['password'];
   $nama_petugas = $_POST['nama_petugas'];
   $level = $_POST['level'];

   require_once('dbConnect.php');
   $sql = "SELECT * FROM kelas WHERE username ='$username'";
   $check = mysqli_fetch_array(mysqli_query($con,$sql));
   if(isset($check)){
     $response["value"] = 0;
     $response["message"] = "oops! Username sudah terdaftar!";
     echo json_encode($response);
   } else {
     $sql = "INSERT INTO petugas (username,password,nama_petugas,level) VALUES('$username',MD5('$password'),'$nama_petugas','$level')";
     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Sukses mendaftar";
       echo json_encode($response);
     } else {
       $response["value"] = 0;
       $response["message"] = "oops! Coba lagi!";
       echo json_encode($response);
     }
   }
   // tutup database
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Coba lagi!";
  echo json_encode($response);
}