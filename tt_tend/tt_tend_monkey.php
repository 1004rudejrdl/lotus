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
          <td><b>원숭이</b>을(를) 선택하셨군요</td>
        </tr>
        <tr>
          <td>
            원숭이를 선택한 당신은 연애를 하면서도 혼자만의 시간을 필요로하는 사람입니다.&nbsp;
            상대에게 구속받는걸 싫어하며 연애를 하면서도 자신만의 시간이 꼭 있어야 하기에&nbsp;
            오해를 받기 십상이겠으나 두 시간만큼은 누구보다 최선을 다하는 당신이기에&nbsp;
            같은 성향의 사람을 만나면 굉장히 좋은 결과를 만들어낼거같네요!
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
