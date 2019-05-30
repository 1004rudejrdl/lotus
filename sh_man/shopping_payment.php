<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

  function alert_back($data) {
    echo "<script>alert('$data');location.href='../index.php';</script>";
    exit;
  }
  if (!isset($_SESSION['userid'])) {
    alert_back("로그인 후 이용해 주세요");
  }
$prd_price_sum=0;
$session=$_SESSION['userid'];

  $sql="SELECT prd_num from `wish_list` where id='$session'";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $total = mysqli_num_rows($result);
  for ($i=0; $i < $total; $i++) {
    $row3 = mysqli_fetch_array($result);
    $prd_type_num1=$row3['prd_num'];
    $prd_type[$i]=substr($prd_type_num1, 0,1);

  }
  $sql1="SELECT * from `member` where id='$session'";

  $result1 = mysqli_query($conn,$sql1);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $row = mysqli_fetch_array($result1);
  $name=$row['name'];
  $tel=$row['tel'];
  $email=$row['email'];
  $address=$row['address'];
  $detailAddress=$row['detailAddress'];
  $extraAddress=$row['extraAddress'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/sh_payment.css">
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
  <div class="admin_title">
    장바구니
  </div>
  <hr class="title_hr mg_10">
    <div class="buyer_info">
      <h4>구매자 정보</h4>
      <table>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
          <td class="tb_cont"><?=$name?></td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
          <td class="tb_cont"><?=$email?></td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 연 락 처</td>
          <td class="tb_cont"><?=$tel?></td>
        </tr>
      </table>
    </div><!-- buyer_info end -->
    <div class="receiver_info">
      <h4>받는사람 정보</h4>
      <table>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
          <td class="tb_cont"><?=$name?></td>
        </tr>
        <?php
        for ($i=0; $i < $total; $i++) {
          if ($prd_type[$i]=='m' ||  $prd_type[$i]=='w'||$prd_type[$i]=='s'){
          ?>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 배송주소</td>
          <td class="tb_cont"><?=$address.$detailAddress.$extraAddress?></td>
        </tr>
            <?php
            break;
            }
          }
          ?>
        <tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 연 락 처</td>
          <td class="tb_cont"><?=$tel?></td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
          <td class="tb_cont"><?=$email?></td>
        </tr>
        <?php
        for ($i=0; $i < $total; $i++) {
          if ($prd_type[$i]=='m' ||  $prd_type[$i]=='w'||$prd_type[$i]=='s'){
          ?>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span>배송요청사항</td>
            <td class="tb_cont">
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
    <hr class="title_hr">
    <div class="state_info"><!-- for문 돌려야 하는 div -->
      <?php
      $sql="SELECT * from `wish_list` where id='$session'";

      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      for ($i=0; $i < $total; $i++) {
        $row2 = mysqli_fetch_array($result);
        $prd_type_num=$row2['prd_num'];

        $prd_count=$row2['count'];
        $prd_type=substr($prd_type_num, 0,1);
        $prd_num=substr($prd_type_num, 1);
        $sql1="SELECT * from `prd_shop_detail` where prd_type='$prd_type' and prd_num='$prd_num' ";
        $result1 = mysqli_query($conn,$sql1);
        if (!$result1) {
          die('Error: ' . mysqli_error($conn));
        }
        $row4 = mysqli_fetch_array($result1);
        $prd_name=$row4['prd_name'];
        $prd_price=$row4['shop_price'];
        $prd_price=$prd_price*$prd_count;
        $prd_price_sum=$prd_price*1+$prd_price_sum*1;

        ?>
      <div class="state_detail">
        <h4>결제 <?=$total?>건중 <?=$i+1?></h4>
        <table>
          <tr>
            <td class="td_subjet" colspan="2"><span class="td_subjet_star">*</span>도착 예정</td>
          </tr>
          <tr>
            <td class="tb_cont">&nbsp;&nbsp;&nbsp;&nbsp;<?=$prd_name?></td>
            <td class="tb_cont ord_count">수량 <?=$prd_count?>개</td>
          </tr>
        </table>
      </div>        <!-- state_detail end -->
        <?php
      }
       ?>
    </div><!-- for문 돌려야 하는 div -->
    <hr class="title_hr">
    <div class="pay_info">
      <h4>결제정보</h4>
      <table>
        <tr>
          <td class="tb_cont t_center">
            <span>상품 <?=$total?>개</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="t_red">총 결제금액<?=number_format($prd_price_sum)?>원</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
        </tr>
      </table>
    </div>
    <hr class="title_hr">
    <div class="btn_submit">
      <button type="button" name="button" onclick="payment_iamport()">결제하기</button>
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
