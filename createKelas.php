<?php
require_once 'connection.php';

if($con){
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $insert = "INSERT INTO kelas(id_kelas,nama_kelas,jurusan,angkatan) VALUES('','','','')";

    if($id_kelas != '' && $nama_kelas != '' && $jurusan != '' && $angkatan != ''){
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