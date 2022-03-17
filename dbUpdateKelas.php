<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Data Pembayaran
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $response = array();
    $sql_a = "SELECT * FROM kelas WHERE id_kelas ='$id_kelas'";
    $check = mysqli_fetch_array(mysqli_query($con, $sql_a));

    if (isset($check)) {
        $sql_b = "UPDATE kelas SET angkatan = '$angkatan', nama_kelas = '$nama_kelas', jurusan = '$jurusan' WHERE id_kelas ='$id_kelas'";
        if (mysqli_query($con, $sql_b)) {
            $response["value"] = 1;
            $response["message"] = "Sukses update data!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update data!";
            echo json_encode($response);
        }
    } else {
        $response["value"] = 0;
        $response["message"] = "Gagal update data!";
        echo json_encode($response);
    }

    mysqli_close($con);
}
