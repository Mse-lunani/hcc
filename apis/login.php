<?php
include_once 'operations.php';
$m['status'] = 0;
$email = security("email");
$password = md5($_POST['password']);

switch ($_POST['role']){
    case 'job_seeker':
        $sql = "SELECT * FROM job_seekers WHERE email = '$email' AND password = '$password'";
        $result = select_rows($sql);
        if(count($result) > 0){
            $m['status'] = 1;
            $m['data'] = $result[0];
        }
        break;
    case 'employer':
        $sql = "SELECT * FROM employer WHERE agency_email = '$email' AND password = '$password'";
        $result = select_rows($sql);
        if(count($result) > 0){
            $m['status'] = 1;
            $m['data'] = $result[0];
        }
        break;
}
echo json_encode($m);