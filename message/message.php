<?php
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['name'];
include_once "../lib/db_connector.php";

$mode = "receive";

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}

if($mode == "receive"){
    $sql = "select * from member_msg where r_id = '$id' order by msg_num desc";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total_record = mysqli_num_rows($result); //전체 레코드 수
}else{
    $sql = "select * from member_msg where s_id = '$id' order by msg_num desc";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total_record = mysqli_num_rows($result); //전체 레코드 수
}

define('SCALE', 3);
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/message.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function delete_id() {
      var popupX = (window.screen.width/2)-(600/2);
     var popupY = (window.screen.height/2)-(400/2);
     window.open('./alert_delete.php','','left='+popupX+',top='+popupY+', width=300, height=200, status=no, scrollbars=no');
    }
    function message_form(){
         var popupX = (window.screen.width/2)-(600/2);
         var popupY = (window.screen.height/2)-(400/2);
         window.open('./message_form.php','','left='+popupX+',top='+popupY+', width=600, height=485, status=no, scrollbars=no');
    }
    function chat_view(url){
         var popupX = (window.screen.width/2)-(600/2);
         var popupY = (window.screen.height/2)-(400/2);
         window.open(url,'','left='+popupX+',top='+popupY+', width=600, height=485, status=no, scrollbars=no');
    }
  </script>
</head>
<title>연愛, 꽃 피우다</title>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="../find_meet/user.php">회원정보창</a>
  <a href="../message/message.php">우편함</a>
  <a href="../mb_login/mb_modify_form.php">회원정보수정</a>
  <a href="../sh_man/shopping_basket.php?mode_user=user_page">장바구니</a>
  <a href="../sh_man/test_orderlist_return.php">주문/결제목록</a>
</div><!-- sidenav end -->

<div class="main">
  <div class="admin_title">
    우편함
  </div>
  <hr class="title_hr">
  <div class="receive_send_bar">
    <?php if(isset($id)){ ?>
    <a href="#" onclick="message_form()" ><img src="./img/sendmail.png"></a>
    <?php } ?>
    <a href="./message.php?mode=receive">받은 메세지 </a>&nbsp; | &nbsp;<a href="./message.php?mode=send">보낸 메세지 </a>
  </div>
  <hr class="title_hr first_hr">
    <?php
    for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
        mysqli_data_seek($result, $i);
        $row=mysqli_fetch_array($result);
        $msg_num=$row["msg_num"];
        $r_id=$row["r_id"];
        $s_id=$row["s_id"];
        $msg_cont=$row["msg_cont"];
        $read=$row["read"];
        $send_time=$row["send_time"];
        $send_time=substr($send_time,0,10);
        $s_sql="SELECT * FROM member where id ='$s_id'";
        $s_result = mysqli_query($conn, $s_sql) or die(mysqli_error($conn));
        $s_row=mysqli_fetch_array($s_result);
        $s_name=$s_row['name'];
        $r_sql="SELECT * FROM member where id ='$r_id'";
        $r_result = mysqli_query($conn, $r_sql) or die(mysqli_error($conn));
        $r_row=mysqli_fetch_array($r_result);
        $r_name=$r_row['name'];
        ?>
        <div class="massage_div">
        <?php
        if($mode == "receive"){
          if($read == "0"){
        ?>
           <div class="msg_r_s"><b><?=$s_name?>(<?=$s_id?>) 에게 받은 메세지</b>&nbsp;</a></div>
           <div class="msg_title"><a onclick="chat_view('view.php?msg_num=<?=$msg_num ?>')"><b><?=$msg_cont?></b></a></div>
           <div class="msg_date"><b><?=$send_time?> 안읽음</b></div>
           <hr class="msg_liner">
       <?php
         }else{
         ?>
           <div class="msg_r_s"><?=$s_name?>(<?=$s_id?>) 에게 받은 메세지</b>&nbsp;</a></div>
           <div class="msg_title"><a onclick="chat_view('view.php?msg_num=<?=$msg_num ?>')"><?=$msg_cont?></a></div>
           <div class="msg_date"><?=$send_time?> 읽음 </div>
           <hr class="msg_liner">
       <?php
           }
         }else{
        if($read == "0"){
            ?>
           <div class="msg_r_s"><b><?=$r_name?>(<?=$r_id."님"?>)에게 보낸 메세지&nbsp;</b></div>
           <div class="msg_title"><a onclick="chat_view('view.php?msg_num=<?=$msg_num ?>')"><b><?=$msg_cont?></b></a></div>
           <div class="msg_date"><b><?=$send_time?> 안읽음</b></div>
           <hr class="msg_liner">
       <?php
         }else{
         ?>
           <div class="msg_r_s"><?=$r_name?>(<?=$r_id."님"?>)에게 보낸 메세지 &nbsp;</a></div>
           <div class="msg_title"><a onclick="chat_view('view.php?msg_num=<?=$msg_num ?>')"><?=$msg_cont?></a></div>
           <div class="msg_date"><?=$send_time?> 읽음</div>
           <hr class="msg_liner">
           <?php
        }
      }
      ?>
      </div>        <!-- massage_div end -->
      <?php
    }
  if ($total_page) {
    ?>
   <div class="page_to">
     <div class="page_to_in">
       <a href="./message.php?page=1&mode=<?=$mode?>">◀◀</a>
       <?php
            if ($page>1) {
                  $page_go=$page-1;
                   echo '<a class="previous" href="./message.php?page='.$page_go.'&mode='.$mode.'">이전 ◀</a>';
                 }else {
                   echo '<a class="previous" href="./message.php?page=1&mode='.$mode.'">이전 ◀</a>';
                 }
                 for ($i=1; $i <= $total_page ; $i++) {
                   if($page==$i){
                     echo "<a>&nbsp;$i&nbsp;</a>";
                   }else{
                     //싱글쿼테이션은 문자로 인식하지 않는다
                     //더블은 문자로 인식
                     echo "<a href='./message.php?page=$i&mode=$mode'>&nbsp;$i&nbsp;</a>";
                   }
                 }
                 if ($total_page==0) {
                   echo '<a class="next" href="./message.php?page=1&mode='.$mode.'">▶ 다음</a>';
                 }elseif ($page+1>$total_page) {
                   $page_end=$total_page;
                   echo '<a class="next" href="./message.php?page='.$page_end.'&mode='.$mode.'">▶ 다음</a>';
                 }else{
                   $page_go=$page+1;
                   echo '<a class="next" href="./message.php?page='.$page_go.'&mode='.$mode.'">▶ 다음</a>';
                 }
                 ?>
       <a href="./message.php?page=<?=$total_page?>&mode=<?=$mode?>">▶▶</a>
     </div> <!-- page_to in end 페이지 이동 -->
</div>
<?php
}
  if ($total_page) {
    echo '<hr class="title_hr">';
  }
 ?>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
