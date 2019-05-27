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
      <b id="testfont">고양이</b>을(를) 선택하셧군요 <br><br>
      고양이를 선택한 당신은 자신의 일에 간섭하는걸 굉장히 싫어하는 성향입니다.<br><br>

      ​
    연락문제든 일문제든 과도한 관심은 싫어하는 타입이며 서로의 사생활을 존중해주길 바라는 타입입니다.<br><br>


      그러나 기념일 같이 특별한 날엔 누구보다도 로맨틱한 시간을 보내길 좋아합니다.<br><br>


    </div>
    <form name="rabit_form" method="post">

    </form>
  </body>
</html>
