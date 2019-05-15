<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../login_css/login.css">
    <script type="text/javascript">

    </script>
  </head>
  <body>
    <div id="login_logo">
      //로그인 이미지 넣을거임
    </div>
    <div class="container">
    <form class="" action="index.html" method="post">
      <table class="login_table">
        <tr>
          <td><input type="text" name="username" placeholder="Username" required> </td>
          <td rowspan="2"><input type="submit" name="" value="로그인"> </td>
        </tr>
        <tr>
          <td><input type="password" name="password" placeholder="Password" required> </td>
        </tr>
      </table>

    </form>
  <form action="/action_page.php">
    <div class="row">
      <div class="vl">
        <!-- <span class="vl-innertext">or</span> -->
      </div>

      <div class="col">
        <a href="../sns_login_api/facebook_login.php" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
        </a>
        <a href="#" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="../sns_login_api\googlelogin.php" class="google btn">
          <i class="fa fa-google fa-fw"></i> Login with Google+
        </a>
      <a href="../sns_login_api/naverlogin.php" class="naver btn"><img class="naver_icon" src="../image/naver_login_icon_green.png" alt="">   Login with Naver </a>

      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>

    </div>
  </div>
</div>
  </form>
  </body>
</html>
