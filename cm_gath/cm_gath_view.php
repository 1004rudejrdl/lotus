<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_gath/lib/commu_func.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_gath/lib/alert_back.php";
$num = $id = $subject = $content = $day=$hit=$q_num="";
$userid = $_SESSION['userid'];



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
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="../css/board_view.css">
  <script type="text/javascript" src="./js/member_form.js?var=1"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <title></title>
</head>
  <body>
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
      <script src="../../js/effect_common.js"></script>
        <div class="main_body">
          <div id="sidenav" class="sidenav">
            <a>커뮤니티</a>
            <a href="../cm_free/cm_free_list.php">자유게시판</a>
            <a href="../cm_gath/cm_gath_list.php">모임게시판</a>
            <a href="../cm_rv/cm_rv_list.php">성공후기</a>
            <a href="../cm_qna/cm_qna_list.php">QnA</a>
          </div>
          <div class="main">
          <div class="admin_title">
            모임게시판
          </div>
             <hr class="title_hr">
             <table class="list_header_tb">
               <tr class="submain_list_content">
                 <td class="li_hd_writer">아이디 : <?=$id?></td>
                 <td class="li_hd_hit">조회 : <?=$hit?></td>
                 <td class="li_hd_rgt_day">날짜 : <?=$day?></td>
               </tr>
               <tr>
                 <td colspan="3" class="li_hd_sbj">제&nbsp;&nbsp;&nbsp;목 : <input type="text" name="subject" value="<?=$subject?>" readonly></td>
               </tr>
              </table>
              <hr class="title_hr c_white">
               <div  class="view_content">
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
                  <hr class="title_hr c_white">
                  <?=$content?>
                </div>
              <hr class="title_hr">
              <div class="btn_center">
                <div class="btn_submit btn_5">
             <?php
             $sql2="SELECT * from `admin_authority` where id = '$userid';";
             $result2 = mysqli_query($conn, $sql2) or die("실패원인 : " . mysqli_error($conn));
             $row2 = mysqli_fetch_array($result2);
             $auth_commu = $row2['auth_commu'];
               if (isset($_SESSION['userid'])) {
                 if( $_SESSION['userid']==$id){
                   echo '<a href="./cm_gath_write.php?mode=update&num='.$num.'" class="write_page1">수 정</a>';
                   echo '<button onclick = "check_delete('.$num.')" class="list_page1">삭 제</button>';
                 }else if (!empty($auth_commu)) {
                   echo '<button onclick = "check_delete('.$num.')" class="list_page1">삭 제</button>';
                 }

               }
                if (!empty($_SESSION['userid'])) {
                  echo '<a href="./cm_gath_write.php?mode=response&num='.$num.'" class="write_page1">답 변</a>';
                  echo '<a href="./cm_gath_write.php" class="write_page1">글쓰기</a>';
                }
              ?>
            </div>           <!-- btn_submit end -->
            </div><!--end of btn_center -->
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            </div><!--end of main  -->
          </div><!--end of main_body  -->
        </body>
      </html>
            <!-- fieldset -->
