<?php
require_once 'connection.php';

if($con){
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $bulan_spp = $_POST['bulan_spp'];
    $tahun_spp = $_POST['tahun_spp'];

    $insert = "INSERT INTO pembayaran(nisn,tgl_bayar,bulan_spp,tahun_spp) VALUES('$nisn','$tgl_bayar','$bulan_spp','$tahun_spp')";

    if($nisn != '' && $tgl_bayar != '' && $bulan_spp != '' && $tahun_spp != ''){
        $result = mysqli_query($con,$insert);
        $response = array();

        if($result){
            array_push($response,array(
                'status' => 'Berhasil Terbuat bang!'
            ));
        }else{
            array_push($response, array(
                'status' => 'Gagal Membuat Pembayaran...'
            ));
        }

    }else{
        array_push($response, array(
            'status' => 'Something is ketinggalan'
        ));
    }

}else{
    array_push($response, array(
        'status' => 'Gagal Authentikasi'
    ));

}

echo json_encode(array ('server_response' => $response));
mysqli_close($con)

?>