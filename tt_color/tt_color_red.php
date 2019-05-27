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
    <link rel="stylesheet" href="./css/color.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <title>테스트결과</title>
  </head>
  <body style="width:300px;">
    <div class="top">
      <h2><?=$id?>님의 테스트결과입니다.</h2>
      <b id="testfont">빨강색</b>을 선택하셧군요 <br><br>
      빨간색이 열정을 의미하는 만큼 당신은<br> 사교적이며, 생각하기 보다는 행동하기를 좋아합니다.
      <br><br>      ​
      남의 눈에 띄기를 좋아하는 당신은 매사 긍정적이지만 심리의 변화가 커
      충동적인 평형실조를 보이기에 소심한 사람은 이를 받아들이지 못할 수 있습니다.

      ​
      <br><br>애정에 방해가 되는 일이 있어도 도전하여 돌파하며<br><br>
      남자의 경우, 감수성이 강한 여성에게 끌리고<br><br>
      여자의 경우, 사랑에 있어서는 평온함과 남자의 성실성을 높게 따집니다.
    </div>
    <form name="pink_form" method="post">

    </form>
  </body>
</html>
