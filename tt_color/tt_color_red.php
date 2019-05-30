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
          <td><b>빨간색</b>을 선택하셨군요</td>
        </tr>
        <tr>
          <td>
            빨간색이 열정을 의미하는 만큼 당신은 사교적이며,
            생각하기 보다는 행동하기를 좋아합니다. 남의 눈에 띄기를 좋아하는 당신은&nbsp;
            매사 긍정적이지만 심리의 변화가 커 충동적인 평형실조를 보이기에&nbsp;
            소심한 사람은 이를 받아들이지 못할 수 있습니다.&nbsp;
            애정에 방해가 되는 일이 있어도 도전하여 돌파하며&nbsp;
            남자의 경우 감수성이 강한 여성에게 끌리고&nbsp;
            여자의 경우 사랑에 있어서는 평온함과 남자의 성실성을 높게 따집니다.
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
