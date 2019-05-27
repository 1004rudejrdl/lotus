
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/color.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function diag(){
      window.open('../tt_diag/tt_diag_list.php','','scrollbars=no,toolbars=no,width=780,height=710');
    }
  </script>
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="./tt_color_test.php">테스트</a>
  <a onclick="diag()">연애진단</a>
  <a href="../tt_tend/tt_tend_test.php">연애성향테스트</a>
  <a href="./tt_color_test.php">컬러테스트</a>
</div><!-- sidenav end -->
<div class="main">
  <div class="con_title">
    <h2>컬러로 알아보는 나의 연애성향은?</h2>
  </div>
<div class="clear"></div>
<div class="color">
<div id="list1">
  <div id="list1_1" onclick="window.open('tt_color_red.php','','scrollbars=no,toolbars=no,width=350,height=530')">
      빨강
  </div>
</div>
<div id="blue">
  <div id="blue2" onclick="window.open('tt_color_blue.php','','scrollbars=no,toolbars=no,width=350,height=530')">
      파랑
  </div>
</div>
<div id="yellow">
  <div id="yellow2" onclick="window.open('tt_color_yellow.php','','scrollbars=no,toolbars=no,width=350,height=530')">
    노랑
  </div>
</div>
<div id="pink">
  <div id="pink2" onclick="window.open('tt_color_pink.php','','scrollbars=no,toolbars=no,width=350,height=530')">
    분홍
  </div>
</div>
</div>  <!-- color end -->
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
