<?php
function load_all_statistical(){
$sql ="SELECT categori.categori_id as categori_id,categori.categori_name as categori_name,COUNT(product.product_id) as countpr,MIN(product.price) as minprice,MAX(product.price) as maxprice,AVG(product.price) as avgprice  FROM product JOIN categori ON categori.categori_id=product.categori_id GROUP BY categori.categori_id ORDER BY categori.categori_id DESC";
$list_statistical = pdo_query($sql);
return $list_statistical;
}
?>