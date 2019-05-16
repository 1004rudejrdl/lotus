<!-- https://tympanus.net/codrops/2013/06/26/expanding-search-bar-deconstructed/ -->
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
  // create_table($conn,'membership');//이력서 제출 테이블 생성
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/common.css">
  <!-- <link rel="stylesheet" href="./css/join.css"> -->
  <link rel="stylesheet" href="./css/main.css">
  <!-- <script type="text/javascript" src="./js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="./js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>

<body>
  <!-- header start -->
  <div class="header-top">
    <div id="navbar" class="topnav sticky">
      <!-- id for sticky -->
      <div class="dropdown logo_center">
        <button class="logo"><a href="./index.php"> <img id="navbar_img" src="./main_img/lotus_logo_text_black.png" alt=""></a></button>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          <a>이성찾기&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>내게 맞는 이성찾기</h2>
          </div> <!-- header -->
          <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown">
        <button class="dropbtn">
          <a href="./sh_man/sh_man_list.php?mode=man">쇼핑몰&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content alignR">
          <div class="header">
            <h2>패션 고자를 위한 쇼핑몰</h2>
          </div> <!-- header -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <!-- <div class="dropdown dd_right">
        <button class="logo"><a href="./index.php"> <img src="./main_img/lotus_logo_img2.png"></a></button>
      </div> -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="./index.php">LOGIN</a></button>
      </div> <!-- dropdown -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="./index.php">JOIN</a></button>
      </div> <!-- dropdown -->
    </div> <!-- topnav end -->
    <img id="header_img" src="./main_img/lotus_main_img3.png" alt="SEA" style="width:100%;">
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

  <script src="./js/effect_common.js"></script><!-- Sticky event를 위해서 상단에 올리지 못함 -->
  <script src="./js/main.js"></script><!-- Sticky event를 위해서 상단에 올리지 못함 -->
  <!-- header end -->

  <!-- main_body start -->
<div class="main_body">
  <p>window.open으로 가면 창계속 열리니까 href로 가는걸로 하져</p>
  <p>로그인이나 조인같은 애들은 필요하면 따로열고여</p>
  <div class="main_body_center">
    <table>      <!-- 그림, 남프, 여프, 로그 -->
      <tr>
        <td colspan="2" class="td_pic_pro">
          <img src="./main_img/lotus_main_img.png" alt="" style="width:100%;">
        </td>

        <td rowspan="2">
          <!-- <img src="./main_img/img_header.png" alt="" style="width:100%;"> -->
<div class="br_st_text">
  <div class="timeline">
    <div class="container left">
      <div class="content">
        <h2>2017</h2>
        <p>2017 회사연혁</p>
        <p>2017 회사연혁</p>
      </div>
    </div>
    <div class="container right">
      <div class="content">
        <h2>2016</h2>
        <p>2016 회사연혁</p>
        <p>2016 회사연혁</p>
      </div>
    </div>
    <div class="container left">
      <div class="content">
        <h2>2015</h2>
        <p>2015 회사연혁</p>
        <p>2015 회사연혁</p>
      </div>
    </div>
    <div class="container right">
      <div class="content">
        <h2>2012</h2>
        <p>2012 회사연혁</p>
        <p>2012 회사연혁</p>
      </div>
    </div>
    <div class="container left">
      <div class="content">
        <h2>2017</h2>
        <p>2017 회사연혁</p>
        <p>2017 회사연혁</p>
      </div>
    </div>
    <div class="container right">
      <div class="content">
        <h2>2016</h2>
        <p>2016 회사연혁</p>
        <p>2016 회사연혁</p>
      </div>
    </div>
  </div>
