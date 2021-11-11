<?php
require_once 'connection.php';

if($con){
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $insert = "INSERT INTO petugas(id_petugas,username,password,nama_petugas,level) VALUES('','','','','')";

    if($id_petugas != '' && $username != '' && $password != '' && $nama_petugas != '' && $level != ''){
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