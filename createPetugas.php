<?php
require_once 'connection.php';

if($con){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $insert = "INSERT INTO petugas(username,password,nama_petugas,level) VALUES('$username','$password','$nama_petugas','$level')";

    if($username != '' && $password != '' && $nama_petugas != '' && $level != ''){
        $result = mysqli_query($con,$insert);
        $response = array();

        if($result){
            array_push($response,array(
                'status' => 'Berhasil Login'
            ));
        }else{
            array_push($response, array(
                'status' => 'Gagal Registrasi...'
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