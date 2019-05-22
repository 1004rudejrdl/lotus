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
  <link rel="stylesheet" href="./css/a_auth_main.css">
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
         권한 등록/관리
      </div>
      <hr class="title_hr">
      <form action="a_auth_qurey.php" method="post" name="a_auth_form">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
            <td class="tb_cont"><input type="text" name="admin_id" class="div_none" placeholder="ex)영문, 숫자만 가능" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 비밀번호</td>
            <td class="tb_cont"><input type="password" name="admin_pass" class="div_none" placeholder="ex)영문, 숫자 특수문자 조합" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 비밀번호 확인</td>
            <td class="tb_cont"><input type="password" name="admin_pass" class="div_none" placeholder="ex)영문, 숫자 특수문자 조합" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
            <td class="tb_cont"><input type="text" name="admin_name" class="div_none" placeholder="ex)한글만 가능" autofocus></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 권 한</td>
            <td>
              <label class="tb_container">&nbsp;멤버관리&nbsp;
                <input type="checkbox" name="auth_mb" value="auth_mb">
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;이성찾기&nbsp;
                <input type="checkbox" name="auth_mt" value="auth_mt">
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;추천/예약&nbsp;
                <input type="checkbox" name="auth_ra" value="auth_ar">
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;쇼핑몰&nbsp;
                <input type="checkbox" name="auth_sh" value="auth_sh">
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;테스트&nbsp;
                <input type="checkbox" name="auth_tt" value="auth_tt">
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;커뮤니티&nbsp;
                <input type="checkbox" name="auth_commu" value="auth_commu">
                <span class="tb_checkmark"></span>
              </label>
            </td>
          </tr>
        </table>
        <hr class="title_hr">
        <div class="btn_center">
          <input class="btn_submit" id="btn_submit" type="button" onclick="check_input()" value="확  인">
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
