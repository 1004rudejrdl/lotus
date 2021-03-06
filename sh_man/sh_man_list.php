<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $mode="insert";
  $sese=$type=$selected1=$selected2=$selected3=$selected4="";
  if($_GET['mode']=="man"){
    $name="남성의류";
    $list_name="man";
    $type="m";
  }else if($_GET['mode']=="woman"){
    $name="여성의류";
    $list_name="woman";
    $type="w";
  }else if($_GET['mode']=="shose"){
    $name="신발";
    $list_name="shose";
    $type="s";
  }

  $sql = "SELECT * from `prd_shop_detail` where `prd_type` = '$type' order by `shop_best` desc, `prd_num` desc;";
  $result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
  $total = mysqli_num_rows($result);
  $userid = $_SESSION['userid'];

  $list_count = 4;
  if (isset($_POST['option_list_count'])) {    //n개씩 보기
    $list_count = $_POST['option_list_count'];
    switch ($list_count) {
      case '4':
        $selected1 = "selected";
        break;
      case '12':
        $selected2 = "selected";
        break;
      case '24':
        $selected3 = "selected";
        break;
      case '48':
        $selected4 = "selected";
        break;
    }
  }
  define('SCALE', $list_count);
  $session=$_SESSION['userid'];
  if (isset($_GET['type'])) {
    $type=$_GET['type'];
  }


  //1.전체페이지, 2.디폴트페이지, 3.현재페이지 시작번호 4.보여줄리스트번호
  //1.전체페이지

  $total_page=($total % SCALE == 0 )?($total/SCALE):(ceil($total/SCALE));

  //2.페이지가 없으면 디폴트 페이지 1페이지
  $page=(isset($_GET['page'])&&!empty($_GET['page']))?(test_input($_GET['page'])):(1);

  //3.현재페이지 시작번호계산함.
  $start=($page -1) * SCALE;

  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $total - $start;
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="../css/img_re.css">
  <link rel="stylesheet" href="./css/sh_list.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<script type="text/javascript">
function search_shop_info(type){
  var com_type = type;
  var popupX = (window.screen.width / 2) - (800 / 2);
  var popupY= (window.screen.height /2) - (500 / 2);
  window.open("../lib/a_search_shop_info.php?com_type="+com_type, 'search_shop_info', 'status=no, width=1500, height=500, left='+ popupX + ', top='+ popupY + ', screenX='+ popupX + ', screenY= '+ popupY);
}
function search_shop_name(){
  var shop_num_name = document.getElementById("shop_num_name").value;
  console.log(shop_num_name);
  document.getElementById("shop_name").value=shop_num_name;
  }
</script>
<body>
  <form class="" name="prd_shop_form" action="index.html" method="post">
    <input type="hidden" name="shop_num_name" id="shop_num_name" value="">
  </form>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="./sh_man_list.php?mode=man">쇼핑몰</a>
  <a href="./sh_man_list.php?mode=man">남성의류</a>
  <a href="./sh_man_list.php?mode=woman">여성의류</a>
  <a href="./sh_man_list.php?mode=shose">신발</a>
