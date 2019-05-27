<?php
session_start();
include '../lib/db_connector.php';
$sql="SELECT * FROM member_meeting where matching_day != ''";
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
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../css/header_sidenav.css">
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
    <div class="br_st_text">
      <div class="timeline">
    <?php
     for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
       mysqli_data_seek($result,$i);
       $row=mysqli_fetch_array($result);
       $id=$row['id'];
       $matching=$row['matching'];
       $matching_day=$row['matching_day'];
       if ($left_right=="left") {
         $left_right="right";
       }else{
         $left_right="left";
       }
       ?>
              <div class="container <?=$left_right?>">
                <div class="content">
                  <h2><?= $matching_day?></h2>
                  <p><?=$id?> ♥ <?=$matching?></p>
                </div>
              </div>

          <?php

          $number--;

        }//end of for
        ?>

      </div>
    </div>

  </div>  <!-- main end -->
  </div>  <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  </body>
</html>
