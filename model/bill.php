<?php
function load_all_bill(){
    $sql = "SELECT * FROM bill ORDER BY bill_id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_bill($id){
    $sql ="DELETE FROM bill WHERE  bill_id =".$id;
    pdo_execute($sql);
}
function update_bill($stt,$id){
$sql = "UPDATE bill SET status=$stt WHERE bill_id =".$id;
pdo_execute($sql);
}
function load_one_bill($id){
    $sql ="UPDATE bill SET status WHERE bill_id=".$id;
    pdo_query_one($sql);
}
?>