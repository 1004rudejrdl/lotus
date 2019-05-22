<!-- 권한 관리 메인 -->
<?php
  session_start();
  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
  $mode="insert_prd_shop";
  $com_type=
  $com_num=
  $shop_num=
  $shop_name=
  $shop_img=
  $shop_list_link=
  $shop_tel=
  $shop_postcode=
  $shop_address=
  $shop_detailAddress=
  $shop_extraAddress=
  $shop_notice="";
  if((isset($_GET['mode'])&&!empty($_GET['mode']))&&$_GET['mode']=="update_prd_shop"){
      if ((isset($_GET['com_type'])&&!empty($_GET['com_type']))&&
      (isset($_GET['com_num'])&&!empty($_GET['com_num']))&&
      (isset($_GET['shop_num'])&&!empty($_GET['shop_num']))) {
          $mode=test_input($_GET['mode']);
          $com_type=test_input($_GET['com_type']);
          $com_num=test_input($_GET['com_num']);
          $shop_num=test_input($_GET['shop_num']);

          $sql="SELECT * from `prd_shop` where `com_type` = '$com_type' and `com_num` = '$com_num' and `shop_num` = '$shop_num';";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
              die('Error: ' . mysqli_error($conn));
            }
            $row=mysqli_fetch_array($result);
            $com_type=$row['com_type'];
            $com_num=$row['com_num'];
            $shop_name=$row['shop_name'];
            $shop_img=$row['shop_img'];
            $shop_list_link=$row['shop_list_link'];
            $shop_tel=$row['shop_tel'];
            $shop_postcode=$row['shop_postcode'];
            $shop_address=$row['shop_address'];
            $shop_detailAddress=$row['shop_detailAddress'];
            $shop_extraAddress=$row['shop_extraAddress'];
            $shop_addr=$shop_postcode." ".$shop_address." ".$shop_detailAddress." ".$shop_extraAddress;
            $shop_notice=$row['shop_notice'];
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/a_shop_v_w_e_d.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
  <script type="text/javascript">
    function change_img_upload(pic) {
      fileNm = $(pic).val();
      if (fileNm != "") {
        var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
        if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
          alert("이미지파일 (.jpg, .png, .gif) 만 업로드 가능합니다.");
          $(pic).val("");
          return;
        }
      }
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#profile_image").attr("src", e.target.result);
      }
      reader.readAsDataURL(pic.files[0]);
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
        <?php if($mode=="update_prd_shop") {?>
          쇼핑몰 수정
        <?php }else{ ?>
          쇼핑몰 등록
        <?php } ?>
      </div>
      <hr class="title_hr">
      <?php if($mode=="update_prd_shop") {?>
      <form action="./update_a_shop.php" method="post" name="prd_shop_form">
      <?php }else{ ?>
      <form action="./insert_a_shop.php" method="post" name="prd_shop_form">
      <?php } ?>
        <input type="hidden" name="mode" value="<?=$mode?>">
        <input type="hidden" name="com_type" value="<?=$com_type?>">
        <input type="hidden" name="com_num" value="<?=$com_num?>">
        <input type="hidden" name="shop_num" value="<?=$shop_num?>">
        <table class="admin_table">
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 샵 이름</td>
            <td class="tb_cont"><input type="text" name="shop_name" placeholder="쇼핑몰 이름 입력" autofocus value="<?=$shop_name?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 샵 대표 이미지</td>
            <td class="tb_cont tb_thumb">
              <img id="profile_image">&nbsp;&nbsp;<input onchange="change_img_upload(this)" type="file" name="prd_shop_img"autofocus></td>
            </td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 샵 링크</td>
            <td class="tb_cont"><input type="text" name="shop_list_link" placeholder="대표상품 링크 입력" autofocus value="<?=$shop_list_link?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 샵 위치</td>
            <td class="tb_cont">
              <input class="shorter addr" type="text" id="postcode" name="postcode" placeholder="우편번호" autofocus value="<?=$shop_postcode?>">
              <input class="shorter addr" type="button" onclick="execDaumPostcode()" value="우편번호 찾기">
              <br>
              <input class="addr" type="text" id="address" name="address" placeholder="주소" value="<?=$shop_address?>">
              <input class="addr" type="text" id="detailAddress" name="detailAddress" placeholder="상세주소" value="<?=$shop_detailAddress?>">
              <br>
              <input type="text" id="extraAddress" name="extraAddress" placeholder="참고항목" value="<?=$shop_extraAddress?>">

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
            <td class="td_subjet"><span class="td_subjet_star">*</span> 문의번호</td>
            <td class="tb_cont"><input type="text" name="shop_tel" placeholder="ex)-없이 입력" value="<?=$shop_tel?>"></td>
          </tr>
          <tr>
            <td class="td_subjet"><span class="td_subjet_star">*</span> 유의사항</td>
            <td class="tb_cont">
              <textarea name="product_num" placeholder="공지/주의/유의 사항 기타"  autofocus rows="8"><?=$shop_notice?></textarea>
            </td>
          </tr>
        </table>
        <hr class="title_hr"
        <div class="btn_center">
        <?php
        if ($mode=="update_prd_shop") {
        ?>
          <div class="btn_submit btn_3">
            <a href="./a_shop_main.php" >취 소</a>
            <a href='delete_a_shop.php?com_type=<?=$com_type?>&com_num=<?=$com_num?>&shop_num=<?=$shop_num?>'>삭 제</a>
            <button type="submit" name="button">수 정</button>
          </div>
        <?php
        } else {
        ?>
          <div class="btn_submit btn_2">
            <a href="./a_shop_main.php" >취 소</a>
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
