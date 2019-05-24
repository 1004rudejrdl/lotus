<?php
session_start();
include "../lib/db_connector.php";
$user_gender=$_SESSION['gender'];
$user_id=$_SESSION['userid'];


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
  $sql="SELECT * from member order by id desc";
  $sql1="SELECT * from member_meeting order by id desc";
  //제목(subject), 내용(content), 아이디(id)

  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql1);
  $total_record=mysqli_num_rows($result);//총레코드수
}else if(isset($_GET['mode'])&&$_GET['mode']=='male'){
  $sql="SELECT * from member where gender IN(`0`)";
  $sql1="SELECT * from member_meeting order by id desc";
  //제목(subject), 내용(content), 아이디(id)

  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql1);
  $total_record=mysqli_num_rows($result);//총레코드수
}else if(isset($_GET['mode'])&&$_GET['mode']=='female'){
  $sql="SELECT * from member where gender IN(`1`)";
  $sql1="SELECT * from member_meeting order by id desc";
  //제목(subject), 내용(content), 아이디(id)

  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql1);
  $total_record=mysqli_num_rows($result);//총레코드수

}

//1.전체페이지, 2.디폴트페이지, 3.현재페이지 시작번호 4.보여줄리스트번호
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
<html lang="ko" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
  <link rel="stylesheet" href="./css/card.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <script type="text/javascript">
    function send_mail(m) {
      var popupX = (window.screen.width/2)-(600/2);
     var popupY = (window.screen.height/2)-(400/2);
     window.open('../message/message_form.php?id='+m,'','left='+popupX+',top='+popupY+', width=500, height=400, status=no, scrollbars=no');
   }

  </script>
  <title>연인찾기</title>
</head>

<body>

  <div id="wrap">
    <div id="content">
      <!--end of col1  -->
        <div id="list_content">
          <?php
           for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
             mysqli_data_seek($result,$i);
             mysqli_data_seek($result1,$i);
             $row=mysqli_fetch_array($result);
             $row1=mysqli_fetch_array($result1);
             $id=$row['id'];
             $id1=$row1['id'];
             $name=$row['name'];
             $birth=$row['birth'];
             $gender=$row['gender'];
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
             $like=count($row2['id']);
             $id_like=$row2['id'];
             $vote_id=$row2['vote_id'];

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
                <td>회원번호 <?=$number?></td>
              </tr>
            </table>
            <script type="text/javascript">
            function like(m){
                var m='like_num'+m;
                var like=document.getElementById(m);
                var num_like=Number(like.innerHTML);
                like.innerHTML=num_like+1;
              }
              $(document).ready(function() {
                $("#button_like<?=$i?>").click(function(event) {
                  $.ajax({
                    url: './like_you.php?mode=check',
                    type: 'GET',
                    data: {
                      id:$("#vote_who<?=$i?>").val(),
                      vote_id:$("#vote_user").val()
                    }
                  })
                  .done(function(result) {
                    $('#button_like<?=$i?>').prop('disabled', true);
                    $('#like_num<?=$i?>').html(<?=$like?>);
                    alert(result);
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
                $number--;
             }//end of for
            ?>
            <input type="hidden" class="vote_user" id="vote_user" name="vote_user" value="<?=$user_id?>">
        <div id="page_button" style="clear:both;">
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
          </div> <!-- button end -->
        </div> <!-- page_button end -->
        </div><!--end of list content -->
      </div>      <!--end of col2  -->
    </div>    <!--end of content -->
  </div>  <!--end of wrap  -->
</body>

</html>
