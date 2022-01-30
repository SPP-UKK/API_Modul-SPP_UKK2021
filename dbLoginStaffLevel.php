<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas p WHERE p.username = '$username' AND p.password = MD5('$password') ORDER BY p.id_petugas ASC";
    $res = mysqli_query($con, $sql);
    $result = array();

    while ($row = mysqli_fetch_array($res)) {
        if ($row > 0) {
            array_push($result, array('username'=>$row[1], 'password'=>$row[2], 'nama_petugas'=>$row[3], 'level'=>$row[4]));
            echo json_encode(array("value" => 1, "result" => $result));
        } else {
            array_push($result, array($row));
            echo json_encode(array("value" => 0, "result" => $result));
        }
    }

    mysqli_close($con);
}