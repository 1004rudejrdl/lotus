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
  <link rel="stylesheet" href="./css/a_m_banner_main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
  <script type="text/javascript">
  function change_img_upload0(pic) {
    fileNm = $(pic).val();
    if (fileNm != "") {
      var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
      if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
        alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
        $(pic).val("");
        return;
      }
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#profile_image0").attr("src", e.target.result);
    }
    reader.readAsDataURL(pic.files[0]);
  }
  function change_img_upload1(pic) {
    fileNm = $(pic).val();
    if (fileNm != "") {
      var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
      if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
        alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
        $(pic).val("");
        return;
      }
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#profile_image1").attr("src", e.target.result);
    }
    reader.readAsDataURL(pic.files[0]);
  }
  function change_img_upload2(pic) {
    fileNm = $(pic).val();
    if (fileNm != "") {
      var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
      if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
        alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
        $(pic).val("");
        return;
      }
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#profile_image2").attr("src", e.target.result);
    }
    reader.readAsDataURL(pic.files[0]);
  }
  function change_img_upload3(pic) {
    fileNm = $(pic).val();
    if (fileNm != "") {
      var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
      if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
        alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
        $(pic).val("");
        return;
      }
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#profile_image3").attr("src", e.target.result);
    }
    reader.readAsDataURL(pic.files[0]);
  }
  function change_img_upload4(pic) {
    fileNm = $(pic).val();
    if (fileNm != "") {
      var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
      if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
        alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
        $(pic).val("");
        return;
      }
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#profile_image4").attr("src", e.target.result);
    }
    reader.readAsDataURL(pic.files[0]);
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
         메인 이미지
      </div>
      <hr class="title_hr">
      <form action="a_auth_qurey.php" method="post" name="a_auth_form">
        <table class="admin_table mg_bottom">
          <?php
          $count="";
            for ($i=0; $i <5 ; $i++) {
              if ($i==0) {
                $type="메인 이미지";
              } else {
                $type="서브메인 이미지 $i";
              }
              echo '
                <tr>
                <td class="td_subjet"><span class="td_subjet_star">*</span>'.$type.'</td>
                <td class="tb_cont"><input onchange="change_img_upload'.$i.'(this)" type="file" name="main_img'.$i.'"autofocus></td>
                <td class="tb_thumb"><img id="profile_image'.$i.'"></td>
                </tr>
              ';
            }
          ?>
        </table>
      <hr class="title_hr">
      <div class="btn_center">
        <div class="btn_submit">
          <button type="reset" name="button">취 소</button>
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
