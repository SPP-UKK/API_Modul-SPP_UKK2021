<?php
require_once 'connection.php';

if($con){
    $id_pembayaran = $_POST['id_pembayaran'];
    $id_petugas = $_POST['id_petugas'];
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $bulan_spp = $_POST['bulan_spp'];
    $tahun_spp = $_POST['tahun_spp'];

    $insert = "INSERT INTO pembayaran(id_pembayaran,id_petugas,nisn,tgl_bayar,bulan_spp,tahun_spp) VALUES('','','','','','')";

    if($id_pembayaran != '' && $id_petugas != '' && $nisn != '' && $tgl_bayar != '' && $bulan_spp != '' && $tahun_spp != ''){
        $result = mysqli_query($con,$insert);
        $response = array();

        if($result){
            array_push($response,array(
                'status' => 'Berhasil'
            ));
        }else{
            array_push($response, array(
                'status' => 'Gagal'
            ));
        }

    }else{
        array_push($response, array(
            'status' => 'Gagal'
        ));
    }

}else{
    array_push($response, array(
        'status' => 'Gagal'
    ));

}

echo json_encode(array ('server_response' => $response));
mysqli_close($con)

?>