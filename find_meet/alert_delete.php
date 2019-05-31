<?php
session_start();

$id=$_SESSION['userid'];


 ?>
 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <script type="text/javascript">
       function delete_id() {
         window.opener.location.href="../mb_login/delete_id.php?mode=delete";
          window.close();
       }
       function cancel() {
         window.close();
       }
     </script>
   </head>
   <body>
     <h2 style="color:rgb(217, 57, 57)">회원탈퇴 하시겠습니까?</h2>
     <h4>회원정보는 잔재하지 않으며, 삭제된 데이터를 복구할 수 없습니다.</h4>
     <img src="./img/user_delete.png" alt="" style="width:50px;height: 50px;position:align;"onclick="delete_id()">
     <img src="./img/cancel.png" alt="" style="position:align;width:50px;height: 50px;" onclick="cancel()">
   </body>
 </html>