</div><!-- sidenav end -->
<div class="main">
  <div class="admin_title">
    <?=$name?>
  </div>
  <hr class="title_hr">
  <?php
    if (!empty($_POST['prd_num'])  ||  isset($_POST['regist'])) {//상품 번호가 있으면 구매   등록이 있으면 수정
      if (isset($_POST['update'])) {
        $mode="update";
      }
    $prd_prd_num=$_POST['prd_num'];
    $sql1 = "SELECT * from `prd_shop_detail` where `prd_num` = '$prd_prd_num';";
    $result1 = mysqli_query($conn, $sql1) or die("실패원인 : " . mysqli_error($conn));
    $row = mysqli_fetch_array($result1);
    //$row_prd_num=$row['prd_num'];
    $prd_name=$row['prd_name'];
    $prd_num=$row['prd_num'];
    $shop_num=$row['shop_num'];
    $shop_price=$row['shop_price'];
    $shop_color=$row['shop_color'];
    $shop_size=$row['shop_size'];
    $shop_best=$row['shop_best'];
    $shop_stock=$row['shop_stock'];
    $prd_type=$row['prd_type'];
    if ($shop_best==1) {
      $shop_best=="checked";
    }

    for ($i=0; $i < 10; $i++) {
      $file_name[$i]=$row["file_name_$i"];
      $file_copied[$i]=$row["file_copied_$i"];
    }

    $sql6 = "SELECT `shop_name` from `prd_shop` where `shop_num` = '$shop_num';";
    $result6 = mysqli_query($conn, $sql6) or die("실패원인 : " . mysqli_error($conn));
    $row = mysqli_fetch_array($result6);
    $shop_name=$row['shop_name'];

    $option1=$option2=$option3=$option4=$option5=$option6=$option7=$option8="";
    $sizeoption2=$sizeoption3="";
    $type2=$type3="";
    switch ($shop_color) {
      case '2':
      $option2="selected";
        break;
      case '3':
      $option3="selected";
        break;
      case '4':
      $option4="selected";
        break;
      case '5':
      $option5="selected";
        break;
      case '6':
      $option6="selected";
        break;
      case '7':
      $option7="selected";
        break;
      case '8':
      $option8="selected";
        break;
    }

    switch ($shop_size) {
      case '2':
      $sizeoption2="selected";
        break;
      case '3':
      $sizeoption3="selected";
        break;
    }
    switch ($prd_type) {
      case 'w':
      $type2="selected";
        break;
      case 's':
      $type3="selected";
        break;
    }

  if ($_POST['prd_num']==$prd_num) {
  ?>
  <div class="prd_img_info">
    <div class="prd_img_div">
      <div class="prd_img_cont">
        <?php
        for ($i=0; $i < 10; $i++) {
          if (!($file_copied[$i]=="")) {
          ?>
          <div class="p_i_slides responsive-center" id="p_i_slides">
            <div class="num_text"><?=$i+1?> / 10</div>
            <img id="prd_image" src="./img/<?=$file_copied[$i]?>">
          </div>
          <?php
          } //if
        }  //for
        ?>
        <a class="p_i_prev" onclick="plusSlides(-1)">❮</a>
        <a class="p_i_next" onclick="plusSlides(1)">❯</a>
      </div>  <!-- prd_img_cont end -->
      <div class="p_i_thumbs">
      <?php
        for ($i=0; $i < 10; $i++) {
          if ($file_copied[$i]!="") {
            ?>
            <div class="thumb_img responsive-center">
              <img class="demo_thumb" src="./img/<?=$file_copied[$i]?>" onclick="currentSlide(<?=$i+1?>)" >
            </div>
            <?php
          }
        }
      ?>
      </div>    <!-- p_i_thumbs end -->
    </div>    <!-- prd_img_div end -->

    <div class="prd_info_div" >
      <!-- <div class="detail_box"> -->
      <?php
      if ($type=='regist') {
        $com_type="s_"
        ?>
        <form class="" action="./insert_shop_prd.php?mode=<?=$mode?>" method="post" enctype="multipart/form-data">
        &nbsp;&nbsp;&nbsp;

        <input type="text" name="shop_name" id="shop_name" placeholder="찾기 버튼을 눌러 검색하세요" autofocus value="<?=$shop_name?>" readonly>
        <button type="button" onclick="search_shop_info('<?=$com_type?>')" name="button">찾기</button>
        <hr>
        &nbsp;&nbsp;&nbsp;
        <input type="text" name="prd_name" value="<?=$prd_name?>" placeholder="상품명">
        <hr>
        <input type="hidden" name="prd_num" value="<?=$prd_num?>" >
        &nbsp;&nbsp;&nbsp;
        <select class="" name="type_m_w_s">
          <option value="m">남성의류</option>
          <option value="w" <?=$type2?>>여성의류</option>
          <option value="s" <?=$type3?>>신발</option>
        </select>
        <hr>
        &nbsp;&nbsp;&nbsp;
        <input type="number" name="prd_price" value="<?=$shop_price?>" placeholder="상품 가격"> 원
        <hr>
        &nbsp;&nbsp;&nbsp;
        택배사 : 한진택배
        <hr>
        &nbsp;&nbsp;&nbsp;
        색상
        <select class="" name="prd_color">
          <option value="1" >흰/검</option>
          <option value="2" <?=$option2?>>흰/검/파</option>
          <option value="3" <?=$option3?>>흰/검/빨</option>
          <option value="4" <?=$option4?>>흰/검/초</option>
          <option value="5" <?=$option5?>>흰/검/파/빨</option>
          <option value="6" <?=$option6?>>흰/검/파/초</option>
          <option value="7" <?=$option7?>>흰/검/빨/초</option>
          <option value="8" <?=$option8?>>흰/검/파/빨/초</option>
        </select>
        <hr>
        &nbsp;&nbsp;&nbsp;
        사이즈
        <select class="" name="prd_size">
          <option value="1">S/M/L</option>
          <option value="2" <?=$sizeoption2?>>M/L/XL</option>
          <option value="3" <?=$sizeoption3?>>L/XL/XXL</option>
        </select>
        <hr>
        &nbsp;&nbsp;&nbsp;
        <label class="tb_container">&nbsp;베스트&nbsp;
          <?php
          if ($shop_best=="1") {
          ?>
          <input type="checkbox" name="prd_best" value="1" checked>
          <?php
          } else {
          ?>
          <input type="checkbox" name="prd_best" value="1">
          <?php
          }
          ?>
          <span class="tb_checkmark"></span>
        </label>
        <hr>
        &nbsp;&nbsp;&nbsp;
        <input type="number" name="prd_stock" placeholder="현재 재고" value="<?=$shop_stock?>"> 개
        <hr>
        <!-- </div>         -->        <!-- detail_box end -->
        <div class="file_box">
        <?php for ($i = 0; $i < 10; $i++) { ?>
          <input type="file" name="prd_img[]" value="" onchange="change_img_upload(this)">
            <?php
            if (!empty($file_name[$i])) {
              echo "<p class='alret_ment'>$file_name[$i]이 등록되어 있습니다.</p>";
            }
          } ?>
          </div>
        <input type="submit" name="" value="등록하기">

      </form>
        <?php
      }else {
        ?>
        &nbsp;&nbsp;&nbsp;
        <?=$prd_name?>
        <span style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;">★</span>
        <?php
        $sql7 = "SELECT id from prd_like where prd_num = '$prd_prd_num';";
        $result7 = mysqli_query($conn, $sql7) or die("실패원인 : " . mysqli_error($conn));
        $total7 = mysqli_num_rows($result7);
        $img_like='heart_notgood.png';
        for ($i=0; $i < $total7; $i++) {
          $row7 = mysqli_fetch_array($result7);
          if ($row7['id']==$session) {
            $img_like='heart_good.png';
            break;
          }
        }


        if (isset($session)) {
          ?>
          <span><img src="./img/<?=$img_like?>" alt="" id="insert_good" width="100"> </span>

          <?php
        }
         ?>

        <script type="text/javascript">
        $(document).ready(function() {
          $("#insert_good").click(function(event) {

            $.ajax({
              url: 'shopping_good_insert.php',
              type: 'POST',
              data: {
                prd_num: <?=$prd_prd_num?>
              }
            })
            .done(function(result) {
              console.log(result);

              console.log("success");
              $("#insert_good").attr('src',"./img/"+result);

            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
          });
        });
        </script>
        <hr>
        &nbsp;&nbsp;&nbsp;
          <?=$shop_price?>원
        <hr>
        &nbsp;&nbsp;&nbsp;
        한진택배
        <hr>
        &nbsp;&nbsp;&nbsp;
        색상&nbsp;&nbsp;&nbsp;
        <select class="" name="" id="color">
          <option value="w">흰색</option>
          <option value="l">검정색</option>
        <?php

        switch ($shop_color) {
          case '2':
          echo "<option value='b'>파란색</option>";
            break;
          case '3':
          echo "
          <option value='r'>빨간색</option>";
            break;
          case '4':
          echo "
          <option value='g'>초록색</option>
          ";
            break;
          case '5':
          echo "<option value='b'>파란색</option>

          <option value='r'>빨간색</option>";
            break;
          case '6':
          echo "<option value='b'>파란색</option>
          <option value='g'>초록색</option>
          ";
            break;
          case '7':
          echo "
          <option value='g'>초록색</option>
          <option value='r'>빨간색</option>";
            break;
          case '8':
          echo "<option value='b'>파란색</option>
          <option value='g'>초록색</option>
          <option value='r'>빨간색</option>";

            break;
        }

        ?>
        </select>
        <hr>
        &nbsp;&nbsp;&nbsp;
        사이즈
        &nbsp;&nbsp;&nbsp;
        <select class="" name="" id="size">
          <?php
            switch ($shop_size) {
              case '1':
                echo "<option value='S'>S</option>";
                echo "<option value='M'>M</option>";
                echo "<option value='L'>L</option>";
                break;

              case '2':
              echo "<option value='M'>M</option>";
              echo "<option value='L'>L</option>";
              echo "<option value='x'>XL</option>";
                break;
              case '3':
              echo "<option value='L'>L</option>";
              echo "<option value='x'>XL</option>";
              echo "<option value='X'>XXL</option>";
                break;
            }
           ?>

        </select>
        <input type="hidden" name="" id="prd_num" value="<?=$prd_type.$prd_num?>">



        <hr>
        &nbsp;&nbsp;&nbsp;
        <input type="number" name="" value="1" min="0" max="99" id="count"> 개
        <hr>
        <button type="button" id="insert_basket">장바구니 담기</button>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#insert_basket").click(function(event) {

            $.ajax({
              url: 'shopping_basket_insert.php',
              type: 'POST',
              data: {
                prd_num: $("#prd_num").val(),
                size: $("#size").val(),
                color: $("#color").val(),
                count: $("#count").val()

              }
            })
            .done(function(result) {
              console.log("success");
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
          });
        });
        </script>
        <a href="./shopping_basket.php"> <button type="button">장바구니 바로가기</button></a>

        <?php
      }
       ?>



    </div>
  </div>  <!-- prd_img_info end -->
<?php
}
}
?>




