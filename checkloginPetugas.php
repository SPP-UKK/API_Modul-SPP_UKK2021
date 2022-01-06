<?php
require_once 'connection.php';

if($con){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM petugas WHERE username = $username AND password = $password";
    $result = mysqli_query($con,$query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row>0){
        array_push($response, array(
            'status' => 'Berhasil Login!'
        ));
    }else{
        array_push($response, array(
            'status' => 'Gagal Login bang..'
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