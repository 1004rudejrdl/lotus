<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$id = $_SESSION['userid'];

//$sql = "SELECT * from order_list where id = '$id';";
$sql = "SELECT * from order_list o inner join prd_shop_detail s on o.prd_num = s.prd_num where id = '$id';";
$result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
$total = mysqli_num_rows($result);

?>
<table border="1">

<?php


for ($i=0; $i < $total; $i++) {
  $row = mysqli_fetch_array($result);
  //$row_prd_num=$row['prd_num'];
  $prd_name=$row['prd_name'];
  $prd_num=$row['prd_num'];
  $shop_price=$row['shop_price'];
  $order_count=$row['order_count'];
  $order_num=$row['order_num'];
  $file_copied_0=$row['file_copied_0'];
  $tackback_state=$row['tackback_state'];
  $tackback_day=$row['tackback_day'];
  $order_all_count=$shop_price*$order_count;
?>
<tr>
<td rowspan="4"><img src="../sh_man/img/<?=$file_copied_0?>" alt="" width="200" height="200"> </td>
<td>상품 명 : <?=$prd_name?></td>
<td rowspan="4">
  <?php if (!empty($tackback_day) && $tackback_state==0) {
    ?>
    환불신청 완료
    <?php
  }else if($tackback_state==0){
      ?>
      집하
      <form class="" action="return_order_list.php" method="post">

        <input type="hidden" name="order_num<?=$i?>" value="<?=$order_num?>">


        <input type="submit" name="" value="환불 신청">
      </form>
      <?php
  }else if(!empty($tackback_day)){
      ?>

      반품신청 완료
      <?php
  }else {
    switch ($tackback_state) {
      case '1':
        $select="배송중(입고)";
        break;
      case '2':
        $select="배송중(출고)";
        break;
      case '3':
        $select="배송중";
        break;
      case '4':
        $select="배달중";
        break;
      case '5':
        $select="배달완료";
        break;
    }
    ?>
      <?=$select?>

      <form class="" action="return_order_list.php" method="post">

        <input type="hidden" name="order_num<?=$i?>" value="<?=$order_num?>">
        <input type="submit" name="" value="반품신청">
      </form>
      <?php
    }
 ?>
 </td>
</tr>
<tr>
  <td>상품 가격 : <?=$shop_price?></td>
</tr>
<tr>
  <td>상품 개수 : <?=$order_count?></td>
</tr>
<tr>
<td>상품 총 가격 : <?=$order_all_count?></td>

</tr>



<?php

}


 ?>
</table>
