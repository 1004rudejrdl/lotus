<!-- 권한 관리 메인 -->
<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_mb_mt_main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div id="main_body" class="main_body">
    <div id="sidenav" class="sidenav">
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav_admin_link.php"; ?>
    </div><!-- sidenav end -->

    <div class="main">
      <div class="admin_title">
         회원/매칭 관리
      </div>
      <hr class="title_hr">
      <form action="a_auth_qurey.php" method="post" name="a_auth_form">
        <table class="admin_table witdh_100">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 회원 검색&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="Recipient_id" class="div_none" placeholder="ex)" autofocus>
            </td>
          </tr>
        </table>
        <table class="admin_table ">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 회원 번호</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) jsa0jsa@naver.com"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 신 혜 지"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 네이버 아이디</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 09:00~18:00"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 카카오 아이디</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 384SB신방빌딩"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 페이스북 아이디</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 구글 아이디</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 미래 은행"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이  름</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 전화번호</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 생  일</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 성  별</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 키</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 우편번호</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 우편상세주소</td>
            <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
          </tr>
          </table>
          <table class="admin_table">
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 회원 구분</td>
              <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 주식회사 lotus" autofocus></td>
            </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 블랙리스트여부</td>
              <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 김 경 덕"  autofocus></td>
            </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 좋아요</td>
              <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 성북구 신방빌딩"  autofocus></td>
            </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 매칭 일자</td>
              <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
            </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 매칭 상대</td>
              <td class="tb_cont"><input type="text" name="product_num" class="div_none" placeholder="ex) 050-3495-1923"  autofocus></td>
            </tr>
          </table>
          <table class="admin_table">
            <tr>
              <td colspan="2"class="td_subjet"><span class="td_subjet_star">*</span> 회원 이미지</td>
            </tr>
            <tr>
              <td colspan="2"><img src="../main_img/unicon1.png" alt=""> </td>
            </tr>
          </table>
          <table class="admin_table witdh_100 mb_bottom">
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 자기 소개</td>
            </tr>
            <tr>
              <td class="tb_cont">
                <textarea name="product_num" class="div_none" placeholder="ex) 회사소개"  autofocus rows="8"></textarea>
              </td>
            </tr>
          </table>
      <hr class="title_hr">
      <div class="btn_center">
        <div class="btn_submit">
          <button type="reset" name="button">취 소</button>
          <button type="submit" name="button" onclick="check_input()">수 정</button>
          <button type="submit" name="button" onclick="check_input()">확 인</button>
        </div>
      </div>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
</body>

</html>
