<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

  define('SCALE', 10);

  if(isset($_GET["mode"])&&$_GET["mode"]=="search_mb"){
    // $sql="SELECT * from `member` order by `com_num` desc";
    //제목(subject), 내용(content), 아이디(id)
    $find = test_input($_POST["find"]);
    $search = test_input($_POST["search"]);
    $q_search = mysqli_real_escape_string($conn, $search);

    $sql="SELECT * from `member` where $find like '%$q_search%' order by `mb_num` desc";

  }elseif(isset($_GET["mode"])&&$_GET["mode"]=="order_list_mb"){
    // $sql="SELECT * from `com_info` order by `com_num` desc";
    //제목(subject), 내용(content), 아이디(id)
      $order_list = test_input($_POST["order_list"]);
      $order_list = mysqli_real_escape_string($conn, $order_list);

      if ($order_list=="black_list") {
        $sql="SELECT * from `member` where `$order_list` = '1' order by `name` asc";
      }else {
        $sql="SELECT * from `member` order by `$order_list` asc";
      }
  }else{
    $sql="SELECT * from `member` order by `mb_num` desc";
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
  <link rel="stylesheet" href="./css/a_mb_mt_main.css">
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
        회원/매칭 관리
      </div>
      <hr class="title_hr">
      <div class="list_search_bar">
        <?php
          if ($total_record==null) {
            $total_record="0";
          }
        ?>
        <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;명의 회원이 있습니다.</div>
        <form name="a_mb_mt_form" action="./a_mb_mt_main.php?mode=search_mb" method="post">
            <select name="find">
              <option value="mb_num">회원번호</option>
              <option value="id">연꽃아이디</option>
              <option value="name">이름</option>
              <option value="email">이메일</option>
              <option value="tel">전화번호</option>
              <option value="birth">생일</option>
              <option value="naver">네이버아이디</option>
              <option value="kakao">카카오아이디</option>
              <option value="facebook">페이스북아이디</option>
              <option value="google">구글아이디</option>
            </select>
            <input type="text" name="search">
            <button class="btn_srch" type="submit">검색</button>
        </form>
        <form name="a_mb_mt_form" action="./a_mb_mt_main.php?mode=order_list_mb" method="post">
            <button class="lsb_btn_srch bottom_20" name="order_list" type="submit" value="black_list">블랙리스트</button>
            <button class="lsb_btn_srch bottom_20" name="order_list" type="submit" value="birth">생일순</button>
            <button class="lsb_btn_srch bottom_20" name="order_list" type="submit" value="name">이름순</button>
            <button class="lsb_btn_srch bottom_20" name="order_list" type="submit" value="id">연꽃아이디순</button>
            <button class="lsb_btn_srch bottom_20" name="order_list" type="submit" value="mb_num">회원번호순</button>
        </form>
          <!-- 상단에 정렬 기능 끝 -->
      </div>      <!-- search_mem_fbd end -->
      <table class="admin_table">
        <tr>
          <td class="li_hd_list_num">번호</td>
          <td class="li_hd_num">회원<br>번호</td>
          <td class="li_hd_num">성별</td>
          <td class="li_hd_id">아이디</td>
          <td class="li_hd_type">이름</td>
          <td class="li_hd_tel">전화번호</td>
          <td class="li_hd_type">생일</td>
          <td class="li_hd_num">블랙<br>리스트</td>
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
          $mb_num=$row['mb_num'];
          $id=$row['id'];
          $name=$row['name'];
          $tel=$row['tel'];
          $birth=$row['birth'];
          $gender=$row['gender'];
          $black_list=$row['black_list'];
          ?>
          <tr class="submain_list_item">
          <td >
            <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$i+1?></a>
          </td><!-- 보여주기만 하는 번호 -->
            <td>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$mb_num?></a>
            </td>
            <td>
              <?php
                $g=($gender=="0")?("남"):("여");
              ?>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$g?></a>
            </td>
            <td>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$id?></a>
            </td>
            <td>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$name?></a>
            </td>
            <td>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$tel?></a>
            </td>
            <td>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$birth?></a>
            </td>
            <td>
              <?php
                $b=($black_list=='1')?('O'):('');
              ?>
              <a href="./a_mb_mt_v.php?id=<?=$id?>"><?=$b?></a>
            </td>
          </tr>
          <!-- list_item end -->
          <?php
          //$number--;
        }//end of for
        mysqli_close($conn);
        ?>
      </table> <!-- admin_table end -->
      <?php
      if ($total_record!=null) {
        ?>
      <hr class="title_hr">
      <div class="page_to" >
        <div class="page_to_in" >
        <a href="./a_mb_mt_main.php?page=1">◀◀</a>
        <?php
        if ($page>1) {
              $page_go=$page-1;
               echo '<a class="previous" href="./a_mb_mt_main.php?page='.$page_go.'">이전 ◀</a>';
             }else {
               echo '<a class="previous" href="./a_mb_mt_main.php?page=1">이전 ◀</a>';
             }
             for ($i=1; $i <= $total_page ; $i++) {
               if($page==$i){
                 echo "<a>&nbsp;$i&nbsp;</a>";
               }else{
                 //싱글쿼테이션은 문자로 인식하지 않는다
                 //더블은 문자로 인식
                 echo "<a href='./a_mb_mt_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
               }
             }
             if ($total_page==0) {
               echo '<a class="next" href="./a_mb_mt_main.php?page=1">▶ 다음</a>';
             }elseif ($page+1>$total_page) {
               $page_end=$total_page;
               echo '<a class="next" href="./a_mb_mt_main.php?page='.$page_end.'">▶ 다음</a>';
             }else{
               $page_go=$page+1;
               echo '<a class="next" href="./a_mb_mt_main.php?page='.$page_go.'">▶ 다음</a>';
             }
             ?>
          <a href="./a_mb_mt_main.php?page=<?=$total_page?>">▶▶</a>
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
