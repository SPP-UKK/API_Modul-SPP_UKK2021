<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas p WHERE p.username = '$username' AND p.password = MD5('$password') ORDER BY p.id_petugas ASC";
    $result = array();
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);

    if (isset($row)) {
        array_push($result, array('id_petugas' => $row[0], 'username' => $row[1], 'password' => $row[2], 'nama_petugas' => $row[3], 'level' => $row[4]));
        echo json_encode(array("value" => 1, "result" => $result));
    } else {
        $result["value"] = 0;
        $result["message"] = "Username atau Password salah, Silahkan coba lagi...";
        echo json_encode($result);
    }

    mysqli_close($con);
}
