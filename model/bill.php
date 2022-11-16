<?php
function load_all_bill($kyw="",$user_id=0){
    $sql = "SELECT * FROM bill WHERE 1";
    if($kyw !=""){
        $sql.= " and bill_id like '%".$kyw."%'";
    }
    if($user_id >0){
        $sql.=" and user_id ='".$user_id."' ";
    }
    $sql.=" ORDER BY bill_id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_bill($id){
    $sql ="DELETE FROM bill WHERE  bill_id =".$id;
    pdo_execute($sql);
}
function update_bill($stt,$id){
$sql = "UPDATE bill SET status= '".$stt."' WHERE bill_id =".$id;
pdo_execute($sql);
}
function load_one_bill($id){
    $sql ="SELECT * FROM bill WHERE bill_id=".$id;
   $one_bill= pdo_query_one($sql);
   return $one_bill;
}
?>