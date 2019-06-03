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
        $height=$row['height'];
        $job=$row['job'];
        if($job==1){
          $job="무직";
        }else if($job==2){
          $job="공무원";
        }else if($job==3){
          $job="학생";
        }else if($job==4){
          $job="자영업";
        }else if($job==5){
          $job="직장인";
        }

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
  <link rel="stylesheet" href="../css/meeting_pop.css">
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
      <table class="admin_title">
        <tr>
          <td class="mt_img"><img src="../../mb_login/<?=$img?>" alt="<?=$id?>" onclick="show_member('<?=$id?>')"></td>
        </tr>
        <tr>
          <td>
            <h3><?=$name?></h3>
          </td>
        </tr>
        <tr>
          <td>
            <?=$job?>
          </td>
        </tr>
        <tr>
          <td>
            키 :<?=$height?><br>
            좋아요 <label id="like_num<?=$i?>"><?=$like?></label><input type="hidden" id="hidden_like" name="hidden_like" value="<?=$like?>">
              <input type="hidden" class="vote_who" id="vote_who<?=$i?>" name="vote_who" value="<?=$id?>">
              <input type="hidden" class="flag_like" id="flag_like" name="flag_like" value="">
              <input type="image" src="../img/like.png" style="width:25px;height:25px;" onclick="javascript:like(<?=$i?>);" class="button_like" id="button_like<?=$i?>" name="button_like" value="">
          </td>
        </tr>
        <tr>
          <td>
            <?=$self_info?>
          </td>
        </tr>
        <tr>
          <td><button class="button" onclick="javascript:send_mail('<?=$id?>');">Contact</button></td>
        </tr>
      </table>

        <hr class="title_hr">


    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <!-- footer_bg end -->
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
