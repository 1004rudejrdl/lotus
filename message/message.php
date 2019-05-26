<?php
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['name'];
include_once "../lib/db_connector.php";

$mode = "receive";

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>연愛, 꽃 피우다</title>
<?php

if($mode == "receive"){
    $sql = "select * from member_msg where r_id = '$id' order by msg_num desc";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total_record = mysqli_num_rows($result); //전체 레코드 수
}else{
    $sql = "select * from member_msg where s_id = '$id' order by msg_num desc";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total_record = mysqli_num_rows($result); //전체 레코드 수
}


// 페이지 당 글수, 블럭당 페이지 수
$rows_scale=3;
$pages_scale=5;

// 전체 페이지 수 ($total_page) 계산
$total_pages= ceil($total_record/$rows_scale);

if(empty($_GET['page'])){
    $page=1;
}else{
    $page = $_GET['page'];
}

// 현재 페이지 시작 위치 = (페이지 당 글 수 * (현재페이지 -1))  [[ EX) 현재 페이지 2일 때 => 3*(2-1) = 3 ]]
$start= $rows_scale * ($page -1) ;

// 이전 페이지 = 현재 페이지가 1일 경우. null값.
$pre_page= $page>1 ? $page-1 : NULL;

// 다음 페이지 = 현재페이지가 전체페이지 수와 같을 때  null값.
$next_page= $page < $total_pages ? $page+1 : NULL;

// 현재 블럭의 시작 페이지 = (ceil(현재페이지/블럭당 페이지 제한 수)-1) * 블럭당 페이지 제한 수 +1  [[  EX) 현재 페이지 5일 때 => ceil(5/3)-1 * 3  +1 =  (2-1)*3 +1 = 4 ]]
$start_page= (ceil($page / $pages_scale ) -1 ) * $pages_scale +1 ;

// 현재 블럭 마지막 페이지
$end_page= ($total_pages >= ($start_page + $pages_scale)) ? $start_page + $pages_scale-1 : $total_pages;

$number=$total_record- $start;

?>
 <script>
 function message_form(){
	    var popupX = (window.screen.width/2)-(600/2);
	    var popupY = (window.screen.height/2)-(400/2);
	    window.open('./message_form.php','','left='+popupX+',top='+popupY+', width=500, height=400, status=no, scrollbars=no');
	  }
 function chat_view(url){
	    var popupX = (window.screen.width/2)-(600/2);
	    var popupY = (window.screen.height/2)-(400/2);
	    window.open(url,'','left='+popupX+',top='+popupY+', width=500, height=400, status=no, scrollbars=no');
	  }

 </script>
</head>
<body>
  <article class="main">
        <div id="head">

          <h1 style="display: inline;">Message</h1><div style="display: inline; float: right; margin-top: 10px;"><a href="./message.php?mode=receive">받은 메세지 </a>&nbsp; | &nbsp;<a href="./message.php?mode=send">보낸 메세지 </a></div>
        </div>
        <hr style="border: 1px solid black;">

         <div class="clear2"></div>

      <?php

      for($i=$start; ($i<$start+$rows_scale) && ($i< $total_record); $i++){
        //가져올 레코드 위치 이동
        mysqli_data_seek($result, $i);

        //하나 레코드 가져오기
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


        ?>

   <div id="list0" style="display: inline;">
   <?php
   if($mode == "receive"){
       if($read == "0"){
           ?>
   		<div id="list2" style="margin-top: 10px;"><b><?=$name."님"?></b>&nbsp<b><?=$s_name."( ".$s_id." ) 에게 받은 메세지 "?></b>&nbsp</a></div>
   		<div id="list2" style="margin-top: 10px;"><a id="messageLink" href="#" onclick="chat_view('view.php?msg_num=<?=$msg_num ?>')" style="text-decoration: none; color: black;"><b><?=$msg_cont?></b></a></div>
   		<div id="list_item4" style="margin-top: 10px;" ><b><?=$send_time?> 안읽음</b></div>
   		<?php
   	    }else{
   	    ?>
   		<div id="list2" style="margin-top: 10px;"><?=$s_id."님"?>&nbsp<?="( ".$s_id." ) 에게 받은  메세지 "?>&nbsp</a></div>
   		<div id="list2" style="margin-top: 10px;"><a id="messageLink" href="#" onclick="chat_view('view.php?msg_num=<?=$msg_num ?>')" style="text-decoration: none; color: black;"><?=$msg_cont?></a></div>
   		<div id="list_item4" style="margin-top: 10px;" ><?=$send_time?> 읽음 </div>
  		<?php
        }
    }else{
       if($read == "0"){
           ?>
   		<div id="list2" style="margin-top: 10px;"><?=$r_id."님"?>에게 보낸 메세지&nbsp</a></div>
   		<div id="list2" style="margin-top: 10px;"><?=$msg_cont?></div>
   		<div id="list_item4" style="margin-top: 10px;"><?=$send_time?> <b>안읽음</b></div>
   		<?php
   	    }else{
   	    ?>
   		<div id="list2" style="margin-top: 10px;"><?=$r_id."님"?>에게 보낸 메세지 &nbsp</a></div>
   		<div id="list2" style="margin-top: 10px;"><?=$msg_cont?></div>
   		<div id="list_item4" style="margin-top: 10px;" ><?=$send_time?> 읽음</div>
  		<?php
        }


}?>


   </div>

   <hr>

   <div class="clear2"></div>
     <?php
      }
      ?>
     	<div id='page_box' style="text-align: center;">
		<?PHP
                #----------------이전블럭 존재시 링크------------------#
                if($start_page > $pages_scale){
                   $go_page= $start_page - $pages_scale;
                   echo "<a id='before_block' href='message.php?mode=$mode&page=$go_page'> << </a>";
                }
                #----------------이전페이지 존재시 링크------------------#
                if($pre_page){
                    echo "<a id='before_page' href='message.php?mode=$mode&page=$pre_page'> < </a>";
                }
                 #--------------바로이동하는 페이지를 나열---------------#
                for($dest_page=$start_page;$dest_page <= $end_page;$dest_page++){
                   if($dest_page == $page){
                        echo( "&nbsp;<b id='present_page'>$dest_page</b>&nbsp" );
                    }else{
                        echo "<a id='move_page' href='message.php?mode=$mode&page=$dest_page'>$dest_page</a>";
                    }
                 }
                 #----------------이전페이지 존재시 링크------------------#
                 if($next_page){
                     echo "<a id='next_page' href='message.php?mode=$mode&page=$next_page'> > </a>";
                 }
                 #---------------다음페이지를 링크------------------#
                if($total_pages >= $start_page+ $pages_scale){
                  $go_page= $start_page+ $pages_scale;
                  echo "<a id='next_block' href='message.php?mode=$mode&page=$go_page'> >> </a>";
                 }
       ?>
   </div>


      <?php
      if(isset($id)){

      ?>
      <a href="../index.php"><img src="./img/cancelemail.png" alt=""> </a>
      <a href="#" onclick="message_form()" ><img src="./img/sendmail.png"></a>

      <?php
      }
      ?>

   </article>

</body>
</html>
