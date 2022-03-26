<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nisn = $_POST['nisn'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM siswa WHERE nisn = '$nisn' AND password = MD5('$password')";
    $result = array();
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);

    if (isset($row)) {
        array_push($result, array('nisn' => $row[0], 'nama' => $row[2]));
        echo json_encode(array("value" => 1, "result" => $result));
    } else {
        $result["value"] = 0;
        $result["message"] = "NISN atau Password salah, Silahkan coba lagi...";
        echo json_encode($result);
    }

    mysqli_close($con);
}
