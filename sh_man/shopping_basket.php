
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
  if (!isset($_SESSION['userid'])) {
    alert_back("로그인 후 이용해 주세요");
  }
  $session=$_SESSION['userid'];
  $prd_price_sum=0;
  $sql="SELECT * from `wish_list` where id='$session'";

  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $total = mysqli_num_rows($result);


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
      <td><a href="./shopping_basket_delete.php?mode=all_delete"><button type="button" name="button">전체 상품 삭제</button></a></td>
      <td>상품정보</td>
      <td>상품금액</td>

    </tr>
<?php for ($i=0; $i < $total; $i++) {
  $row = mysqli_fetch_array($result);
  $prd_type_num=$row['prd_num'];
  $prd_count=$row['count'];
  switch ($row['color']) {
    case 'w':
      $prd_color='white';
      break;
    case 'l':
    $prd_color='black';
      break;
    case 'r':
    $prd_color='red';
      break;
    case 'g':
    $prd_color='green';
      break;
    case 'b':
    $prd_color='blue';
      break;

  }
  $prd_size=$row['size'];
  switch ($row['size']) {
    case 'S':
    $prd_size='s';
      break;
    case 'M':
    $prd_size='m';
      break;
    case 'L':
    $prd_size='l';
      break;
    case 'x':
    $prd_size='XL';
      break;
    case 'X':
    $prd_size='XXL';
      break;

    default:
      # code...
      break;
  }
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
  $file_copied_0=$row1['file_copied_0'];
  if (!empty($file_copied_0)) {
    //이미지 정보를 가져오게 하는 방법이다  width height type
    $image_info = getimagesize("./img/".$file_copied_0);
    $image_width = $image_info[0];
    $image_height = $image_info[1];
    $image_type = $image_info[2];
    if ($image_width>=300) {
      $image_width=300;
    }
  }else{
    $image_width = 0;
    $image_height = 0;
    $image_type = "";
  }
  $prd_price_sum=$prd_price*1+$prd_price_sum*1;


  ?>
  <tr>
    <td rowspan="2">
      <img src="./img/<?=$file_copied_0?>" alt="">
      <form class="" action="./shopping_basket_delete.php" method="post" >
        <input type="hidden" name="prd_num" value="<?=$prd_type_num?>">
        <input type="submit" name="" value="품목 지우기">
      </form>

       </td>
    <td><?=$prd_name?></td>
    <td rowspan="2"><?=$prd_price?>원</td>

  </tr>
  <tr>
    <td>사이즈 <?=$prd_size?> 색상 <?=$prd_color?> 개수 <?=$prd_count?></td>

  </tr>
  <?php
}
$prd_price_sum=number_format($prd_price_sum);
?>


  </table>



  <fieldset style="text-align:center">
  상품가격 <?=$prd_price_sum?>원
  </fieldset>
</div>

<div class="" style="text-align:center">
  <a href="./sh_man_list.php?mode=man"> <button type="button" name="button" >계속 쇼핑하기</button></a>
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
