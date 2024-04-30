<?php
include_once 'operations.php';
$m['status'] = 0;
$email = security("agency_email");
$_POST['password'] = md5(security("password"));
$sql = "SELECT * FROM employer where agency_email = '".$email."'";
$row = select_rows($sql);
if(count($row) > 0){
    $m['status'] = 2;
    $m['message'] = "Email already exists";
}elseif(insert_edit_form("employer")){
    $sql = "SELECT * FROM employer order by id desc";
    $row = select_rows($sql);
    $m['data'] = $row[0];
    $m['status'] = 1;
}
echo json_encode($m);