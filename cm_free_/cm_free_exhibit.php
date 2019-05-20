<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/free.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <script src="../../js/effect_common.js"></script>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="../cm_free_/cm_free_exhibit.php">자유게시판</a>
  <a href="../cm_gath_/cm_gath_exhibit.php">모임</a>
  <a href="../cm_rv_/cm_rv_exhibit.php">성공후기</a>
  <a href="../cm_qna_/cm_qna_exhibit.php">QnA</a>
</div><!-- sidenav end -->
<div class="main">
  <div class="free_header">
    <span class="notice">NOTICE</span>
  </div>
  <div class="list_search_bar">
    <form class="board_form" action="./cm_free_exhibit.php?mode=search" method="post">
        <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;개의 게시물이 있습니다.</div>
        <button class="list_search" type="submit">검색</button>
        <div class="search_input">
          <input type="text" name="search">
        </div>
        <div class="btn_search">
          <select name="find">
            <option value="subject">제목</option>
            <option value="content">내용</option>
            <option value="id">아이디</option>
          </select>
        </div>
        <div class="search_title">찾기</div>
    </form>
  </div>
  <table class="list_header_tb">
    <tr>
      <td class="list_hd_num">번호</td>
      <td class="list_hd_sbj">제목</td>
      <td class="list_hd_writer">글쓴이</td>
      <td class="list_hd_rgt_day">등록일</td>
      <td class="list_hd_hit">조회</td>
    </tr>
  </table>
  <table class="sub_list_content">
    <?php
    $i="";
    for ($i=$start; $i <$start+SCALE && $i<$total_record; $i++) {
      mysqli_data_seek($result,$i);
      $row=mysqli_fetch_array($result);
      $num=$row['num'];
      $id=$row['id'];
      $subject=$row['subject'];
      $subject=str_replace("\n", "<br>",$subject);
      $subject=str_replace(" ", "&nbsp;",$subject);
      $date=substr($row['regist_day'], 0,10);
      $hit=$row['hit'];
      $secret=$row['secret'];
      $depth=$row['depth'];
      $space="";
      for ($j=0; $j < $depth; $j++) {
        $space="└".$space;
      }

     ?>
     <tr class="sub_list_item">
       <td class="list_con_num"><?=$i+1?></td>
       <td class="list_con_sbj">
         <?php
         if ($secret=="y") {
         ?>
           <i class="fa fa-lock"></i>
           <?php
         if(!empty($_SESSION['userid'])&&($_SESSION['userid']=="admin"||$_SESSION['userid']==$id)){
           ?>
           <a href="./cm_free_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$space?>&nbsp;<?=$subject?></a>
             <?php
           } else if (empty($_SESSION['userid'])||$_SESSION['userid']!=$id){
             echo '비밀글 입니다';
           }
         }else {
           ?>
           <a href="./cm_free_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$space?>&nbsp;<?=$subject?></a>
           <?php
         }
         ?>
       </td>
       <td class="list_con_writer"><?=$id?></td>
       <td class="list_con_rgt_day"><?=$date?></td>
       <td class="list_con_hit"><?=$hit?></td>
     </tr>
     <?php
   }
      ?>
  </table>
  <?php
  if (!empty($_GET["mode"])&&$_GET["mode"]=="select_id_content") {
    echo '<button class="btn_write"><a href="./cm_free_exhibit.php?page=1">목록</a></button>';
  }
    echo '<button class="btn_write"><a href="./cm_free_write_form.php?mode=insert_cm_free&page='.$page.'">글쓰기</a></button>';
   ?>
   <div class="page_to">
     <a href="./cm_free_exhibit.php?page=1"><<</a>
     <?php
     if ($page>1) {
       $page_go=$page-1;
       echo '<a class="previous" href="./cm_free_exhibit.php?page='.$page_go.'">이전 <</a>';
     }else {
       echo '<a class="previous" href="./cm_free_exhibit.php?page=1">이전 <</a>';
     }
     for ($i=1; $i <=$total_page ; $i++) {
       if ($page==$i) {
         echo "<a>&nbsp;$i&nbsp;</a>";
       }else {
          echo "<a href='./cm_free_exhibit.php?page=$i'>&nbsp;$i&nbsp;</a>";
       }
     }
     if ($total_page==0) {
       echo '<a class="next" href="./cm_free_exhibit.php?page=1">> 다음</a>';
     }elseif ($page+1>$total_page) {
       $page_end=$total_page;
       echo '<a class="next" href="./cm_free_exhibit.php?page='.$page_end.'">> 다음</a>';
     }else{
       $page_go=$page+1;
       echo '<a class="next" href="./cm_free_exhibit.php?page='.$page_go.'">> 다음</a>';
     }
     ?>
  <a href="./cm_free_exhibit.php?page=<?=$total_page?>">>></a>
   </div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
