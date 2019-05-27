<?php
session_start();
include '../lib/db_connector.php';
$userid=$_SESSION['userid'];
$name=$_SESSION['name'];
$sql="SELECT*FROM member_meeting WHERE `id`='$userid'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$total_record="";
if(empty($rowcount)){
  echo "<script>alert('회원님께서는 아직 매칭된 회원이 아직없습니다.');</script>";
}
//1.전체페이지, 2.디폴트페이지, 3.현재페이지 시작번호 4.보여줄리스트번호
//1.전체페이지
define('SCALE', 10);
$total_page=($total_record % SCALE == 0 )?
($total_record/SCALE):(ceil($total_record/SCALE));
//2.페이지가 없으면 디폴트 페이지 1페이지
$page=(!isset($_GET['page']))?(1):(test_input($_GET['page']));

//3.현재페이지 시작번호계산함.
$start=($page -1) * SCALE;
//4. 리스트에 보여줄 번호를 최근순으로 부여함.
$number = $total_record - $start;
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <!-- <link rel="stylesheet" href="../css/join.css"> -->
    <link rel="stylesheet" href="../css/header_sidenav.css">
    <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <title></title>
  </head>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div class="main_body">
  <div id="sidenav" class="sidenav">
    <a href="#about">추천/예약</a>
    <a href="#services">맛집</a>
    <a href="#clients">숙박</a>
    <a href="#contact">렌트카</a>
  </div><!-- sidenav end -->
  <div class="main">
    <?php
     for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
       mysqli_data_seek($result,$i);
       $row=mysqli_fetch_array($result);
       $id=$row['matching'];
       $matching_day=$row1['matching_day'];
       $sql1="SELECT * FROM member WHERE `id`='$id'";
       $result1=mysqli_query($conn,$sql1);
       mysqli_data_seek($result1,$i);
       $row1=mysqli_fetch_array($result1);
       $name=$row1['name'];
       $birth=$row1['birth'];
       $gender=$row1['gender'];
       $tel=$row1['tel'];
       $img=$row1['img'];
       $sql2="SELECT * FROM member_meeting WHERE `id`='$id'";
       $result2=mysqli_query($conn,$sql2);
       mysqli_data_seek($result2,$i);
       $row2=mysqli_fetch_array($result2);
       $self_info=$row2['self_info'];
       $height=$row2['height'];
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


       ?>
    <div id="list_item">
      <table class="card" style="margin:5px;">
        <tr>
          <td><img src="../mb_login/<?=$img?>" alt="John" style="width:200px;height:200px;"></td>
        </tr>
        <tr>
          <td>  <h1><?=$name?></h1></td>
        </tr>
        <tr>
          <td><p class="title"><?=$job?></p></td>
        </tr>
        <tr>
          <td><p hidden><?=$id?></p></td>
        </tr>
        <tr>
          <td><p>키 :<?=$height?></p> <p >좋아요 <label id="like_num<?=$i?>"><?=$like?></label><input type="hidden" id="hidden_like" name="hidden_like" value="<?=$like?>">
            <input type="hidden" class="vote_who" id="vote_who<?=$i?>" name="vote_who" value="<?=$id?>">
            <input type="hidden" class="flag_like" id="flag_like" name="flag_like" value="">
             <input  type="image" src="./img/like.png" style="width:25px;height:25px;" onclick="javascript:like(<?=$i?>);" class="button_like" id="button_like<?=$i?>" name="button_like" value=""> </p></td>
        </tr>
        <tr>
          <td><p><?=$self_info?></p></td>
        </tr>
        <tr>
          <td><button class="button" onclick="javascript:send_mail('<?=$id?>');">Contact</button></td>
        </tr>
        <tr>
          <td>매칭<?=$number?></td>
        </tr>
      </table>
      <?php
              $number--;
           }//end of for
          ?>
  </div>  <!-- main end -->
  </div>  <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  </body>
</html>
