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
      <script type="text/javascript">
        alert("이미 설문 조사를 참여 하셨습니다.");
        location.href='./srv_human_result.php';
      </script>
      <?php
      break;
    }
  }
}else{
  ?>
  <script type="text/javascript">
    alert("로그인 후 이용해 주세요");
    history.go(-1);
  </script>


  <?php
}
 ?>
 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta charset="utf-8">
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

     <form name="research_form" action="srv_human_dml_board1.php" method="post">
       <table class="table1" border="0">
         <input type="hidden" name="percent" value="">
         <tr>
           <td>설문조사</td>
         </tr>
         <tr>
           <td class="tdk1">선호하는 이성의 키</td>
           <td><input type="radio" name="composer1" value="1">150이하</td>
           <td><input type="radio" name="composer1" value="2">151~160</td>
           <td><input type="radio" name="composer1" value="3">161~165</td>
           <td><input type="radio" name="composer1" value="4">166~170</td>
           <td><input type="radio" name="composer1" value="5">170이상</td>
         </tr>
         <tr></tr><td></td>
         <tr>
           <td class="tdk2">선호하는 직업군</td>
           <td><input type="radio" name="composer2" value="1">서비스직</td>
           <td><input type="radio" name="composer2" value="2">금융권</td>
           <td><input type="radio" name="composer2" value="3">교사/공무원</td>
           <td><input type="radio" name="composer2" value="4">자영업/사업</td>
           <td><input type="radio" name="composer2" value="5">기타</td>
         </tr>
         <tr></tr><td></td>
         <tr>
           <td class="tdk2">선호하는 이성의 연봉</td>
           <td><input type="radio" name="composer3" value="1">2500이하</td>
           <td><input type="radio" name="composer3" value="2">2500~3500</td>
           <td><input type="radio" name="composer3" value="3">3500~4000</td>
           <td><input type="radio" name="composer3" value="4">4000~5000</td>
           <td><input type="radio" name="composer3" value="5">5000이상</td>
         </tr>
         <tr></tr><td></td>
         <tr>
           <td class="tdk2">선호하는 이성의 연애성향</td>
           <td><input type="radio" name="composer4" value="1">장난기많은 친구같은 사이</td>
           <td><input type="radio" name="composer4" value="2">기댈 수 있는 듬직함</td>
           <td><input type="radio" name="composer4" value="3">배울게 많은 사람</td>
           <td><input type="radio" name="composer4" value="4">무심한듯 잘챙겨주는 스타일</td>
           <td><input type="radio" name="composer4" value="5">기타</td>
         </tr>
         <tr></tr><td></td>
         <tr>
           <td class="tdk2">첫만남 시 선호하는 장소</td>
           <td><input type="radio" name="composer5" value="1">카페</td>
           <td><input type="radio" name="composer5" value="2">술집</td>
           <td><input type="radio" name="composer5" value="3">공원</td>
           <td><input type="radio" name="composer5" value="4">영화관</td>
           <td><input type="radio" name="composer5" value="5">기타</td>
         </tr>
       </table>
       <input type="hidden" name="qwer" value="qwer">

       <button type="button" name="button" onclick="chk()">확인</button>
       <button type="button" name="button">닫기</button>
       <a href="./srv_human_result.php"><button type="button">결과보기</button></a>
     </form>
   </body>
 </html>
