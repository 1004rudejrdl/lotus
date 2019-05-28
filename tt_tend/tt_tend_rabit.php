<?php session_start(); ;
if (!empty($_SESSION['userid'])) {
   $id = $_SESSION['userid'];
}else {
   $id = "고객";
}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/tend.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <title>테스트결과</title>
  </head>
  <body>
    <div class="pop">
      <table>
        <tr>
          <td><?=$id?>님의 테스트결과입니다.</td>
        </tr>
        <tr>
          <td><b>토끼</b>을(를) 선택하셨군요</td>
        </tr>
        <tr>
          <td>
            토끼를 선택한 당신은 누구보다 이상적인 연애를 꿈꾸고 있습니다.&nbsp;
            어느 누구보다 좋은 애인이 되어야하고 편안하고 안정적인 관계를 원합니다.&nbsp;
            상대방의 행복은 곧 나의 행복이라는 헌신적인 사랑을 하길 원하는군요.&nbsp;
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
