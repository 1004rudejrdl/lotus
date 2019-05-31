<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $mb_num=
  $id=
  $naver=
  $kakao=
  $facebook=
  $google=
  $name=
  $email=
  $tel=
  $birth=
  $gender=
  $black_list=
  $like=
  $matching_day=
  $matching=
  $img="";
  $userid = $_SESSION['userid'];
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
  <link rel="stylesheet" href="../../css/common.css">
  <link rel="stylesheet" href="../css/a_c_info_v_w_e_d.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
</head>

<body>
  <!-- header start -->
  <!-- header end -->
  <!-- main_body start -->

    <div class="main">
      <div class="admin_title">
        <?=$id?>
      </div>
      <hr class="title_hr">
      <table class="admin_table ">
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
          <td class="tb_cont">
            <?=$mb_id?>
          </td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 이  름</td>
          <td class="tb_cont">
            <?=$name?>
          </td>
        </tr>
        <tr>
          <td class="td_subjet"><span class="td_subjet_star">*</span> 성  별</td>
          <td class="tb_cont">
            <?php
              $g=($gender=="0")?("남"):("여");
            ?>
            <?=$g?>
          </td>
        </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 좋아요</td>
            <td class="tb_cont">
              <?=$like?>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 자기 소개</td>
            <td class="tb_cont">
              <?=$self_info?>
            </td>
          </tr>
        </table>
        <hr class="title_hr">

      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <!-- footer_bg end -->
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