</div>
        </td>
      </tr>
      <tr>
        <td>
          <!-- <img src="./main_img/img_header.png" alt="" style="width:100%;"> -->
          <div class="profile">             <!-- 남여 프로필카드 -->
            <img src="./main_img/img_header.png" alt="Avatar" style="width:100%">
            <div class="profile_container">
              <h4><b>John Doe</b></h4>
              <p>Architect & Engineer</p>
            </div>
          </div>

        </td>
        <td>
          <!-- <img src="./main_img/img_header.png" alt="" style="width:100%;"> -->
          <div class="profile">             <!-- 남여 프로필카드 -->
            <img src="./main_img/img_header.png" alt="Avatar" style="width:100%">
            <div class="profile_container">
              <h4><b>John Doe</b></h4>
              <p>Architect & Engineer</p>
            </div>
          </div>
        </td>

      </tr>
    </table>       <!-- 그림, 남프, 여프, 로그 -->
  </div>  <!-- main_body_center end -->
  <div class="main_body_product"> <!-- 식당, 숙박, 렌트카, 쇼핑 -->
    <!-- <table>
      <tr>
        <td><img src="./main_img/img_header.png" class="centerproductimg"></td>
        <td><img src="./main_img/img_header.png" class="centerproductimg"></td>
        <td><img src="./main_img/img_header.png" class="centerproductimg"></td>
        <td><img src="./main_img/img_header.png" class="centerproductimg"></td>
      </tr>
    </table> -->
    <ul>
      <li class="centerproduct">맛집</li>
      <li class="centerproduct">숙박</li>
      <li class="centerproduct">렌트카</li>
      <li class="centerproduct">쇼핑</li>
    </ul>
    <ul>
      <li class="centerproduct"><a href="#"><img src="./main_img/img_header.png" class="centerproductimg"></a></li>
      <li class="centerproduct"><a href="#"><img src="./main_img/img_header.png" class="centerproductimg"></a></li>
      <li class="centerproduct"><a href="#"><img src="./main_img/img_header.png" class="centerproductimg"></a></li>
      <li class="centerproduct"><a href="#"><img src="./main_img/img_header.png" class="centerproductimg"></a></li>
    </ul>
  </div> <!-- 식당, 숙박, 렌트카, 쇼핑 end -->

</div>  <!-- main_body end -->

<!-- footer start -->
<div class="footer_bg">
  <div class="footer">
    <ul>
      <li class="footerlist1">회사소개</li>
      <li class="footerlist1">개인정보</li>
      <li class="footerlist1">이용약관</li>
      <li class="footerlist1">채용공고</li>
      <li class="footerlist1">찾아오시는길</li>
    </ul>
    <hr>
    <!-- <table>
      <tr>
        <td><input type="image" src="../image/list_search_button.gif"></td>
        <td>서울 강남구 강남대로 406 (역삼동 820-9 글라스타워) 11,12,16층(135-932) <br>
           상호명 : 듀오정보(주) / 대표자 : 박수경 / 결혼중개업 신고번호 : 강남 080031<br>
           등록번호 : 서울 080079 / 사업자등록번호 : 214-86-28824 통신판매업 신고 : 강남 - 3259호 사업자정보확인<br>
           무료상담전화 : 1577-8333 / Fax : 02-550-6003 / Email : duo@duonet.comCOPYRIGHT 1995~2019 <br>
           @DUOINFO CORP. ALL RIHGT RESERVED</td>
        <td>로고</td>
      </tr>
    </table> -->
    <ul>
      <li class="footerlist2"><input type="image" src="./main_img/lotus_logo_text_black.png"></li>
      <li class="footerlist2">서울 강남구 강남대로 406 (역삼동 820-9 글라스타워) 11,12,16층(135-932) <br>
         상호명 : 듀오정보(주) / 대표자 : 박수경 / 결혼중개업 신고번호 : 강남 080031<br>
         등록번호 : 서울 080079 / 사업자등록번호 : 214-86-28824 통신판매업 신고 : 강남 - 3259호 사업자정보확인<br>
         무료상담전화 : 1577-8333 / Fax : 02-550-6003 / Email : duo@duonet.comCOPYRIGHT 1995~2019 <br>
         @DUOINFO CORP. ALL RIHGT RESERVED</td></li>
      <li class="footerlist2"><input type="image" src="./main_img/lotus_logo_text_black.png"></li>
    </ul>
  </div> <!-- footer end -->
</div>
<!-- footer_bg end -->
  <!-- <script type="text/javascript" src="./js/main.js"></script> -->
</body>

</html>
