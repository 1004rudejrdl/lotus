<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

  $id = $_SESSION['userid'];

  if(isset($_GET["mode"])&&$_GET["mode"]=="order_list_a_od_rt"){
    // $sql="SELECT * from `com_info` order by `com_num` desc";
    //제목(subject), 내용(content), 아이디(id)
    $order_list = test_input($_POST["order_list"]);
    $order_list = mysqli_real_escape_string($conn, $order_list);
    $sql = "SELECT * from `order_list` o inner join `prd_shop_detail` s on o.prd_num = s.prd_num order by `$order_list` asc, `order_day` desc;";
  }else{
    $sql = "SELECT * from `order_list` o inner join `prd_shop_detail` s on o.prd_num = s.prd_num order by `order_num` desc;";
  }

  $result=mysqli_query($conn,$sql);
  $total_record=mysqli_num_rows($result);//총레코드수

  define('SCALE', 10);
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
  <link rel="stylesheet" href="./css/a_od_rt_main.css">
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
        <form name="prd_shop_form" action="./a_od_rt_main.php?mode=order_list_a_od_rt" method="post">
          <?php
            if ($total_record==null) {
              $total_record="0";
            }
          ?>
            <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;개의 주문이 있습니다.</div>
            <!-- float right 순서 거꾸로 올려야함 -->
            <button class="lsb_btn_srch" name="order_list" type="submit" value="back_acc">환불상태순</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="tackback_state">주문상태순</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="order_day">주문일자순</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="shop_price">상품가격순</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="prd_name">상품이름순</button>
            <!-- <button class="lsb_btn_srch" name="order_list" type="submit" value="prd_num">상품번호순</button> -->
            <!-- 상품 번호순 정렬하려고 하면 Error Code: 1052. Column 'prd_num' in order clause is ambiguous -->
            <!-- 양쪽에 모두 있어서 어느 값을 참조해야 할지 DB가 몰라서 에러냄  -->
            <button class="lsb_btn_srch" name="order_list" type="submit" value="id">아이디순</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="order_num">주문번호순</button>
          </form>
          <!-- 상단에 정렬 기능 끝 -->
      </div>      <!-- search_mem_fbd end -->
      <table class="admin_table">
        <tr>
          <td class="li_hd_list_num">번호</td>
          <td class="li_hd_list_num">주문<br>번호</td>
          <td class="li_hd_name">고객<br>아이디</td>
          <td class="li_hd_list_num">상품<br>번호</td>
          <td class="li_hd_name">상품이름</td>
          <td class="li_hd_type">상품가격</td>
          <td class="li_hd_list_num">주문<br>개수</td>
          <td class="li_hd_list_num">상품<br>타입</td>
          <td class="li_hd_list_num">상품<br>사이즈</td>
          <td class="li_hd_list_num">상품<br>색상</td>
          <td class="li_hd_name">주문일자</td>
          <td class="li_hd_list_num">주문<br>상태</td>
          <td class="li_hd_list_num">환불<br>요청</td>
          <td class="li_hd_list_num">환불<br>상태</td>
        </tr><!-- fbd_list_header end  번호 제목 글쓴이 등록일 조회-->
        <?php
        // 저장된 레코드 순서대로 몇개씩 읽어들이고 싶다
        // select * from table_name limit 읽을갯수 offset 읽을위치
        // 그런데 limit과 offset을 사용시에 order by 컬럼명 desc와 같이
        // 내림차순으로 정렬은 않되나요?
        // select * from board_free order by b_no desc limit 10 offset 810;
        for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
          //i마다 selected를 0~5 까지 검사하므로 한 i 가 돌고나면 초기화 시켜 주어야 한다. 초기화 하지 않으면 최초에 선택된 값이 후의 i에 모두 적용된다.
          $select0=$select1=$select2=$select3=$select4=$select5=$select6="";
          $row = mysqli_fetch_array($result);
          $order_num=$row['order_num'];
          $user_id=$row['id'];
          $prd_num=$row['prd_num'];
          $prd_name=$row['prd_name'];
          $shop_price=$row['shop_price'];
          $order_count=$row['order_count'];
          $prd_type=$row['prd_type'];
          $shop_size=$row['shop_size'];
          $shop_color=$row['shop_color'];
          $order_day=$row['order_day'];
          $tackback_state=$row['tackback_state'];
          $tackback_day=$row['tackback_day'];
          $back_acc=$row['back_acc'];
          $file_copied_0=$row['file_copied_0'];
          ?>
          <tr class="submain_list_item">
            <td class="">
              <?=$i+1?>
            </td><!-- 보여주기만 하는 번호 -->
            <td class="">
              <?=$order_num?>
            </td>
            <td class="">
              <?=$user_id?>
            </td>
            <td class="">
              <?=$prd_num?>
            </td>
            <td class="">
              <?=$prd_name?>
            </td>
            <td class="">
              <?=$shop_price?>
            </td>
            <td class="">
              <?=$order_count?>
            </td>
            <td class="">
              <?php
              switch ($prd_type) {
                case 'm':
                  ?>남성<?php
                  break;
                case 'w':
                  ?>여성<?php
                  break;
                case 's':
                  ?>신발<?php
                  break;
              }
               ?>
            </td>
            <td class="">
              <?=$shop_size?>
            </td>
            <td class="">
              <?=$shop_color?>
            </td>
            <td class="">
              <?=$order_day?>
            </td>
            <td class="">
              <?php
                switch ($tackback_state) {
                  case '0':
                    $select0="selected";
                    break;
                  case '1':
                    $select1="selected";
                    break;
                  case '2':
                    $select2="selected";
                    break;
                  case '3':
                    $select3="selected";
                    break;
                  case '4':
                    $select4="selected";
                    break;
                  case '5':
                    $select5="selected";
                    break;
                  case '6':
                    $select6="selected";
                    break;
                }
                ?>
              <form class="" action="update_a_od_rt_tbst.php" method="post">
                <select class="" name="order_list_inf<?=$i?>">
                  <option value="0" <?=$select0?>>결제완료</option>
                  <option value="1" <?=$select1?>>집하</option>
                  <option value="2" <?=$select2?>>배송중(입고)</option>
                  <option value="3" <?=$select3?>>배송중(출고)</option>
                  <option value="4" <?=$select4?>>배송중</option>
                  <option value="5" <?=$select5?>>배달중</option>
                  <option value="6" <?=$select6?>>배달완료</option>
                </select>
                <input type="hidden" name="order_num" value="<?=$order_num?>">
                <input type="submit" name="" value="배송정보변경">
              </form>
            </td>
            <td class="">
              <?=$tackback_day?>
            </td>
            <td class="">
              <?php
              if (!empty($tackback_day)) {
                if ($back_acc=='1') {

                  echo "환불 처리 완료";
                }else {
                  var_dump($order_num);
                  ?>

                  <form class="" action="update_a_od_rt_bkac.php" method="post">
                    <input type="hidden" name="order_num<?=$i?>" value="<?=$order_num?>">
                    <input type="submit" name="" value="환불 하기">
                  </form>

                  <?php
                }
              }
               ?>
            </td>

          </tr>
          <!-- list_item end -->
          <?php
          //$number--;
        }//end of for
        mysqli_close($conn);
        ?>
      </table> <!-- admin_table end -->

      <hr class="title_hr">
      <div class="page_to" >
        <div class="page_to_in" >
        <a href="./a_od_rt_main.php?page=1">◀◀</a>
        <?php
        if ($page>1) {
              $page_go=$page-1;
               echo '<a class="previous" href="./a_od_rt_main.php?page='.$page_go.'">이전 ◀</a>';
             }else {
               echo '<a class="previous" href="./a_od_rt_main.php?page=1">이전 ◀</a>';
             }
             for ($i=1; $i <= $total_page ; $i++) {
               if($page==$i){
                 echo "<a>&nbsp;$i&nbsp;</a>";
               }else{
                 //싱글쿼테이션은 문자로 인식하지 않는다
                 //더블은 문자로 인식
                 echo "<a href='./a_od_rt_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
               }
             }
             if ($total_page==0) {
               echo '<a class="next" href="./a_od_rt_main.php?page=1">▶ 다음</a>';
             }elseif ($page+1>$total_page) {
               $page_end=$total_page;
               echo '<a class="next" href="./a_od_rt_main.php?page='.$page_end.'">▶ 다음</a>';
             }else{
               $page_go=$page+1;
               echo '<a class="next" href="./a_od_rt_main.php?page='.$page_go.'">▶ 다음</a>';
             }
             ?>
          <a href="./a_od_rt_main.php?page=<?=$total_page?>">▶▶</a>
      </div> <!-- page_to in end 페이지 이동 -->
      </div> <!-- page_to end 페이지 이동 -->
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
