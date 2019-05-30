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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/color.css">
    <title>테스트결과</title>
  </head>
  <body>
    <div class="pop">
      <table>
        <tr>
          <td><?=$id?>님의 테스트결과입니다.</td>
        </tr>
        <tr>
          <td><b>노란색</b>을 선택하셨군요</td>
        </tr>
        <tr>
          <td>
            모험심과 성취감을 좋아하는 당신 아무리 큰 역경이 있어도 끝까지 해내는 당신,&nbsp;
            사랑에 있어서도 한번 사랑은 영원한 사랑. 헌신적인 사랑이 당신의 타입입니다.&nbsp;
            그런 당신을 받아 줄 수 있는 이성을 골라야 하기 때문에,&nbsp;
            남자의 경우 사교적이고 대인관계가 넓은 언변이 좋은 여자를,&nbsp;
            여자의 경우 믿을 수 있는 듬직한 남자를 좋아합니다.
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
