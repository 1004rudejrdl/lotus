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
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

</head>
<body>
<!-- header start -->
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
  <table>
    <th>MY PAGE</th>
    <tr>
      <td colspan="4" rowspan="4" ><img src="../mb_login/<?=$img?>" alt="profile_img" style="width:300px;height:300px;"> </td>
      <td>아이디</td>
      <td><span><?=$id?></span> </td>
      <td>이름</td>
      <td><span><?=$name?></span> </td>
    </tr>
    <tr>
      <td>성별</td>
      <td><span><?=$gender?></span> </td>
      <td>생년월일</td>
      <td><span><?=$birth?></span> </td>
    </tr>
    <tr>
      <td>신장</td>
      <td><span><?=$height?>cm</span> </td>
      <td>체중</td>
      <td><span><?=$weight?>kg</span> </td>
    </tr>
    <tr>
      <th>자기소개</th>
      <td><span><?=$self_info?></span> </td>
    </tr>
  </table>
  <div class="">
    <h3>나와 매칭된 사람</h3>
  </div>
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
    <table class="card" style="margin:5px;">
      <tr>
        <td><img id="match_card_img<?=$i?>" src="../mb_login/<?=$img?>" alt="John" style="width:200px;height:200px;"></td>
      </tr>
      <tr>
        <td><h1 id="match_card_name<?=$i?>"><?=$name?></h1></td>
      </tr>
      <tr>
        <td><p id="match_card_job<?=$i?>"><?=$job?></p></td>
      </tr>
      <tr>
        <td><span>키 :</span> <span id="match_card_hei<?=$i?>"><?=$height?></span><span>체중 : </span> <span id="match_card_wei<?=$i?>"><?=$weight?></span> </td>
      </tr>
      <tr>
        <td><p id="match_card_self<?=$i?>"><?=$self_info?></p></td>
      </tr>
      <tr>
        <td><button class="button" onclick="javascript:send_mail('<?=$id?>');">Contact</button></td>
      </tr>
      <tr>
        <td><span>전화번호 :</span> <span id="match_card_tel<?=$i?>"><?=$tel?></span> </td>
      </tr>
    </table>
  <?php
}//end of for in php
if(!isset($_GET['page'])||$page==1){
  echo "<img id='match_left_button' src='./img/right_button.png' alt='right_button' >";
}else if(isset($_GET['page'])&&$page!=$total_page){
  echo "<img id='match_left_button' src='./img/left_button.png' alt='left_button'>";
  echo "<img id='match_right_button' src='./img/right_button.png' alt='right_button' >";
}else if($page==$total_page){
  echo "<img id='match_left_button' src='./img/left_button.png' alt='left_button'>";
}
?>
<script type="text/javascript">
function send_mail(m) {
  var popupX = (window.screen.width/2)-(600/2);
 var popupY = (window.screen.height/2)-(400/2);
 window.open('../message/message_form.php?id='+m,'','left='+popupX+',top='+popupY+', width=500, height=400, status=no, scrollbars=no');
}
$(document).ready(function() {
  $('#match_left_button').click(function(event) {
    $.ajax({
      url: './like_member.php?mode=match',
      type: 'GET',
      data: {page: '<?=$page-1?>'}
    })
    .done(function(result) {
      var json = $.parseJSON(result);
      $('#like_card_img<?=$i?>').attr("src",json[<?=$i?>].img);
      $('#like_card_name<?=$i?>').html(json[<?=$i?>].name);
      $('#like_card_job').html(json[<?=$i?>].job);
      $('#like_card_hei').html(json[<?=$i?>].height);
      $('#like_card_wei').html(json[<?=$i?>].weight);
      $('#like_card_self').html(json[<?=$i?>].self_info);
      $('#like_card_tel').html(json[<?=$i?>].tel);
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });
});
$(document).ready(function() {
  $('#match_right_button').click(function(event) {
    $.ajax({
      url: './like_member.php?mode=match',
      type: 'GET',
      data: {page: '<?=$page+1?>'}
    })
    .done(function(result) {
      var json = $.parseJSON(result);
      $('#like_card_img<?=$i?>').attr("src",json[<?=$i?>].img);
      $('#like_card_name<?=$i?>').html(json[<?=$i?>].name);
      $('#like_card_job').html(json[<?=$i?>].job);
      $('#like_card_hei').html(json[<?=$i?>].height);
      $('#like_card_wei').html(json[<?=$i?>].weight);
      $('#like_card_self').html(json[<?=$i?>].self_info);
      $('#like_card_tel').html(json[<?=$i?>].tel);
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });
});
</script>
<!-- <img id="match_left_button" src="./img/left_button.png" alt="left_button">
<img id="match_right_button" src="./img/right_button.png" alt="right_button" > -->
<div>
  <h3>나에게 좋아요를 눌러준 사람들</h3>
  <?php
  $sql="SELECT * FROM member_like WHERE `id`='$userid'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $like_me_count=mysqli_num_rows($result);
  $total_page=($like_me_count % SCALE == 0 )?
  ($like_me_count/SCALE):(ceil($like_me_count/SCALE));
  //2.페이지가 없으면 디폴트 페이지 1페이지
  $like_page=(!isset($_GET['like_page']))?(1):(test_input($_GET['like_page']));

  //3.현재페이지 시작번호계산함.
  $like_start=($like_page -1) * SCALE;
  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $rowcount - $start;
  for ($i = $like_start; $i < $like_start+SCALE && $i<$like_me_count; $i++){
    //mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $like_me=$row['vote_id'];
    $sql="SELECT * FROM member WHERE `id`='$like_me'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    //mysqli_data_seek($result,$i);
    $row1=mysqli_fetch_array($result);
    $name=$row1['name'];
    $tel=$row1['tel'];
    $sql="SELECT * FROM member_meeting WHERE `id`='$like_me'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    //mysqli_data_seek($result,$i);
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
    <table class="card" style="margin:5px;">
      <tr>
        <td><img id="like_card_img<?=$i?>" src="../mb_login/<?=$img?>" alt="John" style="width:200px;height:200px;"></td>
      </tr>
      <tr>
        <td><h1 id="like_card_name<?=$i?>"><?=$name?></h1></td>
      </tr>
      <tr>
        <td><p id="like_card_job<?=$i?>"><?=$job?></p></td>
      </tr>
      <tr>
        <td><span>키 :</span> <span id="like_card_hei<?=$i?>"><?=$height?></span><span>체중 : </span> <span id="like_card_wei<?=$i?>"><?=$weight?></span> </td>
      </tr>
      <tr>
        <td><p id="like_card_self<?=$i?>"><?=$self_info?></p></td>
      </tr>
      <tr>
        <td><button class="button" onclick="javascript:send_mail('<?=$id?>');">Contact</button></td>
      </tr>
      <tr>
        <td><span>전화번호 :</span> <span id="like_card_tel<?=$i?>"><?=$tel?></span> </td>
      </tr>
    </table>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#like_left_button').click(function(event) {
          $.ajax({
            url: './like_member.php?mode=like',
            type: 'GET',
            data: {like_page: '<?=$like_page-1?>'}
          })
          .done(function(result) {
            var json = $.parseJSON(result);
            $('#like_card_img<?=$i?>').attr("src",json[<?=$i?>].img);
            $('#like_card_name<?=$i?>').html(json[<?=$i?>].name);
            $('#like_card_job').html(json[<?=$i?>].job);
            $('#like_card_hei').html(json[<?=$i?>].height);
            $('#like_card_wei').html(json[<?=$i?>].weight);
            $('#like_card_self').html(json[<?=$i?>].self_info);
            $('#like_card_tel').html(json[<?=$i?>].tel);
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

        });
      });
      $(document).ready(function() {
        $('#like_right_button').click(function(event) {
          $.ajax({
            url: './like_member.php?mode=like',
            type: 'GET',
            data: {like_page: '<?=$like_page+1?>'}
          })
          .done(function(result) {
            var json = $.parseJSON(result);
            $('#like_card_img<?=$i?>').attr("src",json[<?=$i?>].img);
            $('#like_card_name<?=$i?>').html(json[<?=$i?>].name);
            $('#like_card_job').html(json[<?=$i?>].job);
            $('#like_card_hei').html(json[<?=$i?>].height);
            $('#like_card_wei').html(json[<?=$i?>].weight);
            $('#like_card_self').html(json[<?=$i?>].self_info);
            $('#like_card_tel').html(json[<?=$i?>].tel);
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

        });
      });
    </script>
    <?php
  }
  if(!isset($_GET['page'])||$page==1){
    echo "<img id='match_left_button' src='./img/right_button.png' alt='right_button' >";
  }else if(isset($_GET['page'])&&$page!=$total_page){
    echo "<img id='match_left_button' src='./img/left_button.png' alt='left_button'>";
    echo "<img id='match_right_button' src='./img/right_button.png' alt='right_button' >";
  }else if($page==$total_page){
    echo "<img id='match_left_button' src='./img/left_button.png' alt='left_button'>";
  }
   ?>
</div>
<!-- <img id="like_left_button" src="./img/left_button.png" alt="like_left_button">
<img id="like_right_button" src="./img/right_button.png" alt="like_right_button">  -->
<div class="">
  <a href="#"><img src="./img/shopping.png" alt="" style="width:500px;height:500px;"></a>
  <a href="#"><img src="./img/bill.png" alt=""style="width:500px;height:500px;"></a>
</div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
