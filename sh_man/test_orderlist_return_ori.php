<?php
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['name'];

include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
$mode = "receive";

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}

if($mode == "receive"){
    $sql = "select * from member_msg where r_id = '$id' order by msg_num desc";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total_record = mysqli_num_rows($result); //전체 레코드 수
}else{
    $sql = "select * from member_msg where s_id = '$id' order by msg_num desc";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total_record = mysqli_num_rows($result); //전체 레코드 수
}

define('SCALE', 3);
//1.전체페이지
$total_page=($total_record % SCALE == 0 )?
($total_record/SCALE):(ceil($total_record/SCALE));
//2.페이지가 없으면 디폴트 페이지 1페이지
$page=(!isset($_GET['page']))?(1):(test_input($_GET['page']));

//3.현재페이지 시작번호계산함.
$start=($page -1) * SCALE;
//4. 리스트에 보여줄 번호를 최근순으로 부여함.
$number = $total_record - $start;

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/message.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
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
  <?php

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

</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
