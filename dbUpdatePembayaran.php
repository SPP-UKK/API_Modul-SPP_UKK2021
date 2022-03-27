<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Data Pembayaran
    $id_pembayaran = $_POST['id_pembayaran'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $id_petugas = $_POST['id_petugas'];

    $response = array();
    $sql_a = "SELECT p.id_pembayaran, p.kurang_bayar, p.jumlah_bayar, s.nominal FROM pembayaran p INNER JOIN spp s ON s.id_spp = p.id_spp WHERE id_pembayaran ='$id_pembayaran'";
    $check = mysqli_fetch_array(mysqli_query($con, $sql_a));
    $nominal = $check['nominal'];
    $kurang_bayar = $check['kurang_bayar'];

    if ($jumlah_bayar == $nominal) {
        $sql_b = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = '$nominal', id_petugas = '$id_petugas', status_bayar = 'Lunas', kurang_bayar = 0 WHERE id_pembayaran = '$id_pembayaran'";
        if (mysqli_query($con, $sql_b)) {
            $response["value"] = 1;
            $response["message"] = "SPP Lunas!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update, silahkan coba lagi...";
            echo json_encode($response);
        }
    } else if ($jumlah_bayar > 0 && $jumlah_bayar < $nominal && $kurang_bayar == 0) {
        $sql_c = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = '$jumlah_bayar', id_petugas = '$id_petugas', status_bayar = 'Belum', kurang_bayar = $nominal-$jumlah_bayar WHERE id_pembayaran = '$id_pembayaran'";
        if (mysqli_query($con, $sql_c)) {
            $response["value"] = 1;
            $response["message"] = "SPP masih kurang!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update, silahkan coba lagi...";
            echo json_encode($response);
        }
    } else if ($jumlah_bayar > 0 && $jumlah_bayar < $nominal && $kurang_bayar > 0) {
        $sql_d = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = jumlah_bayar+'$jumlah_bayar', id_petugas = '$id_petugas', status_bayar = 'Belum', kurang_bayar = kurang_bayar-$jumlah_bayar WHERE id_pembayaran = '$id_pembayaran'";
        mysqli_query($con, $sql_d);
        $kurangnya = $check['kurang_bayar'];

        if ($kurangnya == 0) {
            $sql_f = "UPDATE pembayaran SET tgl_bayar = now(), jumlah_bayar = '$nominal', id_petugas = '$id_petugas', status_bayar = 'Lunas' WHERE id_pembayaran = '$id_pembayaran'";
            if (mysqli_query($con, $sql_f)) {
                $response["value"] = 1;
                $response["message"] = "SPP Lunas!";
                echo json_encode($response);
            } else {
                $response["value"] = 0;
                $response["message"] = "Gagal update, silahkan coba lagi...";
                echo json_encode($response);
            }
        } else if ($kurangnya > 0) {
            $response["value"] = 1;
            $response["message"] = "SPP masih kurang!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal update, silahkan coba lagi...";
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
