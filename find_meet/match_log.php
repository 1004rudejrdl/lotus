<?php
session_start();
include '../lib/db_connector.php';
$sql="SELECT * FROM member_meeting where matching_day != '' order by `matching_day` desc limit 8";
$result=mysqli_query($conn,$sql);
$total_record=mysqli_num_rows($result);
$left_right = "right";

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
  <link rel="stylesheet" href="./css/match_log.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <title></title>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div id="main_body" class="main_body">
    <div id="sidenav" class="sidenav">
      <a href="./meeting.php?mode=whole">연인찾기</a>
      <a href="./meeting.php?mode=male" style="color:#1565c0">남</a>
      <a href="./meeting.php?mode=female"style="color:#f64f59">여</a>
      <a href="./match_log.php">데이트로그/회원현황</a>
      <a href="../srv_human_/srv_human_research.php">이상형 설문조사</a>
    </div><!-- sidenav end -->

    <div class="main">
      <div class="admin_title">
        데이트 로그
      </div>
      <hr class="title_hr">
      <div class="admin_title_right">
        현재 까지 연,꽃을 통해 인연을 찾으신 회원님들 입니다
      </div>
      <div class="log_img">
        <table>
          <img src="./img/log_match.jpg" alt="">
        </table>
      </div>
      <div class="log_text">
        <div class="timeline">
          <?php
           for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
           mysqli_data_seek($result,$i);
           $row=mysqli_fetch_array($result);
           $id=$row['id'];
           $matching=$row['matching'];
           $matching_day=$row['matching_day'];
           //좌우 번갈아 가면서 찍도록하는 플래그
           if ($left_right=="left") {
             $left_right="right";
           }else{
             $left_right="left";
           }
           ?>
            <div class="container <?=$left_right?>">
              <div class="content">
                <p><b><?= $matching_day?></b></p>
                <p><?=$id?> ♥ <?=$matching?></p>
              </div>
            </div>
            <?php
            $number--;
            }//end of for
            ?>
        </div><!-- timeline end -->
      </div><!-- log_text end -->
    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
</body>

</html>
