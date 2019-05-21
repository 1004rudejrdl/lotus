
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함

  if($_GET['mode']=="man"){
    $name="남성패션";
    $list_name="man";
  }else if($_GET['mode']=="woman"){
    $name="여성패션";
    $list_name="woman";
  }else if($_GET['mode']=="shose"){
    $name="신발";
    $list_name="shose";
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
  <link rel="stylesheet" href="./css/list.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <form class="" action="./shop_register_insert.php?mode=<?=$list_name?>" method="post" enctype="multipart/form-data">

  <table style="width:100%">
    <tr>
      <td>회사 이름</td>
      <td> <input type="text" name="company_name" value=""> </td>
      <td>샾 이름 </td>
      <td> <input type="text" name="shop_name" value=""> </td>
    </tr>
    <tr>
      <td>샾 이미지</td>
      <td> <input type="file" name="logo_img" value=""> </td>
      <td>샾 링크</td>
      <td> <input type="text" name="shop_link" value=""></td>
    </tr>
    <tr>
      <td>문의번호</td>
      <td><input type="text" name="shop_tel" value=""> </td>
      <td>주소</td>
      <td>
        <button type="button" name="button">주소 등록하기</button> <br>
        <input type="text" name="shop_addr1" value=""><br>
        <input type="text" name="shop_addr2" value="">
      </td>
    </tr>
    <tr>
      <td >유의사항</td>

      <td colspan="3"> <textarea name="shop_note" rows="6" cols="60"></textarea> </td>

    </tr>
  </table>
  <div class="" style="text-align:center">
    <input type="submit" name="" value="등록하기">
  </div>
</form>
</div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
