
<?php
  session_start();



?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="./css/country0.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <script type="text/javascript">
  function change_img_upload1(pic1){
      fileNm = $(pic1).val();
      if(fileNm != ""){
        var ext = fileNm.slice(fileNm.lastIndexOf(".") +1).toLowerCase();
        if(!(ext == "gif" || ext == "jpg" || ext == "png")){
          alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
          $(pic1).val("");
          return;
        }
      }
      var reader = new FileReader();
      reader.onload = function(e){
        $("#profile_image1").attr("src", e.target.result);
      }
      reader.readAsDataURL(pic1.files[0]);
   }
  function change_img_upload2(pic2){
      fileNm = $(pic2).val();
      if(fileNm != ""){
        var ext = fileNm.slice(fileNm.lastIndexOf(".") +1).toLowerCase();
        if(!(ext == "gif" || ext == "jpg" || ext == "png")){
          alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
          $(pic2).val("");
          return;
        }
      }
      var reader = new FileReader();
      reader.onload = function(e){
        $("#profile_image2").attr("src", e.target.result);
      }
      reader.readAsDataURL(pic2.files[0]);
   }

  function check_input(){


      if(!document.country_form.product_num.value){alert("상품번호를 입력해주세요.");	document.country_form.product_num.focus();	return ;  }
      if(!document.country_form.area.value){alert("지역을 입력해주세요"); document.country_form.area.focus(); return ;   }
      if(!document.country_form.model.value){alert("차종을 입력해주세요"); document.country_form.model.focus(); return ;   }
      if(!document.country_form.model_num.value){alert("차 번호를 입력해주세요"); document.country_form.model_num.focus(); return ;   }
      if(!document.country_form.datepicker1.value){alert("대여기간을 입력해주세요"); document.country_form.datepicker1.focus(); return ;   }
      if(!document.country_form.datepicker2.value){alert("반납기간을 입력해주세요"); document.country_form.datepicker2.focus(); return ;   }
      if(!document.country_form.Fare.value){alert("요금을 입력해주세요"); document.country_form.Fare.focus(); return ;   }
      if(!document.country_form.stock.value){alert("재고를 입력해주세요"); document.country_form.stock.focus(); return ;   }
      if(!document.country_form.datepicker3.value){alert("상품등록날짜를 입력해주세요"); document.country_form.datepicker3.focus(); return ;   }

    document.country_form.submit();
  }

  </script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
  <div id="sidenav" class="sidenav">
    <a href="#about">관 리 자</a>
    <a href="#services">맛집 관리</a>
    <a href="#clients">숙박 관리</a>
    <a href="ra_car_country_admin_insert.php">렌트카 관리</a>
    <a href="admin_a.php">권한 관리</a>
    <a href="company_info.php">회사정보 관리</a>
    <a href="main.php">메인 이미지 관리</a>
    <a href="order_takeback.php">반품&환불 관리</a>
    <a href="prd_a.php">답변내역 관리</a>

  </div><!-- sidenav end -->
<div class="main">
  <div style="color:rgb(156, 156, 156); width:10%; float:left;">
   회사 정보
  </div>
  <!-- <div class=""><img style="width:40px; height:40px; display: inline-block; float:left;" src="./img/company_information.png" alt=""></div> -->
<br>



  <hr size="1" width="80%" align="left">
  <form action="countrt_insert.php" method="post" name="country_form">
  <table class="table1" style="width:70%;">
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 상 호 명</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 주식회사 lotus"  autofocus></td>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 회사 소개</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 안녕하세요."  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 대표자 이름</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 김 경 덕"  autofocus></td>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 은  행</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 미래 은행"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 연 락 처</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 계좌 번호</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 054-29391-232311"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 팩스 번호</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 050-3495-1923"  autofocus></td>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 개인정보 책임담당자</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 신 혜 지"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 이 메 일</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) jsa0jsa@naver.com"  autofocus></td>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 운영 시간</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 08:00~18:00"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 주  소</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 성북구 신방빌딩"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 사업자 번호</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 384SB신방빌딩"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 통신판매 신고여부</td>
      <td><input type="text" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 약  도</td>
      <td><input type="file" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
    </tr>
    <tr>
      <td style="width:210px;"><span style="color:rgb(240, 165, 0);">*</span> 약도 복사본</td>
      <td><input type="file" name="product_num" class="div_none" placeholder="ex) 02-3495-1923"  autofocus></td>
    </tr>

</table>
<hr size="1" width="80%" align="left">
</form>
<div id="btn_cancel">
  <input id="flight_insert" type="button" onclick="check_input()" value="등  록">
  <input id="flight_insert" type="button" onclick="clear()" value="취  소">
</div>


</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
