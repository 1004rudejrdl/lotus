  <!-- header start -->
  <div class="header-top">
    <div id="navbar" class="topnav sticky">
      <!-- id for sticky -->
      <div class="dropdown logo_center">
        <button class="logo"><a href="../index.php"> <img id="navbar_img" src="../main_img/lotus_logo_text_black.png" alt=""></a></button>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          <a>이성찾기&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>내게 맞는 이성찾기</h2>
          </div> <!-- header -->
          <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_sub.php"; ?>
        </div> <!-- dropdown-content end -->
      </div> <!-- dropdown end -->
      <div class="dropdown">
        <button class="dropbtn">
          <a>추천/예약&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>결정 장애를 위해 준비한 데이트 코스</h2>
          </div> <!-- header -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_sub.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown">
        <button class="dropbtn">
          <a href="../sh_man/sh_man_list.php?mode=man">쇼핑몰&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content alignR">
          <div class="header">
            <h2>패션 고자를 위한 쇼핑몰</h2>
          </div> <!-- header -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_sub.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown ">
        <button class="dropbtn">
          <a href="../tt_diag_/tt_diag_test.php">테스트&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>당신의 연애 성향이 궁금하다면</h2>
          </div> <!-- header -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_sub.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown ">
        <button class="dropbtn">
          <a href="../cm_free_/cm_free_exhibit.php">커뮤니티&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>다 드루와</h2>
          </div> <!-- header -->
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_sub.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <!-- <div class="dropdown dd_right">
        <button class="logo"><a href="../index.php"> <img src="../main_img/lotus_logo_img2.png"></a></button>
      </div> -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="../mb_login/mb_login.php">LOGIN</a></button>
      </div> <!-- dropdown -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="../mb_login/mb_join_form.php">JOIN</a></button>
      </div> <!-- dropdown -->
    </div> <!-- topnav end -->
  </div>

  <!-- modal signup form -->

  <!-- common effect -->
  <!-- sticky goto top -->
  <button onclick="topFunction()" id="gotoTopBtn" title="Go to top">Top</button>
  <!-- sticky goto top end -->
  <!-- sticky social icon -->
  <div class="icon-bar">
    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
    <a href="#" class="google"><i class="fa fa-google"></i></a>
    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
    <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
  </div>
  <!-- sticky social icon end-->
  <!-- common effect end-->

  <script src="../js/effect_common.js"></script><!-- Sticky event를 위해서 상단에 올리지 못함 -->
  <!-- header end -->
