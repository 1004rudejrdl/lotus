<?php
  session_start();
  include '../lib/db_connector.php';
  $userid=$_SESSION['userid'];
  $username=$_SESSION['name'];
  $sql="SELECT * FROM member WHERE `id`='$userid'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $row=mysqli_fetch_array($result);
  $id=$row['id'];
  $name=$row['name'];
  $tel=$row['tel'];
  $gender=$row['gender'];
  if($gender==0){
    $gender="남성";
  }else if($gender==1){
    $gender="여성";
  }
  $birth=$row['birth'];
  $month=substr($birth, 0,2);
  $day=substr($birth, 2,2);
  $year=substr($birth, -4);
  $birth=$year."년".$month."월".$day."일";
  $sql="SELECT * FROM member_meeting WHERE `id`='$userid'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $row=mysqli_fetch_array($result);
  $height=$row['height'];
  $weight=$row['weight'];
  $img=$row['img'];
  $self_info=$row['self_info'];
  $len_self_info=strlen($row['self_info']);

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="../css/img_re.css">
  <link rel="stylesheet" href="./css/user.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function delete_id() {
      var popupX = (window.screen.width/2)-(600/2);
     var popupY = (window.screen.height/2)-(400/2);
     window.open('./alert_delete.php','','left='+popupX+',top='+popupY+', width=300, height=200, status=no, scrollbars=no');
    }
  </script>
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a >회원정보창</a>
  <a href="../message/message.php">우편함</a>
  <a href="../mb_login/mb_modify_form.php">회원정보수정</a>
  <a href="../sh_man/shopping_basket.php?mode_user=user_page">장바구니</a>
  <a href="../sh_man/shopping_payment.php?mode_user=user_page">주문/결제목록</a>
</div><!-- sidenav end -->

