<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $com_type="";
  $com_num="";
  $shop_num="";
  $len_shop_name="";
  $shop_name="";
  $len_shop_postcode="";
  $shop_postcode="";
  $len_shop_address="";
  $shop_address="";
  $len_shop_detailAddress="";
  $shop_detailAddress="";
  $len_shop_extraAddress="";
  $shop_extraAddress="";
  $len_shop_addr="";
  $shop_addr="";
  $shop_tel="";
$userid = $_SESSION['userid'];
  define('SCALE', 10);

if(isset($_GET["mode"])&&$_GET["mode"]=="order_list_com"){
    // $sql="SELECT * from `com_info` order by `com_num` desc";
    //제목(subject), 내용(content), 아이디(id)
    $order_list = test_input($_POST["order_list"]);
    $order_list = mysqli_real_escape_string($conn, $order_list);

    $table_selector=explode($order_list, '_');

    if ($table_selector=="com") {
      if($order_list=="com_type"){
        $standard="`$order_list` asc, `com_num` desc";
      } else {
        $standard="`$order_list` asc";
      }
      $sql="SELECT * from `prd_shop` order by $standard";
    }else{
        $standard="`$order_list` asc";
      $sql="SELECT * from `prd_shop` order by $standard";
    }

}else{
  $sql="SELECT * from `prd_shop` order by `shop_num` desc";
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
  <link rel="stylesheet" href="./css/a_shop_main.css">
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
        쇼핑몰 관리
      </div>
      <hr class="title_hr">
      <div class="list_search_bar">
        <form name="prd_shop_form" action="./a_shop_main.php?mode=order_list_com" method="post">
          <?php
            if ($total_record==null) {
              $total_record="0";
            }
          ?>
            <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;개의 업체가 있습니다.</div>
            <!-- float right 순서 거꾸로 올려야함 -->
            <button class="lsb_btn_srch" name="order_list" type="submit" value="shop_tel">샵전화번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="shop_name">샵명</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="shop_num">샵번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_num">업체번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_type">업체구분</button>
          </form>
          <!-- 상단에 정렬 기능 끝 -->
      </div>      <!-- search_mem_fbd end -->
      <table class="admin_table">
        <tr>
          <td class="li_hd_list_num">번호</td>
          <td class="li_hd_type">업체구분</td>
          <td class="li_hd_num">업체번호</td>
          <td class="li_hd_num">샵번호</td>
          <td class="li_hd_name">샵이름</td>
          <td class="li_hd_addr">샵소재지</td>
          <td class="li_hd_tel">샵전화번호</td>
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
          $com_type=$row['com_type'];
          $com_num=$row['com_num'];
          $shop_num=$row['shop_num'];

          $len_shop_name=strlen($row['shop_name']);
          $shop_name=$row['shop_name'];

          $len_shop_postcode=strlen($row['shop_postcode']);
          $shop_postcode=$row['shop_postcode'];

          $len_shop_address=strlen($row['shop_address']);
          $shop_address=$row['shop_address'];

          $len_shop_detailAddress=strlen($row['shop_detailAddress']);
          $shop_detailAddress=$row['shop_detailAddress'];

          $len_shop_extraAddress=strlen($row['shop_extraAddress']);
          $shop_extraAddress=$row['shop_extraAddress'];

          $len_shop_addr=$len_shop_postcode+$len_shop_address+$len_shop_detailAddress+$len_shop_extraAddress;
          $shop_addr=$shop_postcode." ".$shop_address." ".$shop_detailAddress." ".$shop_extraAddress;

          $shop_tel=$row['shop_tel'];
// 한글 3byte?
          if($len_shop_name>24) {
            $shop_name=mb_substr($row['shop_name'], 0, 10, 'utf-8');
            $shop_name=$shop_name."...";
          }else{
            $shop_name=$row['shop_name'];
          }
          if($len_shop_addr>20) {
            $shop_addr=mb_substr($shop_addr, 0, 20, 'utf-8');
            $shop_addr=$shop_addr."...";
          }else{
            $shop_addr=$shop_addr;
          }
          ?>
          <tr class="submain_list_item">
          <td class="li_con_list_num">
            <a href="./a_shop_v_d.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>"><?=$i+1?></a>
          </td><!-- 보여주기만 하는 번호 -->
            <td class="li_hd_type">
              <?php
              if ($com_type=='s_') {
                echo '<a href="./a_shop_v_d.php?com_type='.$com_type.'&com_num='.$com_num.'&shop_num='.$shop_num.'">쇼핑몰</a>';
              }
              ?>
            </td>
            <td class="li_hd_num">
              <a href="./a_shop_v_d.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>"><?=$com_num?></a>
            </td>
            <td class="li_hd_num">
              <a href="./a_shop_v_d.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>"><?=$shop_num?></a>
            </td>
            <td class="li_hd_name">
              <a href="./a_shop_v_d.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>"><?=$shop_name?></a>
            </td>
            <td class="li_hd_addr">
              <a href="./a_shop_v_d.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>"><?=$shop_addr?></a>
            </td>
            <td class="li_hd_tel">
              <a href="./a_shop_v_d.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>"><?=$shop_tel?></a>
            </td>
          </tr>
          <!-- list_item end -->
          <?php
          //$number--;
        }//end of for

        ?>
      </table> <!-- admin_table end -->

      <button class="btn_write"><a href="./a_shop_w_e_d.php">샵 등록</a></button>
      <?php
      $sql2="SELECT * from `admin_authority` where id = '$userid';";
      $result2 = mysqli_query($conn, $sql2) or die("실패원인 : " . mysqli_error($conn));
      $row2 = mysqli_fetch_array($result2);
      $auth_shop = $row2['auth_shop'];
      if (!empty($auth_shop)) {
       ?>
      <button class="btn_write"><a href="./lib/exal.php">현재 매출 다운</a></button>
      <?php
      }
        mysqli_close($conn);

      if ($total_record!=null) {
        ?>
      <hr class="title_hr">
      <div class="page_to" >
        <div class="page_to_in" >
        <a href="./a_shop_main.php?page=1">◀◀</a>
        <?php
        if ($page>1) {
              $page_go=$page-1;
               echo '<a class="previous" href="./a_shop_main.php?page='.$page_go.'">이전 ◀</a>';
             }else {
               echo '<a class="previous" href="./a_shop_main.php?page=1">이전 ◀</a>';
             }
             for ($i=1; $i <= $total_page ; $i++) {
               if($page==$i){
                 echo "<a>&nbsp;$i&nbsp;</a>";
               }else{
                 //싱글쿼테이션은 문자로 인식하지 않는다
                 //더블은 문자로 인식
                 echo "<a href='./a_shop_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
               }
             }
             if ($total_page==0) {
               echo '<a class="next" href="./a_shop_main.php?page=1">▶ 다음</a>';
             }elseif ($page+1>$total_page) {
               $page_end=$total_page;
               echo '<a class="next" href="./a_shop_main.php?page='.$page_end.'">▶ 다음</a>';
             }else{
               $page_go=$page+1;
               echo '<a class="next" href="./a_shop_main.php?page='.$page_go.'">▶ 다음</a>';
             }
             ?>
          <a href="./a_shop_main.php?page=<?=$total_page?>">▶▶</a>
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
