<!-- 권한 관리 메인 -->
<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
$mb_num="";
$id="";
$naver="";
$kakao="";
$facebook="";
$google="";
$name="";
$email="";
$tel="";
$birth="";
$gender="";
$postcode="";
$address="";
$detailAddress="";
$extraAddress="";
$mb_addr="";
$black_list="";
$like="";
$matching_day="";
$matching="";
$img="";
if ((isset($_GET['id'])&&!empty($_GET['id']))) {
    $id=test_input($_GET['id']);

    $sql="SELECT * from `member` where `id` = '$id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);
      $mb_num=$row['mb_num'];
      $mb_id=$row['id'];
      $name=$row['name'];
      $email=$row['email'];
      $tel=$row['tel'];
      $birth=$row['birth'];
      $gender=$row['gender'];
      $postcode=$row['postcode'];
      $address=$row['address'];
      $detailAddress=$row['detailAddress'];
      $extraAddress=$row['extraAddress'];
      $mb_addr=$detailAddress." ".$extraAddress;
      $black_list=$row['black_list'];
      $naver=$row['naver'];
      $kakao=$row['kakao'];
      $facebook=$row['facebook'];
      $google=$row['google'];

    $sql="SELECT * from `member_meeting` where `id` = '$id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);
      $self_info=$row['self_info'];
      $img=$row['img'];
      $matching=$row['matching'];
      $matching_day=$row['matching_day'];

    $sql="SELECT * from `member_like` where `id` = '$id';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $like=mysqli_num_rows($result);
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_mb_mt_v_e_d.css">
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
         회원/매칭 수정
      </div>
      <hr class="title_hr">
        <form action="update_a_mb_mt.php" method="post" name="a_mb_mt_form">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 회원 번호</td>
            <td class="tb_cont">
              <input type="text" name="mb_num" autofocus value="<?=$mb_num?>" readonly>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
            <td class="tb_cont"><input type="text" name="id" autofocus value="<?=$mb_id?>" readonly></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 네이버 아이디</td>
            <td class="tb_cont"><input type="text" name="naver" autofocus value="<?=$naver?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 카카오 아이디</td>
            <td class="tb_cont"><input type="text" name="kakao" autofocus value="<?=$kakao?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 페이스북 아이디</td>
            <td class="tb_cont"><input type="text" name="facebook" autofocus value="<?=$facebook?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 구글 아이디</td>
            <td class="tb_cont"><input type="text" name="google" autofocus value="<?=$google?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이  름</td>
            <td class="tb_cont"><input type="text" name="name" autofocus value="<?=$name?>"></td>
          </tr>
        </table>
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 이 메 일</td>
            <td class="tb_cont"><input type="text" name="email" autofocus value="<?=$email?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 전화번호</td>
            <td class="tb_cont"><input type="text" name="tel" autofocus value="<?=$tel?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 생  일</td>
            <td class="tb_cont"><input type="text" name="birth" autofocus value="<?=$birth?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 성  별</td>
            <?php

              $m=($gender=="0")?("selected"):("");
              $w=($gender=="1")?("selected"):("");
            ?>
            <td class="tb_cont">
              <select class="" name="gender">
                <option value="0" <?=$m?>>남</option>
                <option value="1" <?=$w?>>여</option>
              </select>
              
            </td>
          </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 블랙리스트여부</td>
              <td class="tb_cont">
                <label class="tb_container">
                  <?php
                  if ($black_list=='1') {
                  ?>
                  <input type="checkbox" name="black_list" value="1" checked>
                  <?php
                  } else {
                  ?>
                  <input type="checkbox" name="black_list" value="1">
                  <?php
                  }
                  ?>
                  <span class="tb_checkmark"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 매칭 일자</td>
              <td class="tb_cont"><input type="text" name="matching_day" autofocus value="<?=$matching_day?>"></td>
            </tr>
            <tr>
              <td class="td_subjet"><span class="td_subjet_star">*</span> 매칭 상대</td>
              <td class="tb_cont"><input type="text" name="matching" autofocus value="<?=$matching?>"></td>
            </tr>
          </table>

      <hr class="title_hr">
      <div class="btn_center">
        <div class="btn_submit btn_3">
          <a href="./a_mb_mt_main.php" >취 소</a>
          <a href='delete_a_mb_mt.php?id=<?=$id?>'>삭 제</a>
          <button type="submit" name="button">완 료</button>
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
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
