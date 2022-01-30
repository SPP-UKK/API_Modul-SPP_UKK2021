<?php
require_once('dbConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nisn = $_POST['nisn'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM siswa s INNER JOIN siswa_login sl ON s.nisn = sl.nisn WHERE s.nisn = '$nisn' AND sl.password = MD5('$password') ORDER BY nama ASC";
    $res = mysqli_query($con, $sql);
    $result = array();

    while ($row = mysqli_fetch_array($res)) {
        if ($row > 0) {
            array_push($result, array('nisn'=>$row[0], 'nama'=>$row[2], 'password'=>$row[7]));
            echo json_encode(array("value" => 1, "result" => $result));
        } else {
            array_push($result, array($row));
            echo json_encode(array("value" => 0, "result" => $result));
        }
    }

    mysqli_close($con);
}
