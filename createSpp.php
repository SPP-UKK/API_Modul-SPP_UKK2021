<?php
require_once 'connection.php';

if($con){
    $angkatan = $_POST['angkatan'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $insert = "INSERT INTO spp(angkatan,tahun,nominal) VALUES('$angkatan','$tahun','$nominal')";

    if($angkatan != '' && $tahun != '' && $nominal != ''){
        $result = mysqli_query($con,$insert);
        $response = array();

        if($result){
            array_push($response,array(
                'status' => 'Berhasil Terbuat!'
            ));
        }else{
            array_push($response, array(
                'status' => 'Gagal Membuat Data!'
            ));
        }

    }else{
        array_push($response, array(
            'status' => 'Something is missing!'
        ));
    }

}else{
    array_push($response, array(
        'status' => 'Gagal Authentikasi!'
    ));

}

echo json_encode(array ('server_response' => $response));
mysqli_close($con)

?>