<!-- *************리스트************* -->
<?php if (!empty($_POST['prd_num'])  ||  isset($_POST['regist'])) {
  echo '<hr class="title_hr">';
}
  ?>

<div class="prd_list" >
  <div class="ord_rg_prd">
    <div class="list_menu_option">
      <form action="./sh_man_list.php?mode=<?=$list_name?>" method="post">
        <input type="hidden" name="prd_num" value="<?=$prd_num?>">
        <input type="submit" name="" value="보기">
        <select class="" name="option_list_count">
          <option value="4" <?=$selected1?>>4개씩</option>
          <option value="12" <?=$selected2?>>12개씩</option>
          <option value="24" <?=$selected3?>>24개씩</option>
          <option value="48" <?=$selected4?>>48개씩</option>
        </select>
      </form>
    </div>    <!-- list_menu_option end -->
    <div class="btn_rg_prd">
      <?php
      $sql8="SELECT * from `admin_authority` where id = '$userid';";
      $result8 = mysqli_query($conn, $sql8) or die("실패원인 : " . mysqli_error($conn));
      $row8 = mysqli_fetch_array($result8);
      $auth_shop = $row8['auth_shop'];
      if (!empty($auth_shop)) {
        ?>
        <form class="" action="./sh_man_list.php?mode=<?=$list_name?>&type=regist" method="post">
          <input type="submit" name="" value="상품등록" style="float:right">
          <input type="hidden" name="prd_num" value="">
          <input type="hidden" name="regist" value="regist">
        </form>
        <?php
      }
      ?>
    </div>    <!-- btn_rg_prd end -->
  </div>  <!-- ord_rg_prd end -->

  <div class="body_prd_list">
        <?php
        for ($i=$start; $i < $start+$list_count && $i<$total; $i++) {
          mysqli_data_seek($result, $i);
          $row = mysqli_fetch_array($result);
          $prd_name=$row['prd_name'];
          $prd_num=$row['prd_num'];
          $shop_best=$row['shop_best'];
          $shop_price=$row['shop_price'];
          $shop_stock=$row['shop_stock'];
          $file_name_0=$row['file_name_0'];
          $file_copied_0=$row['file_copied_0'];
          for ($j=0; $j < 10; $j++) {
            $file_name[$j]=$row["file_name_$j"];
            $file_copied[$j]=$row["file_copied_$j"];
            if (!empty($file_name[$j])) {
              $file_name_0=  $file_name[$j];
              $file_copied_0=$file_copied[$j];
              $j=11;
            }
          }
          if (!empty($file_copied_0)) {
            //이미지 정보를 가져오게 하는 방법이다  width height type
            $image_info = getimagesize("./img/".$file_copied_0);
            $image_width = $image_info[0];
            $image_height = $image_info[1];
            $image_type = $image_info[2];

          }else{
            $image_width = 0;
            $image_height = 0;
            $image_type = "";
          }
          ?>

          <div class="prd_list_cont">
            <form action="./sh_man_list.php?mode=<?=$list_name?>&page=<?=$page?>" method="post">
              <div class="p_li_img responsive-center">
                <input type="hidden" name="prd_num" value="<?=$prd_num?>">
                <button type="submit" name="button"><img src="./img/<?=$file_copied_0?>" alt="<?=$prd_name?>"></button>
              </div>
              <div class="prd_best">
                <?php
                if ($shop_best=='1') {
                  ?>
                  <span class="prd_emph">★</span>
                  <span>BEST</span>
                  <span class="prd_emph">★</span>
                  <?php
                }
                ?>
              </div>
              <div class="prd_price">
                <?=$shop_price?>원
              </div>
              <div class="prd_name">
                <?=$prd_name?>
              </div>
              <div class="prd_info">
                재고 : <?=$shop_stock?>
              </div>
            </form>

              <?php
              if ($session == "admin") {
              ?>
              <div class="btn_admin">
                <form class="" action="./sh_man_list.php?mode=<?=$list_name?>&type=regist" method="post">
                  <input class="admin_btn" type="submit" name="" value="수정">
                  <input type="hidden" name="prd_num" value="<?=$prd_num?>">
                  <input type="hidden" name="update" value="update">
                </form>
                <form class="" action="./shop_register_delete.php" method="post">
                  <input type="hidden" name="prd_num" value="<?=$prd_num?>">
                  <input type="hidden" name="list_name" value="<?=$list_name?>">
                  <input class="admin_btn" type="submit" name="" value="삭제">
                </form>
              </div>
              <?php
              }
              ?>
          </div>
          <?php
        }
         ?>
  </div>  <!-- body_prd_list end -->
