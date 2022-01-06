<?php
require_once 'connection.php';

if($con){
    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $insert = "INSERT INTO kelas(nama_kelas,jurusan,angkatan) VALUES('$nama_kelas','$jurusan','$angkatan')";

    if($nama_kelas != '' && $jurusan != '' && $angkatan != ''){
        $result = mysqli_query($con,$insert);
        $response = array();

        if($result){
            array_push($response,array(
                'status' => 'Berhasil Terbuat bang!'
            ));
        }else{
            array_push($response, array(
                'status' => 'Gagal Membuat Kelas...'
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