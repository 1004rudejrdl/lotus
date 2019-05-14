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
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_top.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>

<body>
  <!-- header start -->
  <div class="header-top">
    <div id="navbar" class="topnav sticky">
      <!-- id for sticky -->
      <div class="dropdown logo_center">
        <button class="logo"><a href="../index.php"> <img id="navbar_img" src="../main_img/lotus_logo_text_black.png" alt=""></a></button>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          <a>ABOUT&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>ABOUT COMPANY</h2>
          </div> <!-- header -->
          <div class="row">
            <div class="column">
              <h3>회사소개</h3>
              <a href="../about_company/brandstory.php">Brand Story 브랜드스토리</a>
              <a href="../about_company/ceo.php">CEO 대표</a>
              <a href="../about_company/history.php">History 연혁</a>
              <a href="../about_company/com_location.php">Location 오시는 길</a>
            </div> <!-- column -->
            <div class="column">
              <h3>사업소개</h3>
              <a href="../about_chain/chain_intro.php">가맹소개</a>
              <a href="../about_chain/chain_inquiry.php">가맹문의</a>
              <a href="../about_chain/chain_apply.php">가맹신청</a>
            </div> <!-- column -->
            <div class="column">
              <h3>매장찾기</h3>
              <a href="../about_search_chain/search_chain.php">매장찾기</a>
            </div> <!-- column -->
            <div class="column">
              <h3>회사소식</h3>
              <a href="../about_com_notice/com_ann.php">공지사항</a>
              <a href="../about_com_notice/com_event.php">이벤트</a>
              <a href="../about_com_notice/social_attr.php">사회공헌</a>
            </div> <!-- column end -->
          </div> <!-- row end -->
        </div> <!-- dropdown-content end -->
      </div> <!-- dropdown end -->
      <div class="dropdown">
        <button class="dropbtn">
          <a>CUSTOMER SERVICE&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>CUSTOMER SERVICE</h2>
          </div> <!-- header -->
          <div class="row">
            <div class="column">
              <h3>다운로드</h3>
              <a href="../service_download/manual.php">설명서 다운로드</a>
              <a href="../service_download/software.php">소트프웨어 다운로드</a>
              <a href="../service_download/driver.php">드라이버 다운로드</a>
            </div> <!-- column -->
            <div class="column">
              <h3>서비스센터</h3>
              <a href="../service_center/serv_anno.php">공지사항</a>
              <a href="../service_center/search_center.php">전국 지점 찾기</a>
              <a href="../service_center/visit_serv_apply.php">방문 서비스 신청</a>
            </div> <!-- column -->
            <div class="column">
              <h3>고객의 소리</h3>
              <a href="../service_customer/cus_praise.php">칭찬 게시판</a>
              <a href="../service_customer/cus_complain/cus_complain_main.php">민원 게시판</a>
              <a href="../service_customer/cus_qna.php">질문 게시판</a>
            </div> <!-- column -->
          </div> <!-- row -->
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown">
        <button class="dropbtn">
          <a>RECRUIT&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content alignR">
          <div class="header">
            <h2>RECRUIT</h2>
          </div> <!-- header -->
          <div class="row">
            <div class="column">
              <h3>직무안내</h3>
              <a href="../recruit_job/job_intro.php">직무소개</a>
              <a href="../recruit_job/job_story.php">직무스토리</a>
              <a href="../recruit_job/job_partner.php">COMPANY人</a>
            </div> <!-- column -->
            <div class="column">
              <h3>채용안내</h3>
              <a href="../recruit_recr_notice/recr_news.php">채용소식</a>
              <a href="../recruit_recr_notice/candidate.php">인재상</a>
              <a href="../recruit_recr_notice/welfare.php">복리후생</a>
            </div> <!-- column -->
            <div class="column">
              <h3>인재지원</h3>
              <a href="../recruit_apply/rec_ap_ann.php">공지사항</a>
              <a href="../recruit_apply/upload_submit/upload_submit_main.php">이력서 제출</a>
              <a href="../recruit_apply/submit.php">이력서 작성</a>
            </div> <!-- column -->
          </div> <!-- row -->
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown ">
        <?php
          $url_board=(isset($_SESSION['userid']))?("../board_member/mem_free_bd/mem_free_bd_main.php"):("../board_guest/op_free_bd/op_free_bd_main.php");
        ?>
        <button class="dropbtn">
          <a>BOARD&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>COMMUTE BOARD</h2>
          </div> <!-- header -->
          <div class="row">
            <div class="column">
              <h3>회원전용</h3>
              <a href="../board_member/mem_free_bd/mem_free_bd_main.php">자유게시판</a>
              <a href="../board_member/mem_comunity.php">커뮤니티</a>
              <a href="../board_member/mem_ad.php">홍보</a>
            </div> <!-- column -->
            <div class="column">
              <h3>공개게시판</h3>
              <a href="../board_guest/op_free_bd/op_free_bd_main.php">자유게시판</a>
              <a href="../board_guest/memo/memo_main.php">한줄메모</a>
            </div> <!-- column -->
          </div> <!-- row -->
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <!-- <div class="dropdown dd_right">
        <button class="logo"><a href="../index.php"> <img src="../main_img/lotus_logo_img2.png"></a></button>
      </div> -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="../index.php">LOGIN</a></button>
      </div> <!-- dropdown -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="../index.php">JOIN</a></button>
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

  <!-- main_body start -->
<div class="main_body">
  <div id="sidenav" class="sidenav">
    <a href="#about">About</a>
    <a href="#services">Services</a>
    <a href="#clients">Clients</a>
    <a href="#contact">Contact</a>
  </div><!-- sidenav end -->
  <div class="main">
    <h2>Auto Sidebar</h2>
    <p>This sidebar is as tall as its content (the links), and is always shown.</p>
    <p>Scroll down the page to see the result.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
    <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
  </div>  <!-- main end -->
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
      <li class="footerlist2"><input type="image" src="../main_img/lotus_logo_text_black.png"></li>
      <li class="footerlist2">서울 강남구 강남대로 406 (역삼동 820-9 글라스타워) 11,12,16층(135-932) <br>
         상호명 : 듀오정보(주) / 대표자 : 박수경 / 결혼중개업 신고번호 : 강남 080031<br>
         등록번호 : 서울 080079 / 사업자등록번호 : 214-86-28824 통신판매업 신고 : 강남 - 3259호 사업자정보확인<br>
         무료상담전화 : 1577-8333 / Fax : 02-550-6003 / Email : duo@duonet.comCOPYRIGHT 1995~2019 <br>
         @DUOINFO CORP. ALL RIHGT RESERVED</td></li>
      <li class="footerlist2"><input type="image" src="../main_img/lotus_logo_text_black.png"></li>
    </ul>
  </div> <!-- footer end -->
</div>
<!-- footer_bg end -->
  <!-- <script type="text/javascript" src="../js/main.js"></script> -->
</body>

</html>
