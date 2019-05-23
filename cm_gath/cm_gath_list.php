<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/alert_back.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";

create_table($conn,'commu');//자유게시판테이블생성



define('SCALE', 10);
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_content="";
$total_record=0;
$userid = 13;
$username = 12;
$usernick = 11;

if(isset($_GET["mode"])&&$_GET["mode"]=="search"){
  //제목 내용 아이디
  $find = test_input($_POST["find"]);
  $search = test_input($_POST["search"]);
  $q_search = mysqli_real_escape_string($conn, $search);
  $sql = "SELECT * from `commu` where $find like '%$q_search%' order by num desc;";


}else {
  $sql="SELECT * from `commu` order by group_num desc";

}
$result=mysqli_query($conn,$sql);
$total_record=mysqli_num_rows($result);//총레코드수
//1.전체페이지, 2.디폴트페이지, 3.현재페이지 시작번호 4.보여줄리스트번호
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
    <!-- <link rel="stylesheet" href="/css/view.css"> -->
    <link rel="stylesheet" href="../css/header_sidenav.css">
    <link rel="stylesheet" href="./css/cm_gath_list.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <title></title>
  </head>
  <body>
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

          <div id="title1">
            여기로 모여주세요.
          </div>
         <hr>

         <form name="board_form" action="cm_gath_list.php?mode=search" method="post">
           <div id="list_search">
             <div id="list_search1">총 <?=$total_record?>개의 게시물이 있습니다.</div>
             <div id="list_search2">선택</div>
             <div id="list_search3">
               <select name="find">
                 <option value="subject">제목</option>
                 <option value="content">내용</option>
                 <option value="id">아이디</option>
               </select>
             </div><!--end of list_search3  -->
             <div id="list_search4"><input type="text" name="search" ></div>
             <div id="list_search5"><button type="submit">검색</button> </div>

           </div><!--end of list_search  -->
         </form>
         <div id="clear"> </div>
         <div id="list_top_title"><br><hr>
           <table id="customers">
             <tr>
               <td id="list_title1">번호</td>
               <td id="list_title2">제목</td>
               <td id="list_title3">글쓴이</td>
               <td id="list_title4">등록일</td>
               <td id="list_title5">조회</td>
             </tr>
           </table>

         </div><!--end of list_top_title  -->
         <div id="list_content">


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

            $subject=str_replace("\n", "<br>",$subject);
            $subject=str_replace(" ", "&nbsp;",$subject);
            $depth=(int)$row['depth'];//공간을 몇 칸을 띄워야 할지
            $space="";//depth의 앞 공간을 띄워주는 역할
            for ($j=0; $j <$depth ; $j++) {
              $space="&nbsp;&nbsp;".$space;
            }
            //$subject=nl2br($subject);
        ?>
            <div id="list_item">
              <table id="customers">
                <tr>
                  <td id="list_title1"><?=$number?></td>
                  <td id="list_title2"><a href="./cm_gath_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$subject?></a></td>
                  <td id="list_title3"><?=$id?></td>
                  <td id="list_title4"><?=$date?></td>
                  <td id="list_title5"><?=$hit?></td>
                </tr>
              </table>
            </div><!--end of list_item  -->

        <?php
            $number--;
         }//end of for
        ?>
 <br><br>
        <div id="page_button">
        <div id="page_num"> 이전&nbsp;◀ &nbsp;&nbsp;&nbsp;&nbsp;
        <?php
          for ($i=1; $i <= $total_page ; $i++) {
            if($page==$i){
              echo "<b>&nbsp;$i&nbsp;</b>";
            }else{
              echo "<a href='./cm_gath_list.php?page=$i'>&nbsp;$i&nbsp;</a>";
            }
          }
        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;▶ &nbsp;다음
        <br><br><br>
        </div>
        <div id="button">
          <button type="button" name="button"><a href="./cm_gath_list.php?page=<?=$page?>" id="list_page1">목  록</a></button>

          <?php //세션 아이디가 있으면 글쓰기 버튼을 보여준다
          if (!empty($_SESSION['userid'])) {
            echo '<button type="button" name="button"><a href="./cm_gath_write.php?page=<?=$page?>" id="write_page1">글쓰기</a></button>';
          }



           ?>
        </div>
        </div><!--end of page_button  -->
      </div><!--end of list_content  -->
       </div><!--end of col2  -->
      </div><!--end of content -->
    </div><!--end of wrap  -->
  </body>
</html>
 <!-- fieldset -->
