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
          <td><b>분홍색</b>을 선택하셨군요</td>
        </tr>
        <tr>
          <td>
            잔정이 많은 박애주의자이며, 사랑에 있어선 필요이상으로&nbsp;
            헤프고 헌신적이어서 복잡한 관계에 얽히기 십상입니다.&nbsp;
            그러나 걱정마세요! 당신은 겉보기완 다르게 계산적인 사랑의 고수이기 때문에&nbsp;
            이성을 차버리고 쉽게 살아남습니다.&nbsp;
            남성의 경우, 모성을 느낄 수 있는 이해심 많은 여성을,&nbsp;
            여성의 경우, 아버지와 같이 안아 줄 수 있는 따뜻한 사람이 어울리겠네요.
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
