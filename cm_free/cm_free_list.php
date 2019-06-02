
<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/cm_free/lib/alert_back.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";

define('SCALE', 10);
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_content="";
$total_record=0;
$userid = $_SESSION['userid'];

if(isset($_GET["mode"])&&$_GET["mode"]=="search"){

  $find = test_input($_POST["find"]);
  $search = test_input($_POST["search"]);
  $q_search = mysqli_real_escape_string($conn, $search);
  $sql = "SELECT * from `commu` where $find like '%$q_search%' order by num desc;";

}else {

  $sql="SELECT * from `commu` where board_type = 'f' order by group_num desc";

}
$result=mysqli_query($conn,$sql);
$total_record=mysqli_num_rows($result);//총레코드수

//1.전체페이지
$total_page=($total_record % SCALE == 0 )?
($total_record/SCALE):(ceil($total_record/SCALE));
//2.페이지가 없으면 디폴트 페이지 1페이지

if(!isset($_GET['page']) || empty($_GET['page'])){
  $page=1;
} else{
  $page = $_GET['page'];
}
//3.현재페이지 시작번호계산함.
$start=($page -1) * SCALE;
//4. 리스트에 보여줄 번호를 최근순으로 부여함.
$number = $total_record - $start;
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/header_sidenav.css">
    <link rel="stylesheet" href="../css/board_list.css">
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
            자유게시판
          </div>
         <hr class="title_hr">
         <div class="list_search_bar">
           <form name="board_form" action="cm_free_list.php?mode=search" method="post">
             <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;개의 게시물이 있습니다.</div>
               <!-- float right 순서 거꾸로 올려야함 -->
               <button class="lsb_btn_srch" type="submit">검색</button>
               <div class="lsb_input"><input type="text" name="search"></div>
               <div class="lsb_select">
                 <select name="find">
                   <option value="subject">제목</option>
                   <option value="content">내용</option>
                   <option value="id">아이디</option>
                 </select>
               </div>
               <!-- <div class="lsb_title">찾기</div> -->
             </form>
             <!-- 상단에 찾기 기능 끝 -->
         </div>      <!-- search_mem_fbd end -->
         <hr class="title_hr">
         <table class="list_header_tb">
           <tr>
             <td class="li_hd_num">번호</td>
             <td class="li_hd_sbj">제목</td>
             <td class="li_hd_writer">글쓴이</td>
             <td class="li_hd_rgt_day">등록일</td>
             <td class="li_hd_hit">조회</td>
           </tr><!-- fbd_list_header end  번호 제목 글쓴이 등록일 조회-->
         </table>
         <table class="submain_list_content">
         <?php
          for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
            mysqli_data_seek($result,$i);//해당된 포인트 위치로 간다
            $row=mysqli_fetch_array($result);
            $num=$row['num'];
            $id=$row['id'];
            $hit=$row['hit'];
            $date=substr($row['regist_day'], 0,10) ;
            $subject=$row['subject'];
            $content=$row['content'];
            $board_type=$row['board_type'];

            $subject=str_replace("\n", "<br>",$subject);
            $subject=str_replace(" ", "&nbsp;",$subject);
            $depth=(int)$row['depth'];//공간을 몇 칸을 띄워야 할지
            $space="";//depth의 앞 공간을 띄워주는 역할
            for ($j=0; $j <$depth ; $j++) {
              $space="&nbsp;&nbsp;".$space;
            }
            //$subject=nl2br($subject);
            if ($board_type=="f") {

            ?>
                <tr class="submain_list_item">
                  <td class="li_con_num"><?=$number?></td>
                  <td class="li_con_sbj"><a href="./cm_free_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$subject?></a></td>
                  <td class="li_con_writer"><?=$id?></td>
                  <td class="li_con_rgt_day"><?=$date?></td>
                  <td class="li_con_hit"><?=$hit?></td>
                </tr>
            <?php
                $number--;
              }
            }//end of for
        ?>
          </table> <!-- submain_list_content end -->
          <div>
            <!-- <button type="button" name="button"><a href="./cm_gath_list.php?page=<=$page?>" id="list_page1">목  록</a></button> -->
            <?php
                //세션 아이디가 있거나 매칭번호가 있으면 글쓰기 버튼을 보여준다
              if (!empty($_SESSION['userid'])) {
                echo '<button class="btn_write" type="button" name="button"><a href="./cm_free_write.php?page='.$page.'" id="write_page1">글쓰기</a></button>';
              }
             ?>
          </div>
          <?php
            if ($total_record!=null) {
            ?>
          <hr class="title_hr">
          <div class="page_to" >
            <div class="page_to_in" >
            <a href="./cm_free_list.php?page=1">◀◀</a>
            <?php
            if ($page>1) {
                  $page_go=$page-1;
                   echo '<a class="previous" href="./cm_free_list.php?page='.$page_go.'">이전 ◀</a>';
                 }else {
                   echo '<a class="previous" href="./cm_free_list.php?page=1">이전 ◀</a>';
                 }
                 for ($i=1; $i <= $total_page ; $i++) {
                   if($page==$i){
                     echo "<a>&nbsp;$i&nbsp;</a>";
                   }else{
                     //싱글쿼테이션은 문자로 인식하지 않는다
                     //더블은 문자로 인식
                     echo "<a href='./cm_free_list.php?page=$i'>&nbsp;$i&nbsp;</a>";
                   }
                 }
                 if ($total_page==0) {
                   echo '<a class="next" href="./cm_free_list.php?page=1">▶ 다음</a>';
                 }elseif ($page+1>$total_page) {
                   $page_end=$total_page;
                   echo '<a class="next" href="./cm_free_list.php?page='.$page_end.'">▶ 다음</a>';
                 }else{
                   $page_go=$page+1;
                   echo '<a class="next" href="./cm_free_list.php?page='.$page_go.'">▶ 다음</a>';
                 }
                 ?>
              <a href="./cm_free_list.php?page=<?=$total_page?>">▶▶</a>
          </div> <!-- page_to in end 페이지 이동 -->
          </div> <!-- page_to end 페이지 이동 -->
          <?php
          }
        ?>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
       </div><!--main end  -->
     </div><!--main_body end -->
  </body>
</html>
 <!-- fieldset -->
