<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $mode="insert_com_info";
  $com_type=
  $com_num=
  $com_name=
  $com_postcode=
  $com_address=
  $com_detailAddress=
  $com_extraAddress=
  $com_email_f=
  $com_email_b=
  $com_tel=
  $com_busi_num=
  $com_regist_num="";
  if((isset($_GET['mode'])&&!empty($_GET['mode']))&&$_GET['mode']=="update_com_info"){
      if ((isset($_GET['com_type'])&&!empty($_GET['com_type']))&&
        (isset($_GET['com_num'])&&!empty($_GET['com_num']))) {
          $mode=test_input($_GET['mode']);
          $com_type=test_input($_GET['com_type']);
          $com_num=test_input($_GET['com_num']);

          $sql="SELECT * from `com_info` where `com_type` = '$com_type' and `com_num` = '$com_num';";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
              die('Error: ' . mysqli_error($conn));
            }
            $row=mysqli_fetch_array($result);
            $com_type=$row['com_type'];
            $com_num=$row['com_num'];
            $com_name=$row['com_name'];
            $com_postcode=$row['com_postcode'];
            $com_address=$row['com_address'];
            $com_detailAddress=$row['com_detailAddress'];
            $com_extraAddress=$row['com_extraAddress'];
            $com_addr=$com_postcode." ".$com_address." ".$com_detailAddress." ".$com_extraAddress;
            $com_email=$row['com_email'];
            $com_email = explode("@", $com_email);
            $com_email_f=$com_email[0];
            $com_email_b=$com_email[1];
            $com_tel=$row['com_tel'];
            $com_busi_num=$row['com_busi_num'];
            $com_regist_num=$row['com_regist_num'];

      }
  }
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_c_info_v_w_e_d.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
  <script type="text/javascript">
    function check_email() {
      window.open("./check_email.php", "IDEmail", "left=200, top=200, width=700, height=550, scrollbars=no, resizable=no");
    }
    function SetEmailTail(emailValue) {
      var email = document.all("email") // 사용자 입력
      var emailTail = document.all("email2") // Select box

      if (emailValue == "notSelected") {
        return;
      } else if (emailValue == "etc") {
        emailTail.readOnly = false;
        emailTail.value = "";
        emailTail.focus();
      } else {
        emailTail.readOnly = true;
        emailTail.value = emailValue;
      }
    }
  </script>
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
        <?php if($mode=="update_com_info") {?>
          등록 업체 수정
        <?php }else{ ?>
          등록 업체 등록
        <?php } ?>
      </div>
      <hr class="title_hr">
      <?php if($mode=="update_com_info") {?>
      <form action="./update_a_c_info.php" method="post" name="com_regist_form">
      <?php }else{ ?>
      <form action="./insert_a_c_info.php" method="post" name="com_regist_form">
      <?php } ?>
        <input type="hidden" name="mode" value="<?=$mode?>">
        <input type="hidden" name="com_type" value="<?=$com_type?>">
        <input type="hidden" name="com_num" value="<?=$com_num?>">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 업체 구분</td>
            <td class="tb_cont">
              <select name="com_type" disabled>
                <?php if($mode=="update_com_info"&&$com_type=="e_") {?>
                <option value="e_" selected readOnly>맛집/체험</option>
                <?php }else{ ?>
                <option value="e_">맛집/체험</option>
                <?php
                }
                ?>
                <?php if($mode=="update_com_info"&&$com_type=="a_") {?>
                <option value="a_" selected readOnly>숙박</option>
                <?php }else{ ?>
                <option value="a_">숙박</option>
                <?php
                }
                ?>
                <?php if($mode=="update_com_info"&&$com_type=="c_") {?>
                <option value="c_" selected readOnly>렌트카</option>
                <?php }else{ ?>
                <option value="c_">렌트카</option>
                <?php
                }
                ?>
                <?php if($mode=="update_com_info"&&$com_type=="s_") {?>
                <option value="s_" selected readOnly>쇼핑</option>
                <?php }else{ ?>
                <option value="s_">쇼핑</option>
                <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 상호/대표자</td>
            <td class="tb_cont"><input type="text" name="com_name" placeholder="상호명을 입력하세요" autofocus value="<?=$com_name?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 사업장 소재지</td>
            <td class="tb_cont">
              <input class="shorter addr" type="text" id="postcode" name="postcode" placeholder="우편번호" autofocus value="<?=$com_postcode?>">
              <input class="shorter addr" type="button" onclick="execDaumPostcode()" value="우편번호 찾기">
              <br>
              <input class="addr" type="text" id="address" name="address" placeholder="주소" value="<?=$com_address?>">
              <input class="addr" type="text" id="detailAddress" name="detailAddress" placeholder="상세주소" value="<?=$com_detailAddress?>">
              <br>
              <input type="text" id="extraAddress" name="extraAddress" placeholder="참고항목" value="<?=$com_extraAddress?>">

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
                      if (data.userSelectedType === 'R') {
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                          extraAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if (data.buildingName !== '' && data.apartment === 'Y') {
                          extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if (extraAddr !== '') {
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

                function check_email() {
                  window.open("./lib/check_email.php", "IDEmail", "left=200, top=200, width=700, height=550, scrollbars=no, resizable=no");
                }
              </script>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 업체 이메일</td>
            <td class="tb_cont btn_ch_email">
              <input type="text" id="confirmed_email1" name="confirmed_email1" value="<?=$com_email_f?>" placeholder="X버튼을 누른 뒤 인증하세요" readonly required />@
              <input type="text" id="confirmed_email2" name="confirmed_email2" value="<?=$com_email_b?>" ReadOnly required />
              <a name="check_button_anchor">
                <img name="check_button" id="check_button" src="./img/none_check_email.png" onclick="check_email()">
              </a>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 연 락 처</td>
            <td class="tb_cont"><input type="text" name="com_tel" placeholder="ex)-없이 입력" value="<?=$com_tel?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 사업자 번호</td>
            <td class="tb_cont"><input type="text" name="com_busi_num" placeholder="ex)117-81-85422" autofocus value="<?=$com_busi_num?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 통신판매업 신고번호</td>
            <td class="tb_cont"><input type="text" name="com_regist_num" placeholder="ex)2016-서울마포-0505호" value="<?=$com_regist_num?>"></td>
          </tr>
        </table>
        <hr class="title_hr"
        <div class="btn_center">
        <?php
        if ($mode=="update_com_info") {
        ?>
          <div class="btn_submit btn_3">
            <a href="./a_c_info_main.php" >취 소</a>
            <a href='delete_a_c_info.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>'>삭 제</a>
            <button type="submit" name="button">수 정</button>
          </div>
        <?php
        } else {
        ?>
          <div class="btn_submit btn_2">
            <a href="./a_c_info_main.php" >취 소</a>
            <button type="submit" name="button">등 록</button>
          </div>
        <?php
        }
        ?>
        </div>
      </form>
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
