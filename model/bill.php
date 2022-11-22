<?php
function load_all_bill($kyw = "", $user_id = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($kyw != "") {
        $sql .= " and bill_id like '%" . $kyw . "%'";
    }
    if ($user_id > 0) {
        $sql .= " and user_id ='" . $user_id . "' ";
    }
    $sql .= " ORDER BY bill_id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_bill($bill_id)
{

  $sql = "DELETE FROM cart WHERE `bill_id` = {$bill_id}";
  pdo_execute($sql);

  $sql = "DELETE FROM bill WHERE `bill_id` = {$bill_id}";
  pdo_execute($sql);

}
function update_bill($stt, $id)
{
    $sql = "UPDATE bill SET status= '" . $stt . "' WHERE bill_id =" . $id;
    pdo_execute($sql);
}
function load_one_bill($id)
{
    $sql = "SELECT * FROM bill WHERE bill_id=" . $id;
    $one_bill = pdo_query_one($sql);
    return $one_bill;
}
//alo
function insert_bill($username, $email, $address, $phone, $total_money, $pttt, $status, $user_id, $ngaydathang)
{
    $sql = "INSERT INTO `bill` (`fullname`, `email`, `address`, `phone`, `total_money`, `pttt`, `status`, `user_id`, `ngaydathang`) VALUES ('$username', '$email', '$address', '$phone', '$total_money', '$pttt', '$status', '$user_id', '$ngaydathang')";
     return pdo_execute_return_lastInsertId($sql);;
}
function insert_cart($user_id, $price, $amount, $product_id, $size_id, $bill_id)
{
    // $sql = "INSERT INTO `cart` (`user_id`, `price`, `amount`, `product_id`, `size_id`, `bill_id`) VALUES ('$user_id', '$price', '$amount', '$product_id', '$size_id','$bill_id')";
    $sql ="INSERT INTO `cart` (`user_id`, `price`, `amount`, `product_id`, `size_id`, `bill_id`) VALUES ('$user_id', '$price', '$amount', '$product_id',36, '$bill_id')";
    return pdo_execute($sql);
}
function list_cart($bill_id)
{
    $sql = "SELECT * FROM `cart` WHERE `cart`.`bill_id`=" . $bill_id;
    $cart =  pdo_query($sql);
    return $cart;
}
//đếm số sản phẩm
function count_cart($bill_id)
{
    $sql = "SELECT * FROM `cart` WHERE `cart`.`bill_id`=" . $bill_id;
    $cart =  pdo_query($sql);
    return sizeof($cart);
}
function total_cart()
{
  $total_price = 0;
  foreach ($_SESSION['mycart'] as $cart) {
    $total = $cart[2] * $cart[4];
    $total_price += $total;
  }
  return $total_price +50;
}
function list_img_cart($user_id){
$sql  ="SELECT * FROM `cart` JOIN `product` ON `cart`.`product_id` = `product`.`product_id` JOIN `bill` ON `cart`.`bill_id` = `bill`.`bill_id`  WHERE `cart`.`user_id`=".$user_id;
$list_img_cart = pdo_query($sql);
return $list_img_cart;
}
