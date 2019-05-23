<?php
session_start();
include "../lib/db_connector.php";
$user_gender=$_SESSION['gender'];

if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}
$sql=$result=$total_record=$total_page=$start=$b_id=$count="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_nick=$memo_content="";
$total_record=0;

if(isset($_GET['id'])&&!empty($_GET['id'])){
  $id=test_input($_GET['id']);
  $sql="SELECT * from `member` where `id` = '$id'";
  $sql="SELECT * from `member_like` where `id` = '$id'";
  $sql="SELECT * from `member_meeting` where `id` = '$id'";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $row=mysqli_fetch_array($result);
  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql1);
  $result2=mysqli_query($conn,$sql2);
  mysqli_data_seek($result,$i);
  mysqli_data_seek($result1,$i);
  mysqli_data_seek($result2,$i);
  $row=mysqli_fetch_array($result);
  $row1=mysqli_fetch_array($result1);
  $row1=mysqli_fetch_array($result2);
  $num=$row['num'];
  $id=$row['id'];
  $id1=$row1['id'];
  $id_like=$row2['id'];
  $vote_id=$row2['vote_id'];
  $name=$row['name'];
  $birth=$row['birth'];
  $gender=$row['gender'];
  $img=$row1['img'];
  $self_info=$row1['self_info'];
  $height=$row1['height'];
  $weight=$row1['weight'];
  $job=$row1['job'];
  $image_info=getimagesize($img);
  $image_width = $image_info[0];
  $image_height = $image_info[1];
  $image_type = $image_info[2];
  $image_width=600;
  $image_image_height=600;
  if($id_like==$id){
    $count++;
  }
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/card.css">
  <script type="text/javascript" src="../js/member_form.js"></script>
  <title>연인찾기</title>
</head>

<body>
  <div id="wrap">
    <div id="header">
      <?php include "../lib/top_login2.php"; ?>
    </div>
    <!--end of header  -->
    <div id="menu">
      <?php include "../lib/top_menu2.php"; ?>
    </div>
    <!--end of menu  -->
    <div id="content">
      <div id="col1">
        <div id="left_menu">
          <?php include "../lib/left_menu.php"; ?>
        </div>
      </div>
      <!--end of col1  -->

        <div id="list_content">
          <?php

             ?>
          <div id="list_item">
            <div id="list_item1"><?=$number?></div><!-- 보여주기만 하는 번호 -->
            <div class="card">
              <img src="<?=$img?>" alt="John" style="width:100%">
              <h1><?=$name?></h1>
              <p class="title"><?=$job?></p>
              <p hidden><?=$id?></p>
              <p><?=$height?></p>
              <div style="width:100%">
                <p><?=$self_info?></p>
              </div>
              <p><button onclick="./user.php?id=<?=$id?>&page=<?=$page?>">Contact</button></p>
            </div>

        <div id="page_button">
          <div id="page_num">이전◀ &nbsp;&nbsp;&nbsp;&nbsp;
            <?php
          for ($i=1; $i <= $total_page ; $i++) {
            if($page==$i){
              echo "<b>&nbsp;$i&nbsp;</b>";
            }else{
              //싱글쿼테이션은 문자로 인식하지 않는다
              //더블은 문자로 인식
              echo "<a href='./list.php?page=$i'>&nbsp;$i&nbsp;</a>";
            }
          }
        ?>
            &nbsp;&nbsp;&nbsp;&nbsp;▶ 다음
          </div> <!-- page_num end -->
          <div id="button">
            <a href="list.php?page=<?=$page?>"><img src="../img/list.png">&nbsp;</a>
            <?php //세션 아이디가 있으면 글쓰기 목록을 보여주고 없으면 보여주지 않는다.
            if(!empty($_SESSION['userid'])){
              echo '<a href="./write_edit_form.php?page='.$page.'"><img src="../img/write.png"></a>';
            }
           ?>
          </div> <!-- button end -->
        </div> <!-- page_button end -->
        </div><!--end of list content -->
      </div>      <!--end of col2  -->
    </div>    <!--end of content -->
  </div>  <!--end of wrap  -->
</body>

</html>
