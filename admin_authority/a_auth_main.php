<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

  define('SCALE', 10);


  if(isset($_GET["mode"])&&$_GET["mode"]=="order_list_auth"){
    // $sql="SELECT * from `com_info` order by `com_num` desc";
    //제목(subject), 내용(content), 아이디(id)
          $order_list = test_input($_POST["order_list"]);
          $order_list = mysqli_real_escape_string($conn, $order_list);

    $sql="SELECT * from `admin_authority` order by `$order_list` asc";
  }else{
    $sql="SELECT * from `admin_authority` order by `id` asc";
  }



  $result=mysqli_query($conn,$sql);
  $total_record=mysqli_num_rows($result);//총레코드수

  //1.전체페이지, 2.디폴트페이지, 3.현재페이지 시작번호 4.보여줄리스트번호
  //1.전체페이지
  $total_page=($total_record % SCALE == 0 )?
  ($total_record/SCALE):(ceil($total_record/SCALE));

  //2.페이지가 없으면 디폴트 페이지 1페이지
  $page=(isset($_GET['page'])&&!empty($_GET['page']))?(test_input($_GET['page'])):(1);

  //3.현재페이지 시작번호계산함.
  $start=($page -1) * SCALE;

  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $total_record - $start;
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_auth_main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div id="main_body" class="main_body">
    <div id="sidenav" class="sidenav">
      <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav_admin_link.php"; ?>
    </div><!-- sidenav end -->

    <div class="main">
      <div class="admin_title">
        권한/등록 관리
      </div>
      <hr class="title_hr">
      <div class="list_search_bar">
        <form name="prd_shop_form" action="./a_auth_main.php?mode=order_list_auth" method="post">
          <?php
            if ($total_record==null) {
              $total_record="0";
            }
          ?>
            <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;명의 관리자가 있습니다.</div>
            <!-- float right 순서 거꾸로 올려야함 -->
            <button class="lsb_btn_srch" name="order_list" type="submit" value="id">아이디순</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="name">이름순</button>
          </form>
          <!-- 상단에 정렬 기능 끝 -->
      </div>      <!-- search_mem_fbd end -->
      <table class="admin_table">
        <tr>
          <td class="li_hd_list_num">번호</td>
          <td class="li_hd_type">아이디</td>
          <td class="li_hd_name">이름</td>
          <td class="li_hd_type">회원관리</td>
          <td class="li_hd_type">연인찾기</td>
          <td class="li_hd_type">추천/예약</td>
          <td class="li_hd_type">쇼핑몰</td>
          <td class="li_hd_type">테스트</td>
          <td class="li_hd_type">커뮤니티</td>
        </tr><!-- fbd_list_header end  번호 제목 글쓴이 등록일 조회-->
        <?php
        // 저장된 레코드 순서대로 몇개씩 읽어들이고 싶다
        // select * from table_name limit 읽을갯수 offset 읽을위치
        // 그런데 limit과 offset을 사용시에 order by 컬럼명 desc와 같이
        // 내림차순으로 정렬은 않되나요?
        // select * from board_free order by b_no desc limit 10 offset 810;
        for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
          mysqli_data_seek($result,$i);
          $row=mysqli_fetch_array($result);
          $id=$row['id'];
          $name=$row['name'];
          $auth_meeting=$row['auth_meeting'];
          $auth_ra=$row['auth_ra'];
          $auth_shop=$row['auth_shop'];
          $auth_test=$row['auth_test'];
          $auth_commu=$row['auth_commu'];
          $auth_member=$row['auth_member'];
          ?>
          <tr class="submain_list_item">
          <td class="li_con_list_num">
            <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$i+1?></a>
          </td><!-- 보여주기만 하는 번호 -->
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$id?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$name?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$auth_member?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$auth_meeting?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$auth_ra?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$auth_shop?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$auth_test?></a>
            </td>
            <td class="li_hd_type">
              <a href="./a_auth_w_e_d.php?mode=update_a_auth&id=<?=$id?>"><?=$auth_commu?></a>
            </td>

          </tr>
          <!-- list_item end -->
          <?php
          //$number--;
        }//end of for
        mysqli_close($conn);
        ?>
      </table> <!-- admin_table end -->

      <button class="btn_write"><a href="./a_auth_w_e_d.php">관리자 등록</a></button>
      <?php
        if ($total_record!=null) {
        ?>
      <hr class="title_hr">
      <div class="page_to" >
        <div class="page_to_in" >
        <a href="./a_auth_main.php?page=1">◀◀</a>
        <?php
        if ($page>1) {
              $page_go=$page-1;
               echo '<a class="previous" href="./a_auth_main.php?page='.$page_go.'">이전 ◀</a>';
             }else {
               echo '<a class="previous" href="./a_auth_main.php?page=1">이전 ◀</a>';
             }
             for ($i=1; $i <= $total_page ; $i++) {
               if($page==$i){
                 echo "<a>&nbsp;$i&nbsp;</a>";
               }else{
                 //싱글쿼테이션은 문자로 인식하지 않는다
                 //더블은 문자로 인식
                 echo "<a href='./a_auth_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
               }
             }
             if ($total_page==0) {
               echo '<a class="next" href="./a_auth_main.php?page=1">▶ 다음</a>';
             }elseif ($page+1>$total_page) {
               $page_end=$total_page;
               echo '<a class="next" href="./a_auth_main.php?page='.$page_end.'">▶ 다음</a>';
             }else{
               $page_go=$page+1;
               echo '<a class="next" href="./a_auth_main.php?page='.$page_go.'">▶ 다음</a>';
             }
             ?>
          <a href="./a_auth_main.php?page=<?=$total_page?>">▶▶</a>
      </div> <!-- page_to in end 페이지 이동 -->
      </div> <!-- page_to end 페이지 이동 -->
      <?php
      }
    ?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </div> <!-- main end -->
  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
  <!-- <script src="../js/admin_effect_common.js"></script> -->
  <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
