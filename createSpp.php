<?php
require_once 'connection.php';

if($con){
    $id_spp = $_POST['id_spp'];
    $angkatan = $_POST['angkatan'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $insert = "INSERT INTO spp(id_spp,angkatan,tahun,nominal) VALUES('','','','')";

    if($id_spp != '' && $angkatan != '' && $tahun != '' && $nominal != ''){
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