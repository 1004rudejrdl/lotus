﻿<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector_main.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/img_re.css">
  <link rel="stylesheet" href="./css/main.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<script type="text/javascript">
  function color_test(){
    window.open('./tt_color/tt_color_list.php','','scrollbars=no,toolbars=no,width=350,height=530');
  }
</script>

<body>
  <!-- header start -->
  <div class="header-top">
    <div id="navbar" class="topnav sticky">
      <!-- id for sticky -->
      <div class="dropdown logo_center">
        <button class="logo"><a href="./index.php"> <img id="navbar_img" src="./main_img/lotus_logo_text_black.png" alt=""></a></button>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          <a href="./find_meet/meeting.php?mode=whole">연인찾기&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>내게 맞는 연인찾기</h2>
          </div> <!-- header -->
          <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
        </div> <!-- dropdown-content end -->
      </div> <!-- dropdown end -->
      <div class="dropdown">
        <button class="dropbtn">
          <a href="./sh_man/sh_man_list.php?mode=man">쇼핑몰&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>패션 고자를 위한 쇼핑몰</h2>
          </div> <!-- header -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown ">
        <button class="dropbtn">
          <a href="./tt_color/tt_color_test.php">테스트&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>당신의 연애 성향이 궁금하다면</h2>
          </div> <!-- header -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->
      <div class="dropdown ">
        <button class="dropbtn">
          <a href="./cm_free/cm_free_list.php">커뮤니티&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
        </button>
        <div class="dropdown-content">
          <div class="header">
            <h2>다 드루와</h2>
          </div> <!-- header -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/mega_menu_index.php"; ?>
        </div> <!-- dropdown-content -->
      </div> <!-- dropdown -->

      <?php if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){?>
      <div class="dropdown dd_right">
        <?php
        $is_admin = substr($_SESSION['userid'], 0, 5);
        if($is_admin=="admin"){
          ?>
          <button class="dropbtn"><a class="username" href="./admin_authority/a_auth_main.php">관리자 <?=$_SESSION['name']?> 님</a></button>
          <?php
        }else{
          ?>
          <button class="dropbtn"><a class="username" href="./find_meet/user.php" ><?=$_SESSION['name']?> 님</a></button>
          <?php
        }
        ?>
      </div> <!-- dropdown -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="./mb_login/logout.php">LOGOUT</a></button>
      </div> <!-- dropdown -->

<?php } else {?>

      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="./mb_login/mb_login.php">LOGIN</a></button>
      </div> <!-- dropdown -->
      <div class="dropdown dd_right">
        <button class="dropbtn"><a href="./mb_login/mb_join_form.php">JOIN</a></button>
      </div> <!-- dropdown -->

<?php } ?>

    </div> <!-- topnav end -->
    <img id="header_img" src="./main_img/lotus_main_img3.png" alt="연애 꽃피우다" style="width:100%;">
  </div>

  <!-- modal signup form -->

  <!-- common effect -->
  <!-- sticky goto top -->
  <button onclick="topFunction()" id="gotoTopBtn" title="Go to top">Top</button>
  <!-- sticky goto top end -->
  <!-- sticky social icon -->
  <div class="icon-bar">
    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
    <a href="#" class="google"><i class="fa fa-google"></i></a>
    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
    <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
  </div>
  <!-- sticky social icon end-->
  <!-- common effect end-->

  <script src="./js/effect_common.js"></script><!-- Sticky event를 위해서 상단에 올리지 못함 -->
  <script src="./js/main.js"></script><!-- Sticky event를 위해서 상단에 올리지 못함 -->
  <!-- header end -->
  <!-- main_body start -->
