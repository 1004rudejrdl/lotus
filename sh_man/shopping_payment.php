
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
$prd_price_sum=0;
  $sql="SELECT prd_num from `wish_list` where id='세션값'";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $total = mysqli_num_rows($result);
  for ($i=0; $i < $total; $i++) {
    $row1 = mysqli_fetch_array($result);
    $prd_type_num1=$row1['prd_num'];
    $prd_type[$i]=substr($prd_type_num1, 0,1);

  }



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
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
  <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>


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
        <?php
        for ($i=0; $i < $total; $i++) {
          if ($prd_type[$i]=='m' ||  $prd_type[$i]=='w'||$prd_type[$i]=='s'){
          ?>
          <tr>
            <td>배송주소</td>
            <td><button type="button" name="button">배송지 변경</button><br>
              서울특별시</td>
            </tr>

            <?php
            break;
            }
          }
          ?>

        <tr>
          <td>연락처</td>
          <td>010</td>
        </tr>
        <tr>
          <td>이메일</td>
          <td>1004</td>
        </tr>
        <?php
        for ($i=0; $i < $total; $i++) {
          if ($prd_type[$i]=='m' ||  $prd_type[$i]=='w'||$prd_type[$i]=='s'){
          ?>
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

            <?php
            break;
            }
          }
          ?>

      </table>
    </div>
    <div class=""><!-- for문 돌려야 하는 div -->
      <?php
      $sql="SELECT * from `wish_list` where id='세션값'";

      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      for ($i=0; $i < $total; $i++) {
        $row = mysqli_fetch_array($result);
        $prd_type_num=$row['prd_num'];

        $prd_count=$row['count'];
        $prd_type=substr($prd_type_num, 0,1);
        $prd_num=substr($prd_type_num, 1);
        $sql1="SELECT * from `prd_shop_detail` where prd_type='$prd_type' and prd_num='$prd_num' ";
        $result1 = mysqli_query($conn,$sql1);
        if (!$result1) {
          die('Error: ' . mysqli_error($conn));
        }
        $row1 = mysqli_fetch_array($result1);
        $prd_name=$row1['prd_name'];
        $prd_price=$row1['shop_price'];
        $prd_price=$prd_price*$prd_count;
        $prd_price_sum=$prd_price*1+$prd_price_sum*1;

        ?>
        <h3>배송 <?=$total?>건중 <?=$i+1?></h3>
        <table style="width:100%">
          <tr>
            <td colspan="2">도착 예정</td>

          </tr>
          <tr>
            <td style="width:30%"><?=$prd_name?></td>
            <td style="width:70%">수량 <?=$prd_count?>개</td>
          </tr>
        </table>

        <?php
      }

       ?>

    </div><!-- for문 돌려야 하는 div -->
    <div class="">
      <h3>결제정보</h3>
      <table style="width:100%">
        <tr>
          <td style="width:30%">총 상품가격</td>
          <td style="width:70%"><?=number_format($prd_price_sum)?>원</td>
        </tr>

      </table>
    </div>
    <div class="" style="text-align:center">

      <button type="button" name="button" onclick="payment_iamport()">결제하기</button>
    </div>
  </div>
  <script type="text/javascript">
  function payment_iamport(){
    var IMP = window.IMP; // 생략가능
    //IMP.init('iamport'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용
    IMP.init('imp82589048'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용
    IMP.request_pay({
        pg : 'inicis', // version 1.1.0부터 지원.
        pay_method : 'card',
        merchant_uid : 'merchant_' + new Date().getTime(),
        name : '주문명:결제테스트',
        amount : <?=$prd_price_sum?>,
        buyer_email : 'iamport@siot.do',
        buyer_name : '구매자이름',
        buyer_tel : '010-1234-5678',
        buyer_addr : '서울특별시 강남구 삼성동',
        buyer_postcode : '123-456',
        m_redirect_url : 'https://www.yourdomain.com/payments/complete'
    }, function(rsp) {
        if ( rsp.success ) {
            var msg = '결제가 완료되었습니다.';
            msg += '고유ID : ' + rsp.imp_uid;
            msg += '상점 거래ID : ' + rsp.merchant_uid;
            msg += '결제 금액 : ' + rsp.paid_amount;
            msg += '카드 승인번호 : ' + rsp.apply_num;
            location.href="./shop_order_list.php";

        } else {
            var msg = '결제에 실패하였습니다.';
            msg += '에러내용 : ' + rsp.error_msg;
        }
        alert(msg);
    });
  }

  </script>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
