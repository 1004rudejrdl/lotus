<?php
$mode="insert_cm_free";
 ?>
 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/common.css">
     <link rel="stylesheet" href="./css/free.css">
     <link rel="stylesheet" href="../css/header_sidenav.css">
     <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
     <title></title>
   </head>
   <body>
     <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
     <script src="../../js/effect_common.js"></script>

     <div class="main_body">
       <div id="sidenav" class="sidenav">
         <a href="../cm_free_/cm_free_exhibit.php">자유게시판</a>
         <a href="../cm_gath_/cm_gath_exhibit.php">모임</a>
         <a href="../cm_rv_/cm_rv_exhibit.php">성공후기</a>
         <a href="../cm_qna_/cm_qna_exhibit.php">QnA</a>
       </div>
       <div class="main">
         <?php

          ?>
          <div id="cm_free" class="tabcontent">
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
              <div class="pre_next_list">
                <div class="to_pre_next_btn">
                  <div class="to_list_btn">
                    <button type="button"><a href="./cm_free_exhibit.php?page=<?=$page?>">목록</a> </button>
                  </div>
                </div>
              </div>
              <hr class="div_hr">
              <form name="board_form" action="./lib/cm_free_query.php?mode=<?=$mode?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="num" value="<?=$num?>">
                <input type="hidden" name="hit" value="<?=$hit?>">
                <input type="hidden" name="page" value="<?=$page?>">

                <table class="subject_slt_id_con">
                  <tr>
                    <td class="ssic_sbj">제 목</td>
                    <td class="ssic_sbj"><input type="text" name="subject" value="<?=$subject?>"></td>
                  </tr>
                </table>
                <hr>
                <div class="">
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
                </div>
              </form>
            </div>
          </div>
       </div>
     </div>
   </body>
 </html>
