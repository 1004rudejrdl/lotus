
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함

  if($_GET['mode']=="man"){

  }else if($_GET['mode']=="woman"){

  }else if($_GET['mode']=="shose"){

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

  <h2>추천/예약</h2>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
  <p>화면테스트</p>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