</div><!-- prd_list end -->
<script type="text/javascript">
function change_img_upload(pic) {
  fileNm = $(pic).val();
  console.log(fileNm);
  if (fileNm != "") {
    var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
    if (!(ext == "jpg" || ext == "jpeg" || ext == "png" || ext == "gif" || ext == "bmp" || ext == "pjpeg" || ext == "tiff")) {
      alert("이미지파일 (.jpg, .jpeg, .png, .gif, .bmp, .pjpeg, .tiff) 만 업로드 가능합니다.");
      $(pic).val("");
      return;
    }
  }
  var reader = new FileReader();
  reader.onload = function(e) {
    $("#prd_image").attr("src", e.target.result);
  }
  reader.readAsDataURL(pic.files[0]);

  document.getElementById("p_i_slides").display = "block";
  document.getElementById("del_file").checked=true;
  document.getElementById("del_file").disabled=true;
}
</script>
<script src="./js/slider.js"></script>
<hr class="title_hr">
<div class="page_to">
  <div class="page_to_in">
    <a href="./sh_man_list.php?page=1&mode=<?=$list_name?>">◀◀</a>
    <?php
         if ($page>1) {
               $page_go=$page-1;
                echo '<a class="previous" href="./sh_man_list.php?page='.$page_go.'&mode='.$list_name.'">이전 ◀</a>';
              }else {
                echo '<a class="previous" href="./sh_man_list.php?page=1&mode='.$list_name.'">이전 ◀</a>';
              }
              for ($i=1; $i <= $total_page ; $i++) {
                if($page==$i){
                  echo "<a>&nbsp;$i&nbsp;</a>";
                }else{
                  //싱글쿼테이션은 문자로 인식하지 않는다
                  //더블은 문자로 인식
                  echo '<a href="./sh_man_list.php?page='.$i.'&mode='.$list_name.'">&nbsp;'.$i.'&nbsp;</a>';
                }
              }
              if ($total_page==0) {
                echo '<a class="next" href="./sh_man_list.php?page=1&mode='.$list_name.'">▶ 다음</a>';
              }elseif ($page+1>$total_page) {
                $page_end=$total_page;
                echo '<a class="next" href="./sh_man_list.php?page='.$page_end.'&mode='.$list_name.'">▶ 다음</a>';
              }else{
                $page_go=$page+1;
                echo '<a class="next" href="./sh_man_list.php?page='.$page_go.'&mode='.$list_name.'">▶ 다음</a>';
              }
              ?>
    <a href="./sh_man_list.php?page=<?=$total_page?>&mode=<?=$list_name?>">▶▶</a>
  </div> <!-- page_to in end 페이지 이동 -->
</div> <!-- page_to end 페이지 이동 -->
<p>&nbsp;</p>
<p>&nbsp;</p>
</div> <!-- main end -->
</div> <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
