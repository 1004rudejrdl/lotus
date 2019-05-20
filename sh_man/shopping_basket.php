
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="./sh_man_list.php?mode=man">쇼핑몰</a>
  <a href="./sh_man_list.php?mode=man">남성의류</a>
  <a href="./sh_man_list.php?mode=woman">여성의류</a>
  <a href="./sh_man_list.php?mode=shose">신발</a>
</div><!-- sidenav end -->
<div class="main">

<div class="">


<h1>장바구니</h1>
<div class="">
  <div class="" style="width:100%; text-align:center;background-color:#dddddd">
    <h3 >일반 구매</h3>
  </div>
  <table border="1px" style="width:100%">
    <tr>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>1</td>
    </tr>
    <tr>
      <td colspan="4">1</td>
    </tr>
    <tr>
      <td rowspan="2">1</td>
      <td>1</td>
      <td rowspan="2">1</td>
      <td rowspan="2">1</td>
    </tr>
    <tr>
      <td>1</td>

    </tr>
    <tr>
      <td colspan="4">1</td>
    </tr>
  </table>
  <input type="checkbox" name="" value="">전체 선택
  <button type="button" name="button">전체 삭제</button>
  <button type="button" name="button">품절/판매종료 상품 전체 삭제</button>
  <fieldset style="text-align:center">
    총 상품가격 50000원 = 총 주문 금액 50000원
  </fieldset>
</div>

<div class="" style="text-align:center">
  <button type="button" name="button" >계속 쇼핑하기</button>
  <a href="./shopping_payment.php"> <button type="button" name="button">구매하기</button></a>
</div>





</div>



</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
