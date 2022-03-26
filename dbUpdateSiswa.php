<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Data Siswa
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];
    $id_petugas = $_POST['id_petugas'];
    $id_kelas = $_POST['id_kelas'];
    $id_spp = $_POST['id_spp'];

    $response = array();
    $sql_a = "SELECT * FROM siswa WHERE password = MD5('$password')";
    $check = mysqli_fetch_array(mysqli_query($con, $sql_a));

    if (isset($check)) {
        $response["value"] = 0;
        $response["message"] = "Password sudah terdaftar, silahkan coba lagi...";
        echo json_encode($response);
    } else {
        $sql_b = "UPDATE siswa SET nama = '$nama', alamat = '$alamat', password = MD5('$password'), no_telp = '$no_telp', id_kelas = '$id_kelas' WHERE nisn ='$nisn'";
        if (mysqli_query($con, $sql_b)) {
            $response["value"] = 1;
            $response["message"] = "Sukses mengganti Siswa";
            echo json_encode($response);

            $sql_c = "UPDATE pembayaran SET id_spp = '$id_spp', id_petugas = '$id_petugas' WHERE nisn ='$nisn' AND id_petugas ='$id_petugas' AND status_bayar LIKE '%belum%'";
            if (mysqli_query($con, $sql_c)) {
                $response["value"] = 1;
                $response["message"] = "Sukses mengganti Pembayaran";
            } else {
                $response["value"] = 0;
                $response["message"] = "Gagal mengganti Pembayaran";
                echo json_encode($response);
            }
        } else {
            $response["value"] = 0;
            $response["message"] = "Gagal mengganti Siswa";
            echo json_encode($response);
        }
    }

    mysqli_close($con);
}
