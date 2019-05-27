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
      <b id="testfont">파란색</b>을 선택하셧군요 <br><br>
      내성적이고 심사숙고하고 걱정도 많은 당신은 그만큼 굽힘없고 독선적인 면도 있습니다.<br><br>

      ​
    한번 빠지면 정신을 못차리기 때문에 상대방의 행동에 상관없이 반했다가 배신을 당할 수도 있습니다.<br><br>


      물질보다 정신적인 면을 좋아하지만 그건 곧 외모에 신경을 많이 쓴다는 반증입니다.<br><br>

      ​
    때문에 남자의 경우 스타일이 뛰어난 여성을 좋아하며,<br><br>
     여성의 경우 취미와 생각이 같은 남자를 좋아합니다.
    </div>
    <form name="pink_form" method="post">

    </form>
  </body>
</html>
