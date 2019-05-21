
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
  $sese=$type=$selected1=$selected2=$selected3=$selected4="";
  if($_GET['mode']=="man"){
    $name="남성의류";
    $list_name="man";
  }else if($_GET['mode']=="woman"){
    $name="여성의류";
    $list_name="woman";
  }else if($_GET['mode']=="shose"){
    $name="신발";
    $list_name="shose";
  }
  $list_count=4;
  if (isset($_POST['option_list_count'])) {
    $list_count=$_POST['option_list_count'];
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
  $admin="admin";
  if (isset($_GET['sese'])) {
    $sese=$_GET['sese'];
  }
  if (isset($_GET['type'])) {
    $type=$_GET['type'];
  }


  //1.전체페이지, 2.디폴트페이지, 3.현재페이지 시작번호 4.보여줄리스트번호
  //1.전체페이지
  $total_page=(12 % SCALE == 0 )?
  (12/SCALE):(ceil(12/SCALE));

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/list.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
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
  <?php if ($sese=="abc") {

   ?>
  <div class="" style="width:100%; height:650px">
    <div class="upcenter" style="width:50%; float:left; text-align:center">
      <p>쿠팡폼</p>
      <div class="container">
    <div class="mySlides">
      <div class="numbertext">1 / 7</div>
      <img src="./img/number0.png" style="width:50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 7</div>
      <img src="./img/number2.png" style="width:50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 7</div>
      <img src="./img/number3.png" style="width:50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 7</div>
      <img src="./img/number4.png" style="width:50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">5 / 7</div>
      <img src="./img/number5.png" style="width:50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">6 / 7</div>
      <img src="./img/number6.png" style="width:50%">
    </div>
    <div class="mySlides">
      <div class="numbertext">7 / 7</div>
      <img src="./img/number6.png" style="width:50%">
    </div>

  <div class="" style="text-align:left;">


    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>


    <div class="" style="width:100%">


      <div class="column">
        <img class="demo cursor" src="./img/number0.png" style="width:100%" onclick="currentSlide(1)" >
      </div>
      <div class="column">
        <img class="demo cursor" src="./img/number2.png" style="width:100%" onclick="currentSlide(2)">
      </div>
      <div class="column">
        <img class="demo cursor" src="./img/number3.png" style="width:100%" onclick="currentSlide(3)" >
      </div>
      <div class="column">
        <img class="demo cursor" src="./img/number4.png" style="width:100%" onclick="currentSlide(4)" >
      </div>
      <div class="column">
        <img class="demo cursor" src="./img/number5.png" style="width:100%" onclick="currentSlide(5)" >
      </div>
      <div class="column">
        <img class="demo cursor" src="./img/number6.png" style="width:100%" onclick="currentSlide(6)" >
      </div>
      <div class="column">
        <img class="demo cursor" src="./img/number6.png" style="width:100%" onclick="currentSlide(7)" >
      </div>
    </div>
  </div>
  </div>

  <script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
  </script>


    </div>
    <div class="" style="width:50%; float:right">
      <?php
      if ($type=='regist') {
        ?>
        <form class="" action="./insert_shop_prd.php" method="post" enctype="multipart/form-data">
        <input type="text" name="shop_name" value="" placeholder="샾이름">
        <input type="text" name="prd_name" placeholder="상품명">
        <hr>
        <select class="" name="type_m_w_s">
          <option value="m">남성의류</option>
          <option value="w">여성의류</option>
          <option value="s">신발</option>

        </select>
        <hr>
        <input type="number" name="prd_price" placeholder="상품 가격"> 원
        <hr>

        택배사 : 한진택배
        <hr>
        색상
        <select class="" name="prd_color">
          <option value="1">흰/검</option>
          <option value="2">흰/검/파</option>
          <option value="3">흰/검/빨</option>
          <option value="4">흰/검/초</option>
          <option value="5">흰/검/파/빨</option>
          <option value="6">흰/검/파/초</option>
          <option value="7">흰/검/빨/초</option>
          <option value="8">흰/검/파/빨/초</option>
        </select>
        <hr>
        사이즈
        <select class="" name="prd_size">
          <option value="1">S</option>
          <option value="2">M</option>
          <option value="3">L</option>
          <option value="4">XL</option>
          <option value="5">XXL</option>
        </select>
        <hr>
        <input type="checkbox" name="prd_best" value="1"> 베스트
        <hr>
        <input type="number" name="prd_stock" placeholder="현재 재고"> 개
        <hr>
        <?php for ($i = 0; $i < 10; $i++) {
          ?>
          <input type="file" name="prd_img[]" value="">
          <?php
        } ?>
        <input type="submit" name="" value="등록하기">

      </form>
        <?php
      }else {
        ?>
        린넨 가디건
        <span style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;">★</span>
        <hr>
          50000원
        <hr>
        택배사 : 한진택배
        <hr>
        <select class="" name="">
          <option value="">흰색</option>
          <option value="">검정색</option>
          <option value="">파란색</option>
          <option value="">초록색</option>
          <option value="">빨간색</option>
        </select>
        <hr>
        <input type="number" name="" value="1" min="0" max="99" > 개
        <hr>
        <button type="button" name="button">장바구니 담기</button>
        <a href="./shopping_basket.php"> <button type="button" name="button">장바구니 바로가기</button></a>
        <a href="./shopping_payment.php"> <button type="button" name="button">바로구매</button></a>
        <?php
      }
       ?>



    </div>
  </div>

  <div class="" style="clear:both">
    <div class="">

  <div class="tab" >
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">상품 상세</button>

  </div>
  <div class="tab">

  <button class="tablinks" onclick="openCity(event, 'Paris')">상품평</button>

  </div>
  <div class="tab">

  <button class="tablinks" onclick="openCity(event, 'Tokyo')">상품문의</button>
  </div>
  <div class="tab">

  <button class="tablinks" onclick="openCity(event, 'Seoul')">배송/교환/반품 안내</button>
  </div>

  <div id="London" class="tabcontent">
  <h3>필수 표기 정보</h3>
  <table style="text-align:center">
    <tr>
      <td>제품소재</td>
      <td>상세페이지 기재</td>
      <td>색상</td>
      <td>상세페이지 기재</td>
    </tr>
    <tr>
      <td>치수</td>
      <td>상세페이지 기재</td>
      <td>제조자(수입자)</td>
      <td>상세페이지 기재</td>
    </tr>
    <tr>
      <td>제조국</td>
      <td>상세페이지 기재</td>
      <td>세탁방법 및 취급시 주의사항</td>
      <td>상세페이지 기재</td>
    </tr>
  </table>
  </div>

  <div id="Paris" class="tabcontent">
  <h3>상품평</h3>
  <p style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;display:inline;">★</p>
  <p style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;display:inline;">★</p>
  <p style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;display:inline;">★</p>
  <p style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;display:inline;">★</p>
  <p style="color:rgb(255, 222, 0);text-shadow:2px 2px 0.5px gray;display:inline;">★</p>
  <hr>
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">
  <img src="./img/number0.png" alt="" style="width:8%">

  </div>

  <div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
  </div>
  <div id="Seoul" class="tabcontent">
  <h3>Seoul</h3>
  <p>Seoul is the capital of Korea.</p>
  </div>

  <script>
  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  </script>

    </div>
  </div>

<?php
} ?>




<!-- *************리스트************* -->

<div class="">
  <div class="">
    <?php
    if ($admin == "admin") {
      ?>
      <form class="" action="./sh_man_list.php?mode=<?=$list_name?>&sese=abc&type=regist" method="post">
        <input type="submit" name="" value="상품등록" style="float:right">
      </form>
      <a href="./shop_register.php?mode=<?=$list_name?>"> <button type="button" name="button" style="float:right">샾 등록</button> </a>
      <a href="./company_info.php?mode=<?=$list_name?>"> <button type="button" name="button" style="float:right">회사 등록</button> </a>
      <?php
    }
     ?>

    <h1><?=$name?></h1>
  </div>
  <div class="">
    <ul class="list_menu_ul">
      <li class="list_menu"><a href="#">연애 랭킹순</a> | </li>
      <li class="list_menu"><a href="#">낮은 가격순</a> | </li>
      <li class="list_menu"><a href="#">높은 가격순</a> | </li>
      <li class="list_menu"><a href="#">판매장소</a> | </li>
      <li class="list_menu"><a href="#">최신순</a></li>
      <li class="list_menu_option">
        <form class="" action="./sh_man_list.php?mode=<?=$list_name?>&sese=abc" method="post">
          <select class="" name="option_list_count">
            <option value="4" <?=$selected1?>>4개씩</option>
            <option value="12" <?=$selected2?>>12개씩</option>
            <option value="24" <?=$selected3?>>24개씩</option>
            <option value="48" <?=$selected4?>>48개씩</option>
            <input type="submit" name="" value="보기">
          </select>
        </form>

      </li>
    </ul>
    <div class="" style="width:100%">
      <ul>
        <li class="list_menu" style="width:24%">
          <div class="">
            <a href="./sh_man_list.php?mode=<?=$list_name?>&sese=abc"><img src="./img/number0.png" alt="" style="width:100%"></a>
            <p>숫자0</p>
            <p>1500원</p>
            <p>*****</p>
            <?php
            if ($admin == "admin") {
              ?>
              <button type="button" name="button">수정</button>
              <button type="button" name="button">삭제</button>
              <?php
            }
             ?>

          </div>
        </li>

      </ul>
    </div>
  </div>



</div>

<div class="page_to" >
  <div class="page_to_in" >


  <a href="./cus_complain_main.php?page=1">◀◀</a>
  <?php
  if ($page>1) {
         $page_go=$page-1;
         echo '<a class="previous" href="./cus_complain_main.php?page='.$page_go.'">이전 ◀</a>';
       }else {
         echo '<a class="previous" href="./cus_complain_main.php?page=1">이전 ◀</a>';
       }
       for ($i=1; $i <= $total_page ; $i++) {
         if($page==$i){
           echo "<a>&nbsp;$i&nbsp;</a>";
         }else{
           //싱글쿼테이션은 문자로 인식하지 않는다
           //더블은 문자로 인식
           echo "<a href='./cus_complain_main.php?page=$i'>&nbsp;$i&nbsp;</a>";
         }
       }
       if ($total_page==0) {
         echo '<a class="next1" href="./cus_complain_main.php?page=1">▶ 다음</a>';
       }elseif ($page+1>$total_page) {
         $page_end=$total_page;
         echo '<a class="next1" href="./cus_complain_main.php?page='.$page_end.'">▶ 다음</a>';
       }else{
         $page_go=$page+1;
         echo '<a class="next1" href="./cus_complain_main.php?page='.$page_go.'">▶ 다음</a>';
       }
       ?>
    <a href="./cus_complain_main.php?page=<?=$total_page?>">▶▶</a>
      </div>
</div> <!-- page_to end 페이지 이동 -->


</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
