<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $mode="insert_a_auth";
  $admin_id=
  $admin_pass=
  $admin_name=
  $admin_email_f=
  $admin_email_b=
  $auth_mb=
  $auth_mt=
  $auth_ra=
  $auth_sh=
  $auth_tt=
  $admin_commu="";

  if((isset($_GET['mode'])&&!empty($_GET['mode']))&&$_GET['mode']=="update_a_auth"){
      if ((isset($_GET['id'])&&!empty($_GET['id']))) {
          $mode=test_input($_GET['mode']);
          $id=test_input($_GET['id']);

          $sql="SELECT * from `admin_authority` where `id` = '$id';";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
              die('Error: ' . mysqli_error($conn));
            }
            $row=mysqli_fetch_array($result);
            $admin_id=$row['id'];
            $admin_pass=$row['passwd'];
            $admin_name=$row['name'];
            $auth_meeting=$row['auth_meeting'];
            $auth_ra=$row['auth_ra'];
            $auth_shop=$row['auth_shop'];
            $auth_test=$row['auth_test'];
            $auth_commu=$row['auth_commu'];
            $auth_member=$row['auth_member'];

      }
  }
  ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_auth_v_w_e_d.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
  <script type="text/javascript">
    function check_email() {
      window.open("./lib/check_email.php", "IDEmail", "left=200, top=200, width=900, height=550, scrollbars=no, resizable=no");
    }
    function SetEmailTail(emailValue) {
      var email = document.all("email") // 사용자 입력
      var emailTail = document.all("email2") // Select box

      if (emailValue == "notSelected") {
        return;
      } else if (emailValue == "etc") {
        emailTail.readOnly = false;
        emailTail.value = "";
        emailTail.focus();
      } else {
        emailTail.readOnly = true;
        emailTail.value = emailValue;
      }
    }
    function check_input(){
    }
  </script>
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
        <?php if($mode=="update_a_auth") {?>
          관리자 권한 수정
        <?php }else{ ?>
          관리자 권한 등록
        <?php } ?>
      </div>
      <hr class="title_hr">
      <?php if($mode=="update_a_auth") {?>
      <form action="./update_a_auth.php" method="post" name="a_auth_form">
      <?php }else{ ?>
      <form action="./insert_a_auth.php" method="post" name="a_auth_form">
      <?php } ?>
        <input type="hidden" name="mode" value="<?=$mode?>">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
            <td class="tb_cont"><input type="text" name="admin_id" placeholder="ex)영문, 숫자만 가능" autofocus value="<?=$admin_id?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 비밀번호</td>
            <td class="tb_cont"><input type="password" placeholder="ex)영문, 숫자 특수문자 조합" autofocus value="<?=$admin_pass?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 비밀번호 확인</td>
            <td class="tb_cont"><input type="password" name="admin_pass" placeholder="ex)영문, 숫자 특수문자 조합" autofocus value="<?=$admin_pass?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
            <td class="tb_cont"><input type="text" name="admin_name" placeholder="ex)한글만 가능" autofocus value="<?=$admin_name?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 권 한</td>
            <td>
              <label class="tb_container">&nbsp;멤버관리&nbsp;
                <?php
                if ($mode=="update_a_auth"&&!empty($auth_member)) {
                ?>
                <input type="checkbox" name="auth_mb" value="y" checked>
                <?php
                } else {
                ?>
                <input type="checkbox" name="auth_mb" value="y">
                <?php
                }
                ?>
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;연인찾기&nbsp;
                <?php
                if ($mode=="update_a_auth"&&!empty($auth_meeting)) {
                ?>
                <input type="checkbox" name="auth_mt" value="y" checked>
                <?php
                } else {
                ?>
                <input type="checkbox" name="auth_mt" value="y">
                <?php
                }
                ?>
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;추천/예약&nbsp;
                <?php
                if ($mode=="update_a_auth"&&!empty($auth_ra)) {
                ?>
                <input type="checkbox" name="auth_ra" value="y" checked>
                <?php
                } else {
                ?>
                <input type="checkbox" name="auth_ra" value="y">
                <?php
                }
                ?>
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;쇼핑몰&nbsp;
                <?php
                if ($mode=="update_a_auth"&&!empty($auth_shop)) {
                ?>
                <input type="checkbox" name="auth_sh" value="y" checked>
                <?php
                } else {
                ?>
                <input type="checkbox" name="auth_sh" value="y">
                <?php
                }
                ?>
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;테스트&nbsp;
                <?php
                if ($mode=="update_a_auth"&&!empty($auth_test)) {
                ?>
                <input type="checkbox" name="auth_tt" value="y" checked>
                <?php
                } else {
                ?>
                <input type="checkbox" name="auth_tt" value="y">
                <?php
                }
                ?>
                <span class="tb_checkmark"></span>
              </label>
              <label class="tb_container">&nbsp;커뮤니티&nbsp;
                <?php
                if ($mode=="update_a_auth"&&!empty($auth_commu)) {
                ?>
                <input type="checkbox" name="auth_commu" value="y" checked>
                <?php
                } else {
                ?>
                <input type="checkbox" name="auth_commu" value="y">
                <?php
                }
                ?>
                <span class="tb_checkmark"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
            <td class="tb_cont btn_ch_email">
              <input type="text" id="confirmed_email1" name="confirmed_email1" value="<?=$admin_email_f?>" placeholder="X버튼을 누른 뒤 인증하세요" readonly required />@
              <input type="text" id="confirmed_email2" name="confirmed_email2" value="<?=$admin_email_b?>" placeholder="관리자 인증이 필요합니다"ReadOnly required />
              <a name="check_button_anchor">
                <img name="check_button" id="check_button" src="./img/none_check_email.png" onclick="check_email()">
              </a>
            </td>
          </tr>
        </table>
        <hr class="title_hr">
        <div class="btn_center">
        <?php
        if ($mode=="update_a_auth") {
        ?>
          <div class="btn_submit btn_3">
            <a href="./a_auth_main.php" >취 소</a>
            <a href='delete_a_auth.php?id=<?=$admin_id?>'>삭 제</a>
            <button type="submit" name="button">수 정</button>
          </div>
        <?php
        } else {
        ?>
          <div class="btn_submit btn_2">
            <a href="./a_auth_main.php" >취 소</a>
            <button type="submit" name="button">등 록</button>
          </div>
        <?php
        }
        ?>
        </div>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
