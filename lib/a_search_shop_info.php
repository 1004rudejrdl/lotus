<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

  $mode=
  $com_type=
  $com_num=
  $com_name=
  $com_addr=
  $com_email=
  $com_tel=
  $com_busi_num=
  $com_regist_num="";

  define('SCALE', 10);

  if (isset($_GET['com_type'])&&!empty($_GET['com_type'])){
    $com_type=$_GET['com_type'];
  }
  if(isset($_GET["mode"])&&$_GET["mode"]=="order_list_com"){
    // $sql="SELECT * from `com_info` order by `com_num` desc";
    //제목(subject), 내용(content), 아이디(id)
          $order_list = test_input($_POST["order_list"]);
          $com_type = test_input($_POST["com_type"]);
          $order_list = mysqli_real_escape_string($conn, $order_list);

          if($order_list=="com_type"){
            $standard="`$order_list` asc, `com_num` desc";
          } else {
            $standard="`$order_list` asc";
          }
    $sql="SELECT * from `com_info` where `com_type`= '$com_type' order by $standard";
  }else{
    $sql="SELECT * from `com_info` where `com_type`= '$com_type' order by `com_num` desc";
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
  <link rel="stylesheet" href="../css/a_search_com_info.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<script type="text/javascript">
  function select_com(com_num, com_name){
    window.opener.prd_shop_form.com_num_name.value=com_num+"/"+com_name;	//opener 함수 start_area.php 에 부모창에 value값으로 city를 전달
    window.close();		//창닫기
  }
  function open_com_info(com_type, com_num){
    var type=com_type;
    var num=com_num;
    var popupX = (window.screen.width / 2) - (800 / 2);
    var popupY= (window.screen.height /2) - (500 / 2);
    window.open("../admin_com_info/a_c_info_v_d.php?com_type="+type+"&com_num="+num, '', 'status=no, width=1000, height=800, left='+ popupX + ', top='+ popupY + ', screenX='+ popupX + ', screenY= '+ popupY);
  }
</script>
<body>
  <div id="main_body" class="main_body">
    <div class="main">
      <hr class="title_hr">
      <div class="list_search_bar">
        <form name="com_info_form" action="./a_search_com_info.php?mode=order_list_com" method="post">
            <div class="lsb_msg">총&nbsp;<?=$total_record?>&nbsp;개의 업체가 있습니다.</div>
            <!-- float right 순서 거꾸로 올려야함 -->
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_regist_num">통신판매업 신고번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_busi_num">사업자등록번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_tel">전화번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_name">업체명</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_num">업체번호</button>
            <button class="lsb_btn_srch" name="order_list" type="submit" value="com_type">업체구분</button>
            <input type="hidden" name="com_type" value="<?=$com_type?>">
          </form>
          <!-- 상단에 정렬 기능 끝 -->
      </div>      <!-- search_mem_fbd end -->
      <table class="admin_table">
        <tr>
          <td class="li_hd_list_num">번호</td>
          <td class="li_hd_type">업체<br>구분</td>
          <td class="li_hd_num">업체<br>번호</td>
          <td class="li_hd_name">업체명</td>
          <td class="li_hd_addr">사업장 소재지</td>
          <td class="li_hd_tel">전화번호</td>
          <td class="li_hd_bs">사업자<br>등록번호</td>
          <td class="li_hd_rg">통신판매업<br>신고번호</td>
          <td class="li_hd_num">업체<br>선택</td>
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
          $len_com_name=strlen($row['com_name']);
          $com_name=$row['com_name'];

          $len_com_postcode=strlen($row['com_postcode']);
          $com_postcode=$row['com_postcode'];

          $len_com_address=strlen($row['com_address']);
          $com_address=$row['com_address'];

          $len_com_detailAddress=strlen($row['com_detailAddress']);
          $com_detailAddress=$row['com_detailAddress'];

          $len_com_extraAddress=strlen($row['com_extraAddress']);
          $com_extraAddress=$row['com_extraAddress'];

          $len_com_addr=$len_com_postcode+$len_com_address+$len_com_detailAddress+$len_com_extraAddress;
          $com_addr=$com_postcode." ".$com_address." ".$com_detailAddress." ".$com_extraAddress;

          $com_email=$row['com_email'];
          $com_tel=$row['com_tel'];
          $com_busi_num=$row['com_busi_num'];
          $len_com_regist_num=strlen($row['com_regist_num']);
          $com_regist_num=$row['com_regist_num'];
// 한글 3byte?
          if($len_com_name>24) {
            $com_name=mb_substr($row['com_name'], 0, 10, 'utf-8');
            $com_name=$com_name."...";
          }else{
            $com_name=$row['com_name'];
          }
          if($len_com_addr>10) {
            $com_addr=mb_substr($com_addr, 0, 10, 'utf-8');
            $com_addr=$com_addr."...";
          }else{
            $com_addr=$com_addr;
          }
          if($len_com_regist_num>10) {
            $com_regist_num=mb_substr($row['com_regist_num'], 0, 10, 'utf-8');
            $com_regist_num=$com_regist_num."...";
          }else{
            $com_regist_num=$row['com_regist_num'];
          }
          ?>
          <tr class="submain_list_item">
          <td class="li_con_list_num">
            <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$i+1?></a>
          </td><!-- 보여주기만 하는 번호 -->
            <td class="li_hd_type">
              <?php
              if($com_type=='e_'){
              ?>
                <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')">맛집/체험</a>
              <?php
              } elseif ($com_type=='a_') {
              ?>
                <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')">숙박</a>
              <?php
              } elseif ($com_type=='c_') {
              ?>
                <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')">렌트카</a>
              <?php
              } elseif ($com_type=='s_') {
              ?>
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')">쇼핑몰</a>
              <?php
              }
              ?>
            </td>
            <td class="li_hd_num">
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$com_num?></a>
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
              <!-- 함수에 값을 넣을 때 ' ' 주지 않으면 변수로 인식! 변수로 인식하지 않기위해서는 ' ' " " 구분자 필요함!!!!! -->
            </td>
            <td class="li_hd_name">
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$com_name?></a>
            </td>
            <td class="li_hd_addr">
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$com_addr?></a>
            </td>
            <td class="li_hd_tel">
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$com_tel?></a>
            </td>
            <td class="li_hd_bs">
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$com_busi_num?></a>
            </td>
            <td class="li_hd_rg">
              <!-- $num : DB값 -->
              <a onclick="open_com_info('<?=$com_type?>', '<?=$com_num?>')"><?=$com_regist_num?></a>
            </td>
            <td class="li_hd_num">
              <label class="tb_container">
                <input type="checkbox" onclick="select_com('<?=$com_num?>','<?=$com_name?>')">
                <span class="tb_checkmark"></span>
              </label>
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
        <a href="./op_free_bd_main.php?page=1">◀◀</a>
        <?php
        if ($page>1) {
              $page_go=$page-1;
               echo '<a class="previous" href="./op_free_bd_main.php?page='.$page_go.'">이전 ◀</a>';
             }else {
               echo '<a class="previous" href="./op_free_bd_main.php?page=1">이전 ◀</a>';
             }
             for ($i=1; $i <= $total_page ; $i++) {
               if($page==$i){
                 echo "<a>&nbsp;$i&nbsp;</a>";
               }else{
                 //싱글쿼테이션은 문자로 인식하지 않는다
                 //더블은 문자로 인식
                 echo "<a href='./op_free_bd_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
               }
             }
             if ($total_page==0) {
               echo '<a class="next" href="./op_free_bd_main.php?page=1">▶ 다음</a>';
             }elseif ($page+1>$total_page) {
               $page_end=$total_page;
               echo '<a class="next" href="./op_free_bd_main.php?page='.$page_end.'">▶ 다음</a>';
             }else{
               $page_go=$page+1;
               echo '<a class="next" href="./op_free_bd_main.php?page='.$page_go.'">▶ 다음</a>';
             }
             ?>
          <a href="./op_free_bd_main.php?page=<?=$total_page?>">▶▶</a>
      </div> <!-- page_to in end 페이지 이동 -->
      </div> <!-- page_to end 페이지 이동 -->
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </div> <!-- main end -->
  </div> <!-- main_body end -->

</body>

</html>
