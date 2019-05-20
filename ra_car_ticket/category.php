<?php
  session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/category.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <style media="screen">

   li{
   list-style: none;
   margin-top:5px;
   }

   #title1{
     height: 60px;
     font-size:20px;
     font-weight: bold;
     margin: 0 auto;
   }
   select{
     margin-left: 20px;
     width: 200px;
     height: 45px;
     padding: .8em .5em;
     font-family: inherit;
     background-color:rgb(60, 150, 255);
     border: none;
     font-size:14px;
     color:rgb(255, 255, 255);
   }
   option{
     font-size: 20px;
     background-color: rgb(255, 255, 255);
     color:rgb(102, 102, 102);
     height: 45px;
     padding: .8em .5em;
   }
   .sample_image  img {
    -webkit-transform:scale(1);
    -moz-transform:scale(1);
    -ms-transform:scale(1);
    -o-transform:scale(1);
    transform:scale(1);
    -webkit-transition:.3s;
    -moz-transition:.3s;
    -ms-transition:.3s;
    -o-transition:.3s;
    transition:.3s;
}
.sample_image:hover img {
    -webkit-transform:scale(1.2);
    -moz-transform:scale(1.2);
    -ms-transform:scale(1.2);
    -o-transform:scale(1.2);
    transform:scale(1.2);
}
.sample_image { overflow: hidden; }

  </style>

  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>

<body>
  <!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <!-- header end -->
  <!-- main_body start -->
  <div class="main_body">
    <div class="main"></div> <!-- main end -->

    <div class="category_search"; style="background-color:rgb(59, 137, 255); height:100px; ">
    <ul>
      <br>
      <li id="title1" style="color:white; float:left; margin:0 auto;" > 연애의길 여행 <br> 렌터카 </li>
      <li style="color:white; float:left;"><select clss="selectbox1">
        <option value="">전국 이용권</option>
        <option value="">제주 이용권</option>
      </select> </li>
      <li style="color:white; float:left;"><select clss="selectbox2">
        <option value="" id="datepicker1">대여일/시간</option>
      </select></li>
      <li style="color:white; float:left;"><select clss="selectbox2">

      </select></li>
      <li>&nbsp; <img src="./img/search.png"  style="background-color:rgb(255, 255, 255); width:50px; height:48px;"> </li>
    </ul>
  </div> <!-- end of category_search  -->
<br>

<div style="width:100%; margin:0 auto;">
  <img src="./img/category_main.jpg"  alt="" style="width:100%; height: 600px;">
</div> <br><br>

  <div style="font-weight:bold; font-size:26px; margin-left:300px; color:rgb(97, 97, 97);";>
    렌터카 카테고리
  </div><br> <br>

  <div>
    <table style=" margin-left:300px;">
      <tr>
        <td clss="sample_image"><a href="#"><img src="./img/catagory_img1.jpg" style="width:300px;"></a></td>
      </tr>
      <tr style="width:100px;">
        <td style="color:rgb(156, 156, 156);">전체티켓</td>
      </tr>
    </table>
    <table style="margin-left:30px;">
      <tr>
        <td><a href="#"><img src="./img/catagory_img1.jpg" style="width:300px;"></a></td>
      </tr>
      <tr style="width:100px;">
        <td style="color:rgb(156, 156, 156);">전체티켓</td>
      </tr>
    </table>


  </div>


















  </div> <!-- main_body end -->
  <!-- footer start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
  <!-- footer_bg end -->
</body>

</html>
