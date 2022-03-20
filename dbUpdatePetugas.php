<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Data Pembayaran
    $id_petugas = $_POST['id_petugas'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];

    $response = array();
    $sql_a = "SELECT * FROM petugas WHERE nama_petugas ='$nama_petugas' AND username ='$username' AND password =MD5('$password')";
    $check = mysqli_fetch_array(mysqli_query($con, $sql_a));

    if (isset($check)) {
        $response["value"] = 0;
        $response["message"] = "Data sudah terdaftar, silahkan coba lagi...";
        echo json_encode($response);
    } else {
        $sql_b = "UPDATE petugas SET level = '$level', username = '$username', password = MD5('$password'), nama_petugas = '$nama_petugas' WHERE id_petugas ='$id_petugas'";
        if (mysqli_query($con, $sql_b)) {
            $response["value"] = 1;
            $response["message"] = "Sukses update data!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update data, silahkan coba lagi...";
            echo json_encode($response);
        }
    }

    mysqli_close($con);
}
