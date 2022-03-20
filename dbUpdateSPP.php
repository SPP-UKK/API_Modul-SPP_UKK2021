<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Data Pembayaran
    $id_spp = $_POST['id_spp'];
    $nominal = $_POST['nominal'];

    $response = array();
    $sql_a = "SELECT * FROM spp WHERE nominal = '$nominal' AND id_spp ='$id_spp'";
    $check = mysqli_fetch_array(mysqli_query($con, $sql_a));

    if (isset($check)) {
        $response["value"] = 0;
        $response["message"] = "Data sudah terdaftar, silahkan coba lagi...";
        echo json_encode($response);
    } else {
        $sql_b = "UPDATE spp SET nominal = '$nominal' WHERE id_spp ='$id_spp'";
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
