<?php
include_once 'operations.php';
$m['status'] = 0;
if(insert_edit_form("vacancy")){
    $sql = "select * from vacancy order by id desc limit 1";
    $result = select_rows($sql);
    $m['status'] = 1;
    $m['data'] = $result[0];
}
echo json_encode($m);