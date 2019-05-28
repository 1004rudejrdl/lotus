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
          <td><b>곰</b>을(를) 선택하셨군요</td>
        </tr>
        <tr>
          <td>
            곰을 선택한 당신은 꾸밈보단 편안한 사랑을 원합니다.&nbsp;
            어디에 있어도 서로에게 편안한 감정을 느끼길 원하는 당신은&nbsp;
            특별한 데이트보단 편안한 옷차림에 맥주 한 캔을 먹으며 얘기를 나누는 그런 연애를 원합니다.&nbsp;
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
