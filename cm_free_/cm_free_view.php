<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/common.css">
     <link rel="stylesheet" href="/css/view.css">
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
         <div class="tabcontent-header">
           NOTICE
         </div>
         <hr class="div_hr">
         <div class="sub_view_content">
           <div class="pre_next_list">
             <div class="to_pre_next_btn">
               <button type="button"><a href="./cm_free_view.php?num=<?=$pre_num?>&page=<?=$page?>&hit=<?=$hit+1?>">▼이전글</a></button>
               <button type="button"><a href="./cm_free_view.php?num=<?=$next_num?>&page=<?=$page?>&hit=<?=$hit+1?>">▲최신글</a></button>
               <div class="to_list_btn">
                 <button type="button"><a href="./cm_free_exhibit.php?page=<?=$page?>">목록</a></button>
               </div>
             </div>
           </div>
           <hr>
           <table class="id_hit_rgday">
             <tr>
               <td class="ihr_id">아이디&nbsp;&nbsp;<?=$id?></td>
               <td class="ihr_hit_rgday">조회&nbsp;&nbsp;<?=$hit?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$day?></td>
             </tr>
           </table>
           <hr>
           <table class="subject_slt_id_con">
             <tr>
               <td class="ssic_sbj"><input type="text" name="subject" value="<?=$subject?>" readonly></td>
               <td class="ssic_slt_id">
                 <form name="board_form" action="./cm_free_exhibit.php?mode=select_id_content" method="post">
                   <input type="hidden" name="writer" value="<?=$id?>">
                   <button type="submit">이 작성자의 게시글 보기</button>
                 </form>
               </td>
             </tr>
           </table>
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
              ?>
              <textarea readonly rows="15"><?=$content?></textarea>
           </div>
           <hr class="div_hr">

           <div class="save_wri_del_edit">

           </div>
         </div>
       </div>
   </body>
 </html>
