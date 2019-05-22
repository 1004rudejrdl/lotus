<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $mode=
  $com_type=
  $com_num=
  $com_name=
  $com_addr=
  $com_email=
  $com_tel=
  $com_busi_num=
  $com_regist_num="";
  if ((isset($_GET['com_type'])&&!empty($_GET['com_type']))&&
    (isset($_GET['com_num'])&&!empty($_GET['com_num']))) {
      $com_type=test_input($_GET['com_type']);
      $com_num=test_input($_GET['com_num']);

      $sql="SELECT * from `com_info` where `com_type` = '$com_type' and `com_num` = '$com_num';";
        $result = mysqli_query($conn,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($conn));
        }
        $row=mysqli_fetch_array($result);
        $com_type=$row['com_type'];
        $com_num=$row['com_num'];
        $com_name=$row['com_name'];
        $com_postcode=$row['com_postcode'];
        $com_address=$row['com_address'];
        $com_detailAddress=$row['com_detailAddress'];
        $com_extraAddress=$row['com_extraAddress'];
        $com_addr=$com_postcode." ".$com_address." ".$com_detailAddress." ".$com_extraAddress;
        $com_email=$row['com_email'];
        $com_tel=$row['com_tel'];
        $com_busi_num=$row['com_busi_num'];
        $com_regist_num=$row['com_regist_num'];

  }

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_c_info_v_w_e_d.css">
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
        등록 업체 관리
      </div>
      <hr class="title_hr">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 업체 구분</td>
            <?php
            if($com_type=='e_'){
              echo '<td class="tb_cont">맛집/체험</td>';
            } elseif ($com_type=='a_') {
              echo '<td class="tb_cont">숙박</td>';
            } elseif ($com_type=='c_') {
              echo '<td class="tb_cont">렌트카</td>';
            } elseif ($com_type=='s_') {
              echo '<td class="tb_cont">쇼핑몰</td>';
            }
            ?>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 상호/대표자</td>
            <td class="tb_cont"><?=$com_name?></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 사업장 소재지</td>
            <td class="tb_cont"><?=$com_addr?></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 업체 이메일</td>
            <td class="tb_cont"><?=$com_email?></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 연 락 처</td>
            <td class="tb_cont"><?=$com_tel?></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 사업자 번호</td>
            <td class="tb_cont"><?=$com_busi_num?></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 통신판매업 신고번호</td>
            <td class="tb_cont"><?=$com_regist_num?></td>
          </tr>
        </table>
        <hr class="title_hr">
        <div class="btn_center">
          <div class="btn_submit btn_4">
            <a href='a_c_info_w_e_d.php?mode=update_com_info&com_type=<?=$com_type?>&com_num=<?=$com_num?>'>수 정</a>
            <a href='delete_a_c_info.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>'>삭 제</a>
          </div>
        </div>

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
