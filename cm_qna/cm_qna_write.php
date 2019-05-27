<?php

include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_qna/lib/session_call.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";;
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_qna/lib/alert_back.php";

$num = $id = $subject = $content = $day = $hit="";
$mode = "insert";
$id = $_SESSION['userid'];
$board_type = "q";


if((isset($_GET["mode"])&&($_GET["mode"])=='update')
|| (isset($_GET["mode"])&&($_GET["mode"])=='response')){
  $mode = $_GET["mode"];//업데이트가오면 업데이트 리스펀스가오면 리스펀스
  $num = test_input($_GET["num"]);
  $q_num = mysqli_real_escape_string($conn, $num);
  //업데이트면 해당 된글 리스펀스이면 부모의 해당된 글을 가져온다
  $sql = "SELECT * from `commu` where num = '$q_num';";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $row=mysqli_fetch_array($result);
  $id=$row['id'];
  $subject=htmlspecialchars($row['subject']);//스크립트 오류를 방어하기 위해서
  $content= htmlspecialchars($row['content']);
  $subject=str_replace("\n", "<br>",$subject);
  // $subject=str_replace(" ", "&nbsp;",$subject);
  $content=str_replace("\n", "<br>",$content);
  // $content=str_replace(" ", "&nbsp;",$content);
  $day=$row['regist_day'];
  // $is_html=$row['is_html'];
  // $checked=($is_html=='y')?('checked'):("");

  $hit=$row['hit'];

  if ($mode == "response") {
    $subject=$subject."의 [답변]";
    // $content = $content."리플>>";
    $content=str_replace("<br>", "<br>▶",$content);
    $disabled="disabled";
  }

  mysqli_close($conn);

//end of if rowcount

}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="/css/view.css">
    <link rel="stylesheet" href="../css/header_sidenav.css">
    <link rel="stylesheet" href="./css/cm_qna_write.css">
    <!-- <link rel="stylesheet" href="./css/cm_gath_view.css"> -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <title></title>
  </head>
  <body>
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
      <script src="../../js/effect_common.js"></script>

      <div class="main_body">
        <div id="sidenav" class="sidenav">
          <a>커뮤니티</a>
          <a href="../cm_free/cm_free_list.php" style="color: rgba(252, 105, 105, 1);">자유 게시판</a>
          <a href="../cm_gath/cm_gath_list.php" style="color: rgba(252, 105, 105, 1);">모임 게시판</a>
          <a href="../cm_rv/cm_rv_list.php" style="color: rgba(252, 105, 105, 1);">성공후기</a>
          <a href="../cm_qna/cm_qna_list.php" style="color: rgba(252, 105, 105, 1);">QnA</a>
        </div>
      <div class="main">

       <div id="col2">
         <div id="title1">질문 하기</div> <hr>


         <div class="clear"></div>
         <form name="board_form" action="./dml_board.php?mode=<?=$mode?>" method="post" enctype="multipart/form-data">
           <input type="hidden" name="num" value="<?=$q_num?>">
           <input type="hidden" name="hit" value="<?=$hit?>">
           <input type="hidden" name="board_type" value="<?=$board_type?>">
           <div id="write_form">

             <table id="write_table">
               <tr>
                 <td id="write_row1"> 아이디</td> <td style="font-size:16px;"> &nbsp;&nbsp;<?=$id?></td>
               </tr>
               <tr>
                 <td id="write_row2">제&nbsp;&nbsp;&nbsp;목</td><td> <input type="text" name="subject" value="<?=$subject?>" style="width:700px;"></td>
               </tr>
               <tr>
                 <td id="write_row3"> 내&nbsp;&nbsp;&nbsp;용</td><td><textarea name="content" rows="15" cols="79"><?=$content?></textarea></td>
               </tr>
               <tr>
                 <td colspan="2">
                    <div id="write_row4">
                      <div class="col1"></div>
                      <div class="col2">
                        <?php
                        if ($mode=='insert') {
                          echo '<input type="file" name="upfile" (이미지 : 2MB)  (파일 : 0.5MB)>';
                        }else{
                          ?>
                          <input type="file" name="upfile" onclick="document.getElementById('del_file').checked=true;document.getElementById('del_file').disabled=true">
                          <?php
                        }
                         ?>
                        </div>
                      <?php //세션 아이디가 있으면 글쓰기 버튼을 보여준다
                      if ($mode=="update" && !empty($file_name_0)) {
                        ?>
                        <?=$file_name_0?> 파일이 등록 되어있습니다.
                         <input type="checkbox" id="del_file" name="del_file" value="1">삭제

                       <div class="clear"> </div>
                       <?php
                      }

                      ?>
                    </div><!--end of write_row4  -->
                  </td>
               </tr>
             </table>

             <div class="clear"> </div>

             <div class="write_line"></div>

             <div class="clear"> </div><br>
           </div><!--end of write_form  -->
           <!-- <div id="write_button"> -->
           <button type="button" name="button"><a href="./cm_qna_list.php" id="list_page1">목 록</a></button>
             <button type="submit" id="write_page1" name="button" onclick="document.getElementById('del_file').disabled=false">확 인</button>

           <!-- </div-- ><!--end of write_button  -->
         </form>
       </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
 <!-- fieldset -->
