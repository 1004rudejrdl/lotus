<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$id = $_SESSION['userid'];

//$sql = "SELECT * from order_list where id = '$id';";
$sql = "SELECT * from order_list o inner join prd_shop_detail s on o.prd_num = s.prd_num;";
$result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
$total = mysqli_num_rows($result);
?>



<table>
  <tr>
    <td>고객 아이디</td>
    <td>상품 번호</td>
    <td>상품 이름</td>
    <td>주문번호</td>
    <td>상품 가격</td>
    <td>상품 주문 개수</td>
    <td>상품 사이즈</td>
    <td>상품 색상</td>
    <td>상품 타입</td>
    <td>배송 정보 변경</td>
    <td>환불 요청 날짜</td>
    <td>환불 처리 완료</td>
  </tr>
  <?php
    for ($i=0; $i < $total; $i++) {
      //i마다 selected를 0~5 까지 검사하므로 한 i 가 돌고나면 초기화 시켜 주어야 한다. 초기화 하지 않으면 최초에 선택된 값이 후의 i에 모두 적용된다.
      $select0=$select1=$select2=$select3=$select4=$select5="";
      $row = mysqli_fetch_array($result);
      $prd_name=$row['prd_name'];
      $user_id=$row['id'];
      $prd_num=$row['prd_num'];
      $shop_price=$row['shop_price'];
      $order_count=$row['order_count'];
      $file_copied_0=$row['file_copied_0'];
      $tackback_state=$row['tackback_state'];
      $order_num=$row['order_num'];
      $prd_type=$row['prd_type'];
      $shop_color=$row['shop_color'];
      $shop_size=$row['shop_size'];
      $tackback_day=$row['tackback_day'];
      $back_acc=$row['back_acc'];

      ?>
      <tr>
        <td><?=$user_id?></td>
        <td><?=$prd_num?></td>
        <td><?=$prd_name?></td>
        <td><?=$order_num?></td>
        <td><?=$shop_price?></td>
        <td><?=$order_count?></td>
        <td><?=$shop_size?></td>
        <td><?=$shop_color?></td>
        <td>
          <?php
          switch ($prd_type) {
            case 'm':
              ?>남성<?php
              break;
            case 'w':
              ?>여성<?php
              break;
            case 's':
              ?>신발<?php
              break;

          }
           ?>
        </td>
        <td>
          <?php
        switch ($tackback_state) {
          case '0':
            $select0="selected";
            break;
          case '1':
            $select1="selected";
            break;
          case '2':
            $select2="selected";
            break;
          case '3':
            $select3="selected";
            break;
          case '4':
            $select4="selected";
            break;
          case '5':
            $select5="selected";
            break;
        }

        ?>
        <form class="" action="update_order_list_inf.php" method="post">
        <select class="" name="order_list_inf<?=$i?>">
          <option value="0" <?=$select0?>>집하</option>
          <option value="1" <?=$select1?>>배송중(입고)</option>
          <option value="2" <?=$select2?>>배송중(출고)</option>
          <option value="3" <?=$select3?>>배송중</option>
          <option value="4" <?=$select4?>>배달중</option>
          <option value="5" <?=$select5?>>배달완료</option>
        </select>
        <input type="hidden" name="order_num" value="<?=$order_num?>">
        <input type="submit" name="" value="배송 정보 변경">
      </form>
        </td>
        <td><?=$tackback_day?></td>
        <td>
          <?php
          if (!empty($tackback_day)) {
            if (!empty($back_acc)) {

              echo "환불 처리 완료";
            }else {
              ?>
              <form class="" action="return_order_money.php" method="post">
                <input type="hidden" name="order_num<?=$i?>" value="<?=$order_num?>">
                <input type="submit" name="" value="환불 하기">
              </form>

              <?php
            }
          }
           ?>

        </td>
      </tr>



      <?php
    }


   ?>
</table>



<?php



 ?>
