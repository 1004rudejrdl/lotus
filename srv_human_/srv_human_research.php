<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
if (isset($_SESSION['userid'])) {
  $user_id=$_SESSION['userid'];
  $sql = "SELECT id from member_type_survey";
  $result = mysqli_query($conn,$sql);
  if (!$result) {
    die('Error: ' . mysqli_error($conn));
  }
  $total = mysqli_num_rows($result);
  for ($i=0; $i < $total; $i++) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    if ($user_id==$id) {
      ?>
      <!-- <script type="text/javascript">
        alert("이미 설문 조사를 참여 하셨습니다.");
        location.href='./srv_human_result.php';
      </script> -->
      <?php
      break;
    }
  }
}else{
  ?>
  <!-- <script type="text/javascript">
    alert("로그인 후 이용해 주세요");
    history.go(-1);
  </script> -->


  <?php
}
 ?>
 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/common.css">
     <link rel="stylesheet" href="../css/header_sidenav.css">
     <link rel="stylesheet" href="./css/srv_human_research.css">
       <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
       <script type="text/javascript">
         function chk(){
           var Form = eval(document.research_form);
             var chk = 0;
             if(Form.composer1[0].checked == true) chk++;
             if(Form.composer1[1].checked == true) chk++;
             if(Form.composer1[2].checked == true) chk++;
             if(Form.composer1[3].checked == true) chk++;
             if(Form.composer1[4].checked == true) chk++;

             if(Form.composer2[0].checked == true) chk++;
             if(Form.composer2[1].checked == true) chk++;
             if(Form.composer2[2].checked == true) chk++;
             if(Form.composer2[3].checked == true) chk++;
             if(Form.composer2[4].checked == true) chk++;

             if(Form.composer3[0].checked == true) chk++;
             if(Form.composer3[1].checked == true) chk++;
             if(Form.composer3[2].checked == true) chk++;
             if(Form.composer3[3].checked == true) chk++;
             if(Form.composer3[4].checked == true) chk++;

             if(Form.composer4[0].checked == true) chk++;
             if(Form.composer4[1].checked == true) chk++;
             if(Form.composer4[2].checked == true) chk++;
             if(Form.composer4[3].checked == true) chk++;
             if(Form.composer4[4].checked == true) chk++;

             if(Form.composer5[0].checked == true) chk++;
             if(Form.composer5[1].checked == true) chk++;
             if(Form.composer5[2].checked == true) chk++;
             if(Form.composer5[3].checked == true) chk++;
             if(Form.composer5[4].checked == true) chk++;
             if(chk == 0) {
                     alert('선택해주세요. ^^');
                     return false;

             }
             //console.log(document.getElementsTagName('input')[0].value);
             // Form.action = 'srv_human_dml_board.php';
            document.research_form.submit();
            alert("설문조사에 응해주셔서 감사합니다.");

         }
       </script>
     <title>이상형 설문조사</title>
   </head>
   <body>
     <script src="./srv_human_form.js"> </script>
     <!-- header start -->
     <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
     <!-- header end -->
     <!-- main_body start -->
     <div id="main_body" class="main_body">
       <div id="sidenav" class="sidenav">
         <a href="#">연애, 꽃피우다</a>
         <a href="#">이성찾기</a>
         <a href="#">쇼핑몰</a>
         <a href="#">테스트</a>
         <a href="#">커뮤니티</a>
       </div><!-- sidenav end -->

       <div class="main">
         <div class="admin_title">
           이상형 설문조사
         </div>
         <hr class="title_hr">
     <form name="research_form" action="srv_human_dml_board1.php" method="post">
       <table class="admin_table mb_bottom" border="0">
         <input type="hidden" name="percent" value="">
         <tr>
           <td colspan="2"><h2>설문조사</h2></td>
         </tr>
         <tr>
           <td class="td_subjet">선호하는 이성의 키</td>
         </tr>
         <tr>
           <td class="tb_cont">
             <label class="g_container">150이하&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer1" value="1">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">151~160&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer1" value="2">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">161~165&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer1" value="3">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">166~170&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer1" value="4">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">170이상&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer1" value="5">
               <span class="g_checkmark"></span>
             </label>
           </td>
         </tr>
         <tr>
           <td class="td_subjet">선호하는 직업군</td>
         </tr>
         <tr>
           <td class="tb_cont">
             <label class="g_container">서비스직&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer2" value="1">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">금융권&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer2" value="2">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">교사/공무원&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer2" value="3">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">자영업/사업&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer2" value="4">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">기타&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer2" value="5">
               <span class="g_checkmark"></span>
             </label>
         </td>
         </tr>
         <tr>
           <td class="td_subjet">선호하는 이성의 연봉</td>
         </tr>
         <tr>
           <td class="tb_cont">
             <label class="g_container">2500이하&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer3" value="1">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">2500~3500&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer3" value="2">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">3500~4000&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer3" value="3">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">4000~5000&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer3" value="4">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">5000&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer3" value="5">
               <span class="g_checkmark"></span>
             </label>
             </td>
         </tr>
         <tr>
           <td class="td_subjet">선호하는 이성의 연애성향</td>
         </tr>
         <tr>
           <td class="tb_cont">
             <label class="g_container">장난기많은 친구같은 사이&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer4" value="1">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">기댈 수 있는 듬직함&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer4" value="2">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">배울게 많은 사람&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer4" value="3">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">무심한듯 잘챙겨주는 스타일&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer4" value="4">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">기타&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer4" value="5">
               <span class="g_checkmark"></span>
             </label>
             </td>
         </tr>
         <tr>
           <td class="td_subjet">첫만남 시 선호하는 장소</td>
         </tr>
         <tr>
           <td class="tb_cont">
             <label class="g_container">카페&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer5" value="1">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">술집&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer5" value="2">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">공원&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer5" value="3">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">영화관&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer5" value="4">
               <span class="g_checkmark"></span>
             </label>
             <label class="g_container">기타&nbsp;&nbsp;&nbsp;
               <input type="radio" name="composer5" value="5">
               <span class="g_checkmark"></span>
             </label>
         </td>
         </tr>
       </table>
       <input type="hidden" name="qwer" value="qwer">
     </form>
       <hr class="title_hr">
       <div class="btn_center">
         <div class="btn_submit btn_3">
           <button type="button" name="button" onclick="chk()">확인</button>
           <button type="button" name="button">닫기</button>
           <a href="./srv_human_result.php">결과보기</a>
         </div>
       </div>
   </div> <!-- main end -->
 </div> <!-- main_body end -->
 <!-- footer start -->
 <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
 <!-- footer_bg end -->
 <!-- <script src="../js/admin_effect_common.js"></script> -->
 <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
