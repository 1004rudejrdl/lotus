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
               <td class="ihr_id">아이디&nbsp;&nbsp;&nbsp;<?=$id?></td>
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
             <?php
           if (!empty($file_copied_0)&&$file_copied_0!="") {
             $file_path = "./data/".$file_copied_0;
             $file_size = filesize($file_path);
             //2. 업로드된 파일의 이름을 보여주고 저장할 것인지를 선택하게 한다.
             echo "<br>
               ▷ 첨부파일 : $file_name_0 ($file_size Byte)&nbsp;
               <button class='to_save_btn' type='button'><a href='./lib/cus_complain_qurey.php?mode=download_cus_cmpl&num=$q_num'>저장</a></button>
             ";
           }else {
             echo "<br>";
           }
           ?>
           <?php
           ?>
               <div class="btn_wde">
                 <?php
                 if(!empty($_SESSION['userid'])){
                   echo '<button class="to_write_btn" type="button"><a href="./cm_free_write.php.php?mode=insert_cm_free&page='.$page.'">글쓰기</a></button>';
                   echo '<button class="to_response_btn" type="button"><a href="./cm_free_write.php?mode=response_cm_free&page='.$page.'&num='.$num.'">답변쓰기</a></button>';
                   if($_SESSION['userid']=="admin"||$_SESSION['userid']==$id){
                     if($_SESSION['userid']==$id){ //작성자만 수정가능
                       echo ('<button class="to_edit_btn" type="button"><a href="./cm_free_write.php?mode=update_cm_free&num='.$num.'&page='.$page.'">수정</a></button>');
                     }
                     echo ('<button class="to_delete_btn" type="button"><a href="./lib/cus_complain_qurey.php?mode=delete_cus_cmpl&num='.$num.'">삭제</a></button>');
                   }
                 }
                 ?>
               </div> <!-- btn_wde end -->
           </div>

                   <?php
                     if ($no_ripple!="y") { //덧글 허용시
                   ?>
                   <!-- 덧글내용시작  -->
                   <hr class="div_hr">
                   <br>
                   <div class="cus_complain_rip_div">
                     <div class="tabcontent-rip-output">
                       <div class="ripple-title">덧글</div>
                       <?php
                       $sql="SELECT * from `commu_ripple` where `parent`='$q_num' ";
                       $gu_ripple_result= mysqli_query($conn,$sql);
                       // if (!$result) {
                       //   die('Error: ' . mysqli_error($conn));
                       // }
                       while($gu_ripple_row = mysqli_fetch_array($gu_ripple_result)){
                         $gu_ripple_num=$gu_ripple_row['num'];
                         $gu_ripple_id=$gu_ripple_row['id'];
                         $gu_ripple_content=$gu_ripple_row['content'];
                         $gu_ripple_content=str_replace("\n", "<br>",$gu_ripple_content);
                         $gu_ripple_content=str_replace(" ", "&nbsp;",$gu_ripple_content);
                         $gu_ripple_date=$gu_ripple_row['regist_day'];
                         ?>
                         <div class="ripple-writer">
                           <div class="rip-wri-inline"><?=$gu_ripple_id?></div>
                           <div class="rip-wri-inline"><?=$gu_ripple_date?></div>
                           <div class="rip-wri-inline">
                             <?php
                             $message =guest_memo_delete("gu_ripple",$gu_ripple_id, $gu_ripple_num,'./lib/cus_complain_qurey.php',$page,$hit,$q_num);
                             echo $message;
                             ?>
                           </div>
                         </div>
                         <textarea class="mm_content_rip" rows="3"><?=$gu_ripple_content?></textarea>
                         <?php
                         //★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★★ 위에서 닫으면 안 열림
                       }//end of while
                       mysqli_close($conn);
                       ?>
                     </div> <!-- tabcontent-rip-output end 덧글 모두 출력 -->

                     <!-- 덧글 입력 시작 -->
                     <div class="tabcontent-rip-input">
                       <form name="ripple_form" action="./lib/cus_complain_qurey.php?mode=insert_cus_cmpl_rip" method="post">
                         <!-- 포스트 방식으로 값을 넘긴다 hidden 사용해서 보이지 않는다 -->
                         <input type="hidden" name="parent" value="<?=$q_num?>">
                         <input type="hidden" name="page" value="<?=$page?>">
                         <input type="hidden" name="hit" value="<?=$hit?>">
                         <input type="hidden" name="ripple_writer" value="<?=$_SESSION['userid']?>">

                         <textarea class="mm_rip_ta" name="ripple_content" rows="4"></textarea>
                         <button class="mm_rip_btn_sbm" type="submit">덧글<br>입력</button>
                         <!-- input type submit은 버튼으로 나타남 -->
                         <!--end of ripple_insert -->
                       </form>
                     </div> <!-- tabcontent-rip-input end 덧글 입력 끝 -->

                   </div>        <!-- cus_complain_rip_div end -->
                   <?php
                 }else {
                   echo '<hr class="div_hr"><br><br><div class="ripple-title">작성자가 덧글을 허용하지 않은 게시물입니다</div>';
                 }
                   ?>

         </div>
       </div>
   </body>
 </html>