<div class="main">
  <div class="admin_title">
    <?=$userid?>님의 정보
  </div>
  <hr class="title_hr first_hr">
  <div class="user_info_div">
    <div class="usr_img_div">
      <img src="../mb_login/<?=$img?>" alt="profile_img">
    </div>
    <table class="user_tb">
      <tr>
        <td rowspan="6" class="img_td "><img src="../mb_login/<?=$img?>" alt="profile_img"> </td>
      </tr>
      <tr>
        <td class="td_subjet"><span class="td_subjet_star">*</span> 아 이 디</td>
        <td class="tb_cont"><?=$id?></td>
        <td class="td_subjet"><span class="td_subjet_star">*</span> 이 름</td>
        <td class="tb_cont"><?=$name?></td>
      </tr>
      <tr>
        <td class="td_subjet"><span class="td_subjet_star">*</span> 성 별</td>
        <td class="tb_cont"><?=$gender?></td>
        <td class="td_subjet"><span class="td_subjet_star">*</span> 생년월일</td>
        <td class="tb_cont"><?=$birth?></td>
      </tr>
      <tr>
        <td class="td_subjet"><span class="td_subjet_star">*</span> 신 장</td>
        <td class="tb_cont"><?=$height?>cm</td>
        <td class="td_subjet"><span class="td_subjet_star">*</span> 체 중</td>
        <td class="tb_cont"><?=$weight?>kg</td>
      </tr>
      <tr>
        <td colspan="4">자기소개</td>
      </tr>
      <tr>
        <td colspan="4" >
          <?php
          define('T_SCALE',40);
          if($len_self_info>0) {
            for ($i=0; $i< $len_self_info/T_SCALE ; $i++) {
              $self_info_sub=mb_substr($self_info, $i*T_SCALE, $i*T_SCALE+T_SCALE, 'utf-8');
              $self_info_echo=$self_info_sub."<br>";
              echo nl2br($self_info_echo);
            }
          }
          ?>
        </td>
      </tr>
    </table>
  </div>
  <hr class="title_hr">
  <div class="admin_title">
    나와 매칭 된 사람
  </div>
  <hr class="title_hr">
  <?php
  define('SCALE', 4);
  $sql="SELECT*FROM member_meeting WHERE `id`='$userid'and `matching`like'%'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $rowcount=mysqli_num_rows($result);
  $total_page=($rowcount % SCALE == 0 )?
  ($rowcount/SCALE):(ceil($rowcount/SCALE));
  //2.페이지가 없으면 디폴트 페이지 1페이지
  $page=(!isset($_GET['page']))?(1):(test_input($_GET['page']));

  //3.현재페이지 시작번호계산함.
  $start=($page -1) * SCALE;
  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $rowcount - $start;
  for ($i = $start; $i < $start+SCALE && $i<$rowcount; $i++){
    mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $id=$row['matching'];
    $matching_day=$row['matching_day'];
    $sql="SELECT *FROM member WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    mysqli_data_seek($result,$i);
    $row1=mysqli_fetch_array($result);
    $name=$row1['name'];
    $tel=$row1['tel'];
    $sql="SELECT * FROM member_meeting WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    mysqli_data_seek($result,$i);
    $row2=mysqli_fetch_array($result);
    $img=$row2['img'];
    $job=$row2['job'];
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
    $height=$row2['height'];
    $weight=$row2['weight'];
    $self_info=$row2['self_info'];
    ?>
    <table class="matched_user_tb">
      <tr>
        <td class="mt_img"><img id="match_card_img<?=$i?>" src="../mb_login/<?=$img?>" alt="<?=$id?>"></td>
      </tr>
      <tr>
        <td id="match_card_name<?=$i?>"><?=$name?></td>
      </tr>
      <tr>
        <td id="match_card_job<?=$i?>"><?=$job?></td>
      </tr>
      <tr>
        <td><span>키 :</span> <span id="match_card_hei<?=$i?>"><?=$height?></span><span>체중 : </span> <span id="match_card_wei<?=$i?>"><?=$weight?></td>
      </tr>
      <tr>
        <td id="match_card_self<?=$i?>"><?=$self_info?></td>
      </tr>
      <tr>
        <td><button class="button" onclick="javascript:send_mail('<?=$id?>');">Contact</button></td>
      </tr>
      <tr>
        <td class="bottom_none">전화번호</td>
      </tr>
      <tr>
        <td class="top_none"><span id="match_card_tel<?=$i?>"><?=$tel?></td>
      </tr>
    </table>
  <?php
}//end of for in php
// if(!isset($_GET['page'])||$page==1){
//   echo "<img id='match_left_button' src='./img/right_button.png' alt='right_button' >";
// }else if(isset($_GET['page'])&&$page!=$total_page){
//   echo "<img id='match_left_button' src='./img/left_button.png' alt='left_button'>";
//   echo "<img id='match_right_button' src='./img/right_button.png' alt='right_button' >";
// }else if($page==$total_page){
//   echo "<img id='match_left_button' src='./img/left_button.png' alt='left_button'>";
// }
?>
<script type="text/javascript">
function send_mail(m) {
  var popupX = (window.screen.width/2)-(600/2);
 var popupY = (window.screen.height/2)-(400/2);
 window.open('../message/message_form.php?id='+m,'','left='+popupX+',top='+popupY+', width=500, height=400, status=no, scrollbars=no');
}
</script>
<!-- <img id="match_left_button" src="./img/left_button.png" alt="left_button">
<img id="match_right_button" src="./img/right_button.png" alt="right_button" > -->
<?php
  if ($total_page) {
    echo '<hr class="title_hr">';
  }
 ?>

