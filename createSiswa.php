<?php
require_once 'connection.php';

if($con){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $password = $_POST['password'];

    $insert = "INSERT INTO siswa(nisn,nis,nama,alamat,telp,password) VALUES('$nisn','$nis','$nama','$alamat','$telp','$password')";
    $result = mysqli_query($con,$query);
    $response = array();

    if($nisn != '' && $nis != '' && $nama != '' && $nama_siswa != '' && $alamat != '' && $telp != '' && $password != ''){
        $result = mysqli_query($con,$query);
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
            'status' => 'Something is ketinggalan...'
        ));
    }

}else{
    array_push($response, array(
        'status' => 'Gagal Authentikasi'
    ));

}

echo json_encode(array ('server_response' => $response));
mysqli_close($close)

?>