<?php
session_start();
include "../lib/db_connector.php";
$user_gender=$_SESSION['gender'];


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

  $sql="SELECT * from member order by id desc";
  $sql1="SELECT * from member_meeting order by id desc";
  $sql2="SELECT * from member_like order by id desc";
  //제목(subject), 내용(content), 아이디(id)

  $result=mysqli_query($conn,$sql);
  $result1=mysqli_query($conn,$sql1);
  $result2=mysqli_query($conn,$sql2);
  $total_record=mysqli_num_rows($result);//총레코드수

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
             mysqli_data_seek($result2,$i);
             $row=mysqli_fetch_array($result);
             $row1=mysqli_fetch_array($result1);
             $row2=mysqli_fetch_array($result2);
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
             $job=$row1['job'];
             if($id_like==$id){
               $count++;
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
                <td><p><?=$height?></p></td>
              </tr>
              <tr>
                <td><p><?=$self_info?></p></td>
              </tr>
              <tr>
                <td><button class="button" onclick="javascript:send_mail(<?=$id?>);">Contact</button></td>
              </tr>
              <tr>
                <td>회원번호 <?=$number?></td>
              </tr>
            </table>

        <?php
                $number--;
             }//end of for
            ?>
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