<div>
  <div class="admin_title">
    나에게 좋아요를 눌러준 사람
  </div>
  <hr class="title_hr">
  <?php
  $sql="SELECT * FROM member_like WHERE `id`='$userid'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $like_me_count=mysqli_num_rows($result);
  $total_page=($like_me_count % SCALE == 0 )?
  ($like_me_count/SCALE):(ceil($like_me_count/SCALE));
  //2.페이지가 없으면 디폴트 페이지 1페이지
  $like_page=(!isset($_GET['page']))?(1):(test_input($_GET['page']));

  //3.현재페이지 시작번호계산함.
  $like_start=($like_page -1) * SCALE;
  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $like_me_count - $like_start;
  $count1=$count2=0;
  for ($i = $like_start; $i < $like_start+SCALE && $i<$like_me_count; $i++){
    mysqli_data_seek($result,$i);
      $row=mysqli_fetch_array($result);
    $like_me=$row['vote_id'];
    $sql1="SELECT * FROM member WHERE `id`='$like_me'";
    $result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));



    $row1=mysqli_fetch_array($result1);
    $name=$row1['name'];
    $tel=$row1['tel'];

    $sql2="SELECT * FROM member_meeting WHERE `id`='$like_me'";
    $result2=mysqli_query($conn,$sql2)or die(mysqli_error($conn));



    $row2=mysqli_fetch_array($result2);
    $img=$row2['img'];
    $job=$row2['job'];
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
    $height=$row2['height'];
    $weight=$row2['weight'];
    $self_info=$row2['self_info'];
    ?>
    <table class="matched_user_tb">
      <tr>
        <td class="mt_img"><img id="like_card_img<?=$i?>" src="../mb_login/<?=$img?>" alt="<?=$like_me?>"></td>
      </tr>
      <tr>
        <td><span id="like_card_name<?=$i?>"><?=$name?></span></td>
      </tr>
      <tr>
        <td><span id="like_card_job<?=$i?>"><?=$job?></span></td>
      </tr>
      <tr>
        <td><span>키 :</span> <span id="like_card_hei<?=$i?>"><?=$height?></span><span>체중 : </span> <span id="like_card_wei<?=$i?>"><?=$weight?></td>
      </tr>
      <tr>
        <td><span id="like_card_self<?=$i?>"><?=$self_info?></span></td>
      </tr>
      <tr>
        <td><button class="button" onclick="javascript:send_mail('<?=$like_me?>');">Contact</button></td>
      </tr>
      <tr>
        <td class="bottom_none">전화번호</td>
      </tr>
      <tr>
        <td class="top_none"><span id="like_card_tel<?=$i?>"><?=$tel?></td>
      </tr>
    </table>
    <?php
  }
  if ($total_page) {
    ?>
   <div class="page_to">
     <div class="page_to_in">
       <a href="./user.php?page=1">◀◀</a>
       <?php
            if ($like_page>1) {
                  $page_go=$like_page-1;
                   echo '<a class="previous" href="./user.php?page='.$page_go.'">이전 ◀</a>';
                 }else {
                   echo '<a class="previous" href="./user.php?page=1">이전 ◀</a>';
                 }
                 for ($i=1; $i <= $total_page ; $i++) {
                   if($like_page==$i){
                     echo "<a>&nbsp;$i&nbsp;</a>";
                   }else{
                     //싱글쿼테이션은 문자로 인식하지 않는다
                     //더블은 문자로 인식
                     echo "<a href='./user.php?page=$i'>&nbsp;$i&nbsp;</a>";
                   }
                 }
                 if ($total_page==0) {
                   echo '<a class="next" href="./user.php?page=1">▶ 다음</a>';
                 }elseif ($like_page+1>$total_page) {
                   $page_end=$total_page;
                   echo '<a class="next" href="./user.php?page='.$page_end.'">▶ 다음</a>';
                 }else{
                   $page_go=$page+1;
                   echo '<a class="next" href="./user.php?page='.$page_go.'">▶ 다음</a>';
                 }
                 ?>
       <a href="./user.php?page=<?=$total_page?>">▶▶</a>
     </div> <!-- page_to in end 페이지 이동 -->
</div>
<?php
}
?>
<!-- <img id="like_left_button" src="./img/left_button.png" alt="like_left_button">
<img id="like_right_button" src="./img/right_button.png" alt="like_right_button">  -->
<?php
  if ($total_page) {
    echo '<hr class="title_hr">';
  }
 ?>
<div class="iframes">
  <iframe src="../sh_man/user_shopping_basket.php"></iframe>
  <iframe src="../sh_man/user_shopping_payment.php"></iframe>
</div>
  <hr class="title_hr">
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
