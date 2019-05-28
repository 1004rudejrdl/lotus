<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/tend.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function diag() {
      window.open('../tt_diag/tt_diag_list.php', '', 'scrollbars=no,toolbars=no,width=780,height=710');
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
      <a href="../tt_color/tt_color_test.php">테스트</a>
      <a onclick="diag()">연애진단</a>
      <a href="./tt_tend_test.php">연애성향테스트</a>
      <a href="../tt_color/tt_color_test.php">컬러테스트</a>
    </div><!-- sidenav end -->
    <div class="main">
        <div class="con_title">
          <h4>
            Q.숲속에서 산책을 하고 있던 당신,<br><br>
            어쩌다보니 길을 잃게 되어 낯선곳으로 들어와버렷습니다.<br><br>
            그런데,<br>
            말을 하는 동물들이 있네요!<br><br>
            당신은 어떤 동물에게 길을 물어볼건가요?
          </h4>
        </div>
        <div class="animal2">
          <div class="animal3" onclick="window.open('tt_tend_bear.php','','scrollbars=no,toolbars=no,width=500,height=330')">
            A.곰
          </div>
        </div>
        <div class="animal2">
          <div class="animal3" onclick="window.open('tt_tend_cat.php','','scrollbars=no,toolbars=no,width=500,height=330')">
            B.고양이
          </div>
        </div>
        <div class="animal2">
          <div class="animal3" onclick="window.open('tt_tend_monkey.php','','scrollbars=no,toolbars=no,width=500,height=330')">
            C.원숭이
          </div>
        </div>
        <div class="animal2">
          <div class="animal3" onclick="window.open('tt_tend_rabit.php','','scrollbars=no,toolbars=no,width=500,height=330')">
            D.토끼
          </div>
        </div>
    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
</body>

</html>
