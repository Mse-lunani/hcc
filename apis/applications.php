<?php
include_once 'operations.php';
$m['status'] = 0;
$id = security("job_id");
$sql = "SELECT applications.*, job_seekers.name FROM applications
        JOIN job_seekers ON applications.applicant_id = job_seekers.id
        WHERE job_id = '$id'";
$result = select_rows($sql);
if(count($result) > 0){
    $m['status'] = 1;
    $m['data'] = $result;
}
echo json_encode($m);