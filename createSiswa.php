<?php
require_once 'connection.php';

if($con){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $password = $_POST['password'];

    $insert = "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,telp,password) VALUES('','','','','','','')";
    $result = mysqli_query($con,$query);
    $response = array();

    if($nisn != '' && $nis != '' && $nama != '' && $nama_siswa != '' && $id_kelas != '' && $alamat != '' && $telp != '' && $password != ''){
        $result = mysqli_query($con,$query);
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
mysqli_close($close)

?>