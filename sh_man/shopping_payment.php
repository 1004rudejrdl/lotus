
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
  <h1>주문/결제</h1>
  <hr>
  <div class="">
    <div class="">
      <h3>구매자 정보</h3>
      <table style="width:100%">
        <tr>
          <td style="width:30%">이름</td>
          <td style="width:70%">김경덕</td>
        </tr>
        <tr>
          <td>이메일</td>
          <td>1004</td>
        </tr>
        <tr>
          <td>휴대폰 번호</td>
          <td>010</td>
        </tr>
      </table>
    </div>
    <div class="">
      <h3>받는사람 정보</h3>
      <table style="width:100%">
        <tr>
          <td style="width:30%">이름</td>
          <td style="width:70%">김경덕</td>
        </tr>
        <tr>
          <td>배송주소</td>
          <td><button type="button" name="button">배송지 변경</button><br>
          서울특별시</td>
        </tr>
        <tr>
          <td>연락처</td>
          <td>010</td>
        </tr>
        <tr>
          <td>이메일</td>
          <td>1004</td>
        </tr>
        <tr>
          <td>배송요청사항</td>
          <td>
            <select class="" name="">
              <option value="">문앞</option>
              <option value="">직접받기</option>
              <option value="">경비실</option>
              <option value="">택배</option>
            </select>
          </td>
        </tr>
      </table>
    </div>
    <div class=""><!-- for문 돌려야 하는 div -->
      <h3>배송 1건중 1</h3>
      <table style="width:100%">
        <tr>
          <td colspan="2">도착 예정</td>

        </tr>
        <tr>
          <td style="width:30%">가디건</td>
          <td style="width:70%">수량 1개</td>
        </tr>
      </table>
    </div><!-- for문 돌려야 하는 div -->
    <div class="">
      <h3>결제정보</h3>
      <table style="width:100%">
        <tr>
          <td style="width:30%">총 상품가격</td>
          <td style="width:70%">50000원</td>
        </tr>
        <tr>
          <td>즉시할인</td>
          <td>50000원</td>
        </tr>
        <tr>
          <td>배송비</td>
          <td>0원</td>
        </tr>
        <tr>
          <td>총 결제 금액</td>
          <td>50000원</td>
        </tr>
      </table>
    </div>
    <div class="" style="text-align:center">

      <button type="button" name="button">결제하기</button>
    </div>
  </div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