<div class="main_body">
  <div class="main_body_center">
    <table class="width_60">      <!-- 그림, 남프, 여프, 로그 -->
      <tr>
        <td colspan="2">
          <img src="./main_img/lotus_main_img.png" alt="연애 꽃피우다" style="width:100%;">
        </td>
      </tr>
      <?php
        $sql1 = "SELECT * from member m inner join member_meeting mm on m.id = mm.id where gender = '0' or  gender = '남' order by `mb_num` desc limit 1";
        $result1=mysqli_query($conn,$sql1) or die('Error: '.mysqli_error($conn));
        $row1=mysqli_fetch_array($result1);

        $id_m=$row1['id'];
        $img_m=$row1['img'];


        $sql2 = "SELECT * from member m inner join member_meeting mm on m.id = mm.id where gender = '1' or  gender = '여' order by `mb_num` desc limit 1";
        $result2=mysqli_query($conn,$sql2) or die('Error: '.mysqli_error($conn));
        $row2=mysqli_fetch_array($result2);

        $id_f=$row2['id'];
        $img_f=$row2['img'];
       ?>
      <tr>
        <td class="width_30 m_pr">
          <div class="profile">             <!-- 남여 프로필카드 -->
            <div class="profile_img responsive-center">
              <img src="./mb_login/<?=$img_m?>" alt="<?=$id_m?>">
            </div>
            <div class="profile_container">
              <h4><b>최근 가입 남성</b></h4>
              <h4><b><?=$id_m?></b></h4>
            </div>
          </div>
        </td>
        <td class="width_30 f_pr">
          <div class="profile ">             <!-- 남여 프로필카드 -->
            <div class="profile_img responsive-center">
              <img src="./mb_login/<?=$img_f?>" alt="<?=$id_f?>">
            </div>
            <div class="profile_container">
              <h4><b>최근 가입 여성</h4>
              <h4><b><?=$id_f?></b></h4>
            </div>
          </div>
        </td>
      </tr>
    </table>       <!-- 그림, 남프, 여프, 로그 -->
    <div class="width_40">
      <?php
      $sql="SELECT * FROM member_meeting where matching_day != '' order by `matching_day` desc limit 8";
      $result=mysqli_query($conn,$sql);
      $total_record=mysqli_num_rows($result);
      $left_right = "right";
      ?>
      <div class="br_st_text">
        <div class="timeline">
      <?php
      for ($i = 0; $i < $total_record ; $i++){
        mysqli_data_seek($result,$i);
        $row=mysqli_fetch_array($result);
        $id=$row['id'];
        $matching=$row['matching'];
        $matching_day=$row['matching_day'];
        if ($left_right=="left") {
          $left_right="right";
        }else{
          $left_right="left";
        }
       ?>
       <div class="container <?=$left_right?>">
         <div class="content">
           <h4><?= $matching_day?></h4>
           <p><?=$id?> ♥ <?=$matching?></p>
         </div>
       </div>
       <?php
       }//end of for
       ?>
        </div><!-- timeline end -->
      </div><!-- br_st_text -->
    </div>
  </div>  <!-- main_body_center end -->

  <div class="main_body_product"> <!-- 식당, 숙박, 렌트카, 쇼핑 -->

    <?php
    //$sql = "SELECT shop_best,file_copied_0 from prd_shop_detail where prd_type = '$type' order by shop_best desc,prd_num desc;";
    $sql = "SELECT * from prd_shop_detail order by shop_best desc,prd_num desc limit 4;";
    $result = mysqli_query($conn, $sql) or die("실패원인 : " . mysqli_error($conn));
    $total = mysqli_num_rows($result);

    for ($i=0; $i < 4; $i++) {
      $row = mysqli_fetch_array($result);
      $shop_best[$i]=$row['shop_best'];
      $prd_num[$i]=$row['prd_num'];
      $prd_type[$i]=$row['prd_type'];
      $file_copied_0[$i]=$row['file_copied_0'];
      $prd_name[$i]=$row['prd_name'];
      $len_prd_name[$i]=strlen($row['prd_name']);
      if($len_prd_name[$i]>17) {
        $prd_name_ehco[$i]=mb_substr($row['prd_name'], 0, 7, 'utf-8');
        $prd_name_ehco[$i]=$prd_name_ehco[$i]."...";
      }
      ?>
      <?php
    }
     ?>
    <ul>
      <?php
      for ($i=0; $i < 4; $i++) {
        if (!empty($shop_best[$i])) {
        ?>
        <li class="centerproduct"><?=$prd_name_ehco[$i]?></li>
        <?php
      }else {
        ?>
        <li class="centerproduct">상품 없음</li>
        <?php
      }
      } ?>
    </ul>
    <ul><?php
    for ($i=0; $i < 4; $i++) {
      if (!empty($shop_best[$i])) {
        switch ($prd_type[$i]) {
          case 'm':
            $list_name="man";
            break;
          case 'w':
            $list_name="woman";
            break;
          case 's':
            $list_name="shose";
            break;
        }
      ?>
      <form class="" action="./sh_man/sh_man_list.php?mode=<?=$list_name?>&page=1" method="post">
      <input type="hidden" name="prd_num" value="<?=$prd_num[$i]?>">
    <li class="centerproduct">
      <div class="responsive-center">
       <!-- <input type="image" name="" value="" src="./sh_man/img/<=$file_copied_0[$i]?>"> -->
       <button type="submit"><img src="./sh_man/img/<?=$file_copied_0[$i]?>"> </button>
      </div>
    </li>
    </form>

      <?php
    }else {?>

      <li class="centerproduct"><a href="#"><img src="./main_img/no_prd.png" class="centerproductimg"></a></li>
      <?php
    }
    } ?>

    </ul>
  </div> <!-- 식당, 숙박, 렌트카, 쇼핑 end -->

