<?php
session_start();
include "../lib/db_connector.php";
if (isset($_SESSION['userid'])) {
  $user_id=$_SESSION['userid'];
}else{
  ?>
<!-- <script type="text/javascript">
  alert("로그인 후 이용해 주세요");
  history.go(-1);
</script> -->
<?php
}

define('SCALE', 10);
$sql=$result=$total_record=$total_page=$start=$b_id=$count="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_nick=$memo_content="";
$total_record=0;

$sql = "show tables from lotus_db";
$result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

 while ($row=mysqli_fetch_row($result)) {
   if($row[0] ==='member'){//lotus_db 스키마에  member 테이블이 있는 경우
     $flag="OK";
     break;
   }
 }//테이블이 존재하지 않으면 돌려 보내고 종료한다.
 if($flag==="NO"){
     echo "<script>alert('member 테이블이 없습니다.');
       history.go(-1);
     </script> ";
     mysqli_close($conn); //언제 더 이상 문장을 실행하지 않고 나가는지 확인해서 자원을 모두 닫아주어야 한다.
     exit;
 }

if(isset($_GET['mode'])&&$_GET['mode']=='whole'){
  $sql="SELECT * from member order by `mb_num` desc";
  $result=mysqli_query($conn,$sql);
  $total_record=mysqli_num_rows($result);//총레코드수
}else if(isset($_GET['mode'])&&$_GET['mode']=='male'){
  $sql="SELECT * from member where `gender` ='0' or `gender`='남' order by `mb_num` desc";
  $result=mysqli_query($conn,$sql);
  $total_record=mysqli_num_rows($result);//총레코드수
}else if(isset($_GET['mode'])&&$_GET['mode']=='female'){
  $sql="SELECT * from member where `gender`='1' or `gender`='여' order by `mb_num` desc";
  $result=mysqli_query($conn,$sql);
  $total_record=mysqli_num_rows($result);//총레코드수
}
//1.전체페이지
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
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/meeting.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script type="text/javascript">
    function send_mail(m) {
      var popupX = (window.screen.width / 2) - (600 / 2);
      var popupY = (window.screen.height / 2) - (400 / 2);
      window.open('../message/message_form.php?id=' + m, '', 'left=' + popupX + ',top=' + popupY + ', width=500, height=400, status=no, scrollbars=no');
    }
  </script>
  <title>연인찾기</title>
</head>

<body>
  <!-- header start -->
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
        연인찾기
      </div>
      <hr class="title_hr">
      <?php
       for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
         mysqli_data_seek($result,$i);
         $row=mysqli_fetch_array($result);
         $id=$row['id'];
         $name=$row['name'];
         $birth=$row['birth'];
         $gender=$row['gender'];
         $sql1="SELECT * from member_meeting where `id`='$id' order by id desc";
         $result1=mysqli_query($conn,$sql1);
         mysqli_data_seek($result1,$i);
         $row1=mysqli_fetch_array($result1);
         $id1=$row1['id'];
         $img=$row1['img'];
         $self_info=$row1['self_info'];
         $height=$row1['height'];
         $job=$row1['job'];
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
         $sql2="SELECT * from member_like where id='$id'";
         $result2=mysqli_query($conn,$sql2);
         mysqli_data_seek($result2,$i);
         $row2=mysqli_fetch_array($result2);
         $like=mysqli_num_rows($result2);
         $id_like=$row2['id'];
         $vote_id=$row2['vote_id'];
         ?>
      <table class="admin_title">
        <tr>
          <td class="mt_img"><img src="../mb_login/<?=$img?>" alt="<?=$id?>"></td>
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
              <input type="image" src="./img/like.png" style="width:25px;height:25px;" onclick="javascript:like(<?=$i?>);" class="button_like" id="button_like<?=$i?>" name="button_like" value="">
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
      <script type="text/javascript">
        function like(m) {
          var m = 'like_num' + m;
          var like = document.getElementById(m);
          var num_like = Number(like.innerHTML);
          like.innerHTML = num_like + 1;
        }
        $(document).ready(function() {
          $("#button_like<?=$i?>").click(function(event) {
            $.ajax({
                url: './like_you.php?mode=check',
                type: 'GET',
                data: {
                  id: $("#vote_who<?=$i?>").val(),
                  vote_id: $("#vote_user").val()
                }
              })
              .done(function(result) {
                var answer = result;
                console.log(answer);
                var d = answer.split('.');
                console.log(d);
                $('#button_like<?=$i?>').prop('disabled', true);
                $('#like_num<?=$i?>').html(d[1]);
                console.log(d[1]);
                alert(d[0]);
                // $(".button_like").prop('disabled', true);
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
        }//end of for
       ?>
      <input type="hidden" class="vote_user" id="vote_user" name="vote_user" value="<?=$user_id?>">
      <hr class="title_hr">
      <div class="page_to">
        <div class="page_to_in">
          <a href="./op_free_bd_main.php?page=1">◀◀</a>
          <?php
               if ($page>1) {
                     $page_go=$page-1;
                      echo '<a class="previous" href="./op_free_bd_main.php?page='.$page_go.'">이전 ◀</a>';
                    }else {
                      echo '<a class="previous" href="./op_free_bd_main.php?page=1">이전 ◀</a>';
                    }
                    for ($i=1; $i <= $total_page ; $i++) {
                      if($page==$i){
                        echo "<a>&nbsp;$i&nbsp;</a>";
                      }else{
                        //싱글쿼테이션은 문자로 인식하지 않는다
                        //더블은 문자로 인식
                        echo "<a href='./op_free_bd_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
                      }
                    }
                    if ($total_page==0) {
                      echo '<a class="next" href="./meeting.php?page=1">▶ 다음</a>';
                    }elseif ($page+1>$total_page) {
                      $page_end=$total_page;
                      echo '<a class="next" href="./meeting.php?page='.$page_end.'">▶ 다음</a>';
                    }else{
                      $page_go=$page+1;
                      echo '<a class="next" href="./meeting.php?page='.$page_go.'">▶ 다음</a>';
                    }
                    ?>
          <a href="./op_free_bd_main.php?page=<?=$total_page?>">▶▶</a>
        </div> <!-- page_to in end 페이지 이동 -->
      </div> <!-- page_to end 페이지 이동 -->
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
