<?php
include_once 'operations.php';
$m['status'] = 0;
$id = security("employer_id");
$sql = "SELECT vacancy.*, employer.agency_name FROM vacancy 
        JOIN employer ON vacancy.employer_id = employer.id
        where employer_id = '$id'";
$result = select_rows($sql);
if(count($result) > 0){
    $m['status'] = 1;
    $m['data'] = $result;
}
echo json_encode($m);