</div>  <!-- main_body end -->

<!-- footer start -->
<div class="footer_bg">
  <div class="footer">
    <ul>
      <li class="footerlist1">회사소개</li>
      <li class="footerlist1">개인정보</li>
      <li class="footerlist1">이용약관</li>
      <li class="footerlist1">채용공고</li>
      <li class="footerlist1">찾아오시는길</li>
    </ul>
    <hr>
    <!-- <table>
      <tr>
        <td><input type="image" src="../image/list_search_button.gif"></td>
        <td>서울 강남구 강남대로 406 (역삼동 820-9 글라스타워) 11,12,16층(135-932) <br>
           상호명 : 듀오정보(주) / 대표자 : 박수경 / 결혼중개업 신고번호 : 강남 080031<br>
           등록번호 : 서울 080079 / 사업자등록번호 : 214-86-28824 통신판매업 신고 : 강남 - 3259호 사업자정보확인<br>
           무료상담전화 : 1577-8333 / Fax : 02-550-6003 / Email : duo@duonet.comCOPYRIGHT 1995~2019 <br>
           @DUOINFO CORP. ALL RIHGT RESERVED</td>
        <td>로고</td>
      </tr>
    </table> -->
    <ul>
      <li class="footerlist2"><input type="image" src="./main_img/lotus_logo_text_black.png"></li>
      <li class="footerlist2">서울 강남구 강남대로 406 (역삼동 820-9 글라스타워) 11,12,16층(135-932) <br>
         상호명 : 듀오정보(주) / 대표자 : 박수경 / 결혼중개업 신고번호 : 강남 080031<br>
         등록번호 : 서울 080079 / 사업자등록번호 : 214-86-28824 통신판매업 신고 : 강남 - 3259호 사업자정보확인<br>
         무료상담전화 : 1577-8333 / Fax : 02-550-6003 / Email : duo@duonet.comCOPYRIGHT 1995~2019 <br>
         @DUOINFO CORP. ALL RIHGT RESERVED</td></li>
      <li class="footerlist2"><input type="image" src="./main_img/lotus_logo_text_black.png"></li>
    </ul>
  </div> <!-- footer end -->
</div>
<!-- footer_bg end -->
</body>

</html>
