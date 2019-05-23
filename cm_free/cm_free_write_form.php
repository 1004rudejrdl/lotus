<?php
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

$num = $id = $subject = $content = $day = $hit = $rip_checked = $scr_checked = "";
$mode="insert_cm_free";
$secret="n";
$no_ripple="n";
// if (isset($_SESSION['userid'])&&!empty($_SESSION['userid'])) {
//   $id=$_SESSION['userid'];
// }
$page=(isset($_GET['page'])&&!empty($_GET['page']))?(test_input($_GET['page'])):(1);
  // update면 해당글이고 response면 부모의 글이다.
if(isset($_GET['mode']) && $_GET['mode']=="update_cm_free"||(isset($_GET['mode']) && $_GET['mode']=="response_cm_free")){
  $mode= $_GET['mode'];//update or response
  $num=test_input($_GET['num']);
  $page=test_input($_GET['page']);
  $q_num = mysqli_real_escape_string($conn, $num);

//auto increament는 null
  $sql="SELECT * from `commu` where num = '$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      alert_back('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $id = $row['id'];
    $subject=$row['subject'];
    $subject=$row['subject'];
    $subject=str_replace("<br>", "\n",$subject);
    $subject=str_replace("&nbsp;", " ",$subject);
    $content=$row['content'];
    $content=str_replace("<br>", "\n",$content);
    $content=str_replace("&nbsp;", " ",$content);
    $day = $row['regist_day'];
    $hit = $row['hit'];
    $secret = $row['secret'];
    $scr_checked=($secret=="y")?("checked"):("");
    $no_ripple = $row['no_ripple'];
    $rip_checked=($no_ripple=="y")?("checked"):("");
    $file_name_0=$row['file_name_0'];
    $file_copied_0=$row['file_copied_0'];
    $file_type_0 = $row['file_type_0'];
    //확장자 소문자 변환
    $file_type_0 = strtolower($file_type_0);

    // 숫자 0, 0.0, "", " ",'0', null $a = array() 비어있는 것. 전부 트루.
    if (!empty($file_copied_0)) {
      // getimagesize($filename)[0]폭,[1]높이,[2]형식 정보를 가져온다
      $image_info=getimagesize("./data/".$file_copied_0);
      $image_width = $image_info[0];
      $image_height = $image_info[1];
      $image_type = $image_info[2];
      if ($image_width>500) $image_width = 500;
    }else{
      $image_width = 0;
      $image_height = 0;
      $image_type = "";
    }

    if ($mode=="response_cm_free") {
      $subject="[RE]".$subject;
      $content="RE > ".$content;
      $content=str_replace("<br>","\n▶",$content);
      $disabled="disabled";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/write_form.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>

<body>
  <!-- header start -->
    <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
    <script src="../js/effect_common.js"></script><!-- Sticky event를 위해서 상단에 올리지 못함 -->
  <!-- header end -->
      <div class="main_body">
        <div id="sidenav" class="sidenav">
          <a href="../cm_free/cm_free_exhibit.php">자유게시판</a>
          <a href="../cm_gath_/cm_gath_exhibit.php">모임</a>
          <a href="../cm_rv_/cm_rv_exhibit.php">성공후기</a>
          <a href="../cm_qna_/cm_qna_exhibit.php">QnA</a>
        </div><!-- sidenav end -->
      </div> <!-- sub-tab-contents end -->
  <!-- content start -->
  <div class="main">


  <?php

  ?>
  <div id="cm_free" class="tabcontent">
    <!-- id for openTabContent() -->
    <div class="tabcontent-header">
      NOTICE
      <?php
      if ($_GET['mode']=="update_cm_free") {
        echo "수정";
      }
     ?>
    </div>
    <hr class="div_hr">

    <div class="tabcontent-input">
      <!-- tabcontent-input -->
      <div class="pre_next_list">
        <div class="to_pre_next_btn">
          <div class="to_list_btn">
            <button type="button"><a href="./cm_free_exhibit.php?page=<?=$page?>">목록</a></button>
          </div>
        </div>
      </div> <!-- pre_next_list end -->
      <hr class="div_hr">

      <form name="board_form" action="./cm_free_query.php?mode=<?=$mode?>" method="post" enctype="multipart/form-data">
        <!-- 페이지 정보 넘기기 위해서 hidden -->
        <input type="hidden" name="num" value="<?=$num?>">
        <input type="hidden" name="hit" value="<?=$hit?>">
        <input type="hidden" name="page" value="<?=$page?>">

        <table class="subject_slt_id_con">
          <tr>
            <td class="ssic_sbj">제 목</td>
            <td class="ssic_sbj"><input type="text" name="subject" value="<?=$subject?>"></td>
          </tr>
        </table> <!-- end of subject_slt_id_con -->
        <hr class="div_hr">

        <div class="content_txt_img">
          <?php
            if (isset($file_copied_0)&&!empty($file_copied_0)&&$file_copied_0!="") {
              switch ($file_type_0) {
                case 'jpg': case 'jpeg':
                case 'png': case 'gif':
                case 'bmp': case 'tiff':
                case 'svg':
                echo '<img src="./data/'.$file_copied_0.'" width='.$image_width.'>';
                default:
                  break;
              }
            }
            ?>

          <textarea name="content" rows="20"><?=$content?></textarea>
        </div><!-- end of content_txt_img -->
        <hr class="div_hr">

        <table class="add_file_tb">
          <tr class="tb_border">
            <td class="ssic_sbj">비밀글</td>
            <td class="ssic_sbj"><input type="checkbox" id="secret" name="secret" value="y" <?=$scr_checked?>> 관리자와 작성자만 볼 수 있습니다</td>
          </tr>
          <tr class="tb_border">
            <td class="ssic_sbj">덧글허용</td>
            <td class="ssic_sbj"><input type="checkbox" id="no_ripple" name="no_ripple" value="y" <?=$rip_checked?>> 덧글을 허용하지 않습니다</td>
          </tr>
          <tr>
            <td class="ssic_sbj">첨부파일</td>
            <td class="ssic_sbj">
              <?php
                if ($mode=="insert_cm_free") {
                  echo '<input type="file" name="upfile"><td>';
                }else{
                ?>
              <input type="file" name="upfile" onclick='document.getElementById("del_file").checked=true; document.getElementById("del_file").disabled=true'>
              </td>
          </tr>
        </table>
        <hr class="div_hr">
        <div class="add_file_show">
          <div class="af_thumb">
            <?php
              if (isset($file_copied_0)&&!empty($file_copied_0)&&$file_copied_0!="") {
                switch ($file_copied_0) {
                  case 'jpg': case 'jpeg':
                  case 'png': case 'gif':
                  case 'bmp': case 'tiff':
                  case 'svg':
                  echo '<img src="./data/'.$file_copied_0.'" width="120px"><br>';
                  default:
                    break;
                }
              }
              if($mode=="update_cm_free" && !empty($file_name_0)){
                echo "&nbsp;$file_name_0&nbsp;";
                echo '<input type="checkbox" id="del_file" name="del_file" value="1">삭제</div><hr class="div_hr">';
              }
              }
              ?>
        </div>          <!-- add_file_show end -->

        <div class="save_wri_del_edit">
          <div class="btn_wde">
            <button><input type="submit" value="완료"></button>
            <button><a href="./cm_free_exhibit.php?page=<?=$page?>">목록</a></button>
          </div> <!-- btn_wde end -->
        </div> <!-- end of save_wri_del_edit -->
      </form>
    </div> <!-- tabcontent-input end -->
  </div> <!--end of tabcontent  -->
</div> <!--end of sub-content -->
  </div>
<script src="../js/effect_common.js"></script>
</body>

</html>
