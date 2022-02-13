<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Data Pembayaran
    $id_pembayaran = $_POST['id_pembayaran'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    $response = array();
    $sql_a = "SELECT p.id_pembayaran, p.kurang_bayar, s.nominal FROM pembayaran p INNER JOIN spp s ON s.id_spp = p.id_spp WHERE id_pembayaran ='$id_pembayaran'";
    $check = mysqli_fetch_array(mysqli_query($con, $sql_a));
    $nominal = $check['nominal'];
    $kurang_bayar = $check['kurang_bayar'];

    if ($jumlah_bayar == $nominal) {
        $sql_b = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = '$nominal', status_bayar = 'Lunas' WHERE id_pembayaran = '$id_pembayaran'";
        if (mysqli_query($con, $sql_b)) {
            $response["value"] = 1;
            $response["message"] = "Sukses update data!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update data!";
            echo json_encode($response);
        }
    } else if ($kurang_bayar > 0) {
        $sql_c = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = '$nominal', status_bayar = 'Lunas', kurang_bayar = $jumlah_bayar WHERE id_pembayaran = '$id_pembayaran'";
        if (mysqli_query($con, $sql_c)) {
            $response["value"] = 1;
            $response["message"] = "Sukses update data!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update data!";
            echo json_encode($response);
        }
    } else if ($jumlah_bayar > 0 && $jumlah_bayar < $nominal) {
        $sql_d = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = '$jumlah_bayar', status_bayar = 'Belum', kurang_bayar = $nominal-$jumlah_bayar WHERE id_pembayaran = '$id_pembayaran'";
        if (mysqli_query($con, $sql_d)) {
            $response["value"] = 1;
            $response["message"] = "Sukses update data!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update data!";
            echo json_encode($response);
        }
    } else if ($jumlah_bayar > $nominal) {
        $response["value"] = 0;
        $response["message"] = "Jumlah terlalu banyak!";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "Masukkan jumlah bayar!";
        echo json_encode($response);
    }

    mysqli_close($con);
}
