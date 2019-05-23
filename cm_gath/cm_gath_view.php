<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_gath/lib/commu_func.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/alert_back.php";
$num = $id = $subject = $content = $day=$hit=$q_num="";
$userid = 13;
$username = 12;
$usernick = 11;

if(empty($_GET['page'])){
  $page=1;
} else{
  $page = $_GET['page'];
}
//***************************************
if(isset($_GET["num"])&&!empty($_GET["num"])){
      $num = test_input($_GET["num"]);
      $hit = test_input($_GET["hit"]);

      $q_num = mysqli_real_escape_string($conn, $num);//스크립트에 관련된 문자를 모두다 문자로 인식하게 만든다. 인젝션 방어

      $sql = "UPDATE `commu` SET `hit` = $hit WHERE `num` = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }


      $sql = "SELECT * from `commu` where num = '$q_num';";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($conn));
      }
      $row=mysqli_fetch_array($result);
      $id=$row['id'];
      $hit=$row['hit'];
      $subject=htmlspecialchars($row['subject']);//스크립트 오류를 방어하기 위해서
      $content= htmlspecialchars($row['content']);
      $subject=str_replace("\n", "<br>",$subject);
      $subject=str_replace(" ", "&nbsp;",$subject);
      $content=str_replace("\n", "<br>",$content);
      $content=str_replace(" ", "&nbsp;",$content);
      // $is_html=$row['is_html'];
      $file_name_0=$row['file_name_0'];
      $file_copied_0=$row['file_copied_0'];
      $file_type_0=$row['file_type_0'];
      $day=$row['regist_day'];

      //숫자 0 "" " " '0' null 0.0 $a=array() 다 비어있는거
      if (!empty($file_copied_0)&& $file_type_0 =='image' ) {
        //이미지 정보를 가져오게 하는 방법이다  width height type
        $image_info = getimagesize("./data/".$file_copied_0);
        $image_width = $image_info[0];
        $image_height = $image_info[1];
        $image_type = $image_info[2];
        if ($image_width>300) {
          $image_width = 300;
        }
      }else{
        $image_width = 0;
        $image_height = 0;
        $image_type = "";
      }

}
//***************************************

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="/css/view.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/cm_gath_view.css">
  <script type="text/javascript" src="./js/member_form.js?var=1"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <title></title>
</head>
  <body>
    <div class="main_body">
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
      <script src="../../js/effect_common.js"></script>
      <div class="main_body">
        <div id="sidenav" class="sidenav">
          <a href="../cm_free_/cm_free_exhibit.php">모임 게시판</a>
          <a href="../cm_gath_/cm_gath_exhibit.php">자유게시판</a>
          <a href="../cm_rv_/cm_rv_exhibit.php">성공후기</a>
          <a href="../cm_qna_/cm_qna_exhibit.php">QnA</a>
        </div>

      <div class="main">
       <div id="col2">
         <div id="title">모임 게시판</div>
         <div class="clear"> </div>
           <div id="write_form">
             <div class="write_line"></div>
             <div id="write_row1">
               <div class="col1">아이디</div>
               <div class="col2"><?=$id?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 조회 : <?=$hit?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;날짜 : <?=$day?>
               </div>
             </div><!--end of write_row1  -->
             <div id="write_row2">
               <div class="col1">제&nbsp;&nbsp;목</div>
               <div class="col2">

                 <input type="text" name="subject" value="<?=$subject?>" readonly> </div>

             </div><!--end of write_row2  -->
             <div class="write_line"></div>
             <div  id="view_content">

               <div class="col2">
                 <?php
                 if ($file_type_0 =='image') {
                  echo  "<img src='./data/$file_copied_0'  width='$image_width'><br>";

                } else if ((!empty($_SESSION['userid']) && !empty($file_copied_0))){
                   //************************************

                   //1해당된 가입자이고, 파일이 있으면 파일명과 파일사이즈 실제위치 정보 확인

                       $file_path = "./data/".$file_copied_0;
                       $file_size = filesize($file_path);

                       //2 업로드된 이름으로 보여주고 저장을 할건지 선택하게 한다.
                       echo ("
                         ▷첨부파일 : $file_name_0 ($file_size Byte)
                         <a href='download.php?mode=download&num=$q_num'>저장</a><br><br>
                       ");



                    //***********************************
                 }

                  ?>
                 <?=$content?> </div>

             </div><!--end of write_row3  -->
             <div class="write_line"></div>
           </div><!--end of write_form  -->

<!-- ********************************* -->




<!-- ********************************* -->
           <div id="write_button">

             <a href="./cm_gath_list.php?page=<?=$page?>">목 록 </a>

             <?php
               if (isset($_SESSION['userid'])) {
                 if($_SESSION['userid']=="admin" || $_SESSION['userid']==$id){

                   echo '<a href="./cm_gath_write.php?mode=update&num='.$num.'">수 정</a>';

                   echo '<button onclick = "check_delete('.$num.')">삭 제</button>';


                 }

               }
                if (!empty($_SESSION['userid'])) {
                  echo '<a href="cm_gath_write.php?mode=response&num='.$num.'"><br>답변<br></a>';
                  echo '<a href="cm_gath_write.php"><br>글쓰기<br></a>';
                }
              ?>
           </div><!--end of write_button  -->

       </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
 <!-- fieldset -->
