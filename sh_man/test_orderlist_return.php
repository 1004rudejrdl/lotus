<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$id = $_SESSION['userid'];
$name = $_SESSION['name'];
//$sql = "SELECT * from order_list where id = '$id';";
$sql = "SELECT * from order_list o inner join prd_shop_detail s on o.prd_num = s.prd_num where id = '$id';";
$result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
$total = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="../css/img_re.css">
  <link rel="stylesheet" href="./css/sh_od_return.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<title>연愛, 꽃 피우다</title>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div class="main_body">
    <div id="sidenav" class="sidenav">
      <a href="../find_meet/user.php">회원정보창</a>
      <a href="../message/message.php">우편함</a>
      <a href="../mb_login/mb_modify_form.php">회원정보수정</a>
      <a href="../sh_man/shopping_basket.php?mode_user=user_page">장바구니</a>
      <a href="../sh_man/test_orderlist_return.php">주문/결제목록</a>
    </div><!-- sidenav end -->

    <div class="main">
      <div class="admin_title">
        <?=$name?>님의 주문/결제 목록
      </div>
      <hr class="title_hr">
      <div class="lsb_msg">총&nbsp;<?=$total?>&nbsp;건의 주문/결제건이 있습니다.</div>
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
      <table class="basket_table">
        <tr>
          <td class="width_20" rowspan="5">
            <img src="../sh_man/img/<?=$file_copied_0?>">
          </td>
          <td colspan="2" class="width_60"><b>상세정보</b></td>
          <td class="width_20" rowspan="5">
            <?php if (!empty($tackback_day) && $tackback_state==0) {
          ?>
            환불신청 완료
            <?php
        }else if($tackback_state==0){
            ?>
            결제완료
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
              $select="집하";
              break;
            case '2':
              $select="배송중(입고)";
              break;
            case '3':
              $select="배송중(출고)";
              break;
            case '4':
              $select="배송중";
              break;
            case '5':
              $select="배달중";
              break;
            case '6':
              $select="배달완료";
              break;
          }
          ?>
            <?=$select?>

            <form class="" action="return_order_list.php" method="post">

              <input type="hidden" name="order_num<?=$i?>" value="<?=$order_num?>">
              <br>
              <input type="submit" name="" value="반품신청">
            </form>
            <?php
          }
       ?>
          </td>
        </tr>

        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 상품 이름</td>
          <td class="tb_cont"><?=$prd_name?></td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 상품 가격</td>
          <td class="tb_cont"><?=$shop_price?> 원</td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 상품 개수</td>
          <td class="tb_cont"><?=$order_count?> 개</td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 상품 총 가격</td>
          <td class="tb_cont"><?=$order_all_count?> 원</td>
        </tr>
      </table>
      <?php
    }
     ?>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
</body>

</html>
