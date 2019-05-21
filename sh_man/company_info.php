<!-- 회사 등록 패턴 검사 및 이메일 처리하기 -->
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="#about">추천/예약</a>
  <a href="#services">맛집</a>
  <a href="#clients">숙박</a>
  <a href="#contact">렌트카</a>
</div><!-- sidenav end -->
<div class="main">
  <div class="">
    <form class="" action="./insert_company_info.php" method="post">

    <table>
      <tr>
        <td>회사 타입</td>
        <td>
          <select class="" name="company_num">
            <option value="e_">맛집/체험</option>
            <option value="a_">숙박</option>
            <option value="c_">렌트카</option>
            <option value="s_">쇼핑</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>회사 이름</td>
        <td>
          <input type="text" name="company_name" value="">
        </td>
      </tr>
      <tr>
        <td>회사 주소</td>
        <td>
          <input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br>
          <input type="text" name="com_addr1" value=""> <br>
          <input type="text" name="com_addr2" value="" placeholder="상세주소">
          <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
          <script>
              function execDaumPostcode() {
                  new daum.Postcode({
                      oncomplete: function(data) {
                          // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                          // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                          // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                          var addr = ''; // 주소 변수
                          var extraAddr = ''; // 참고항목 변수

                          //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                          if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                              addr = data.roadAddress;
                          } else { // 사용자가 지번 주소를 선택했을 경우(J)
                              addr = data.jibunAddress;
                          }

                          // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                          if(data.userSelectedType === 'R'){
                              // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                              // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                              if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                                  extraAddr += data.bname;
                              }
                              // 건물명이 있고, 공동주택일 경우 추가한다.
                              if(data.buildingName !== '' && data.apartment === 'Y'){
                                  extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                              }
                              // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                              if(extraAddr !== ''){
                                  extraAddr = ' (' + extraAddr + ')';
                              }
                              // 조합된 참고항목을 해당 필드에 넣는다.
                              document.getElementById("extraAddress").value = extraAddr;

                          } else {
                              document.getElementById("extraAddress").value = '';
                          }

                          // 우편번호와 주소 정보를 해당 필드에 넣는다.
                          document.getElementById('postcode').value = data.zonecode;
                          document.getElementById("address").value = addr;
                          // 커서를 상세주소 필드로 이동한다.
                          document.getElementById("detailAddress").focus();
                      }
                  }).open();
              }
              function check_email(){
                window.open("../mb_login/check_email.php", "IDEmail", "left=200, top=200, width=700, height=550, scrollbars=no, resizable=no");
              }
          </script>
        </td>
      </tr>
      <tr>
        <td>회사 이메일</td>
        <td>
          <input type="text" name="com_email1" value="" />@
          <input type="text" name="com_email2" value="" />

        </td>
      </tr>
      <tr>
        <td>전화 번호</td>
        <td><input type="text" name="com_tel" value=""> </td>
      </tr>
      <tr>
        <td>회사 등록번호</td>
        <td> <input type="text" name="com_regist_num" value="" placeholder="예시 214-86-28824"> </td>
      </tr>
      <tr>
        <td>통신 판매 신고 번호</td>
        <td><input type="text" name="com_tel_report" value=""> </td>
      </tr>
    </table>
    <input type="submit" name="" value="등록하기">
  </form>
  </div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
