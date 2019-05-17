<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type="text/javascript"></script>
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
        <div id="fb-login-button"class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="true"></div>
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
      <a href="javascript:loginWithKakao()" id="kakao-login-btn"></a>
      <script type='text/javascript'>
        //<![CDATA[
          // 사용할 앱의 JavaScript 키를 설정해 주세요.
          Kakao.init('b6eb0975208a93028ab8c11c89b6ed2e');
          // 카카오 로그인 버튼을 생성합니다.
            Kakao.Auth.createLoginButton({
              container: '#kakao-login-btn'
            });
          function loginWithKakao() {
            Kakao.Auth.loginForm({
               success: function(authObj) {
               Kakao.API.request({
                  url: '/v2/user/me',
                  success: function(res) {
                      alert(JSON.stringify(res));
                       console.log(JSON.stringify(res.id));
                       var kid=JSON.stringify(res.id);
                       console.log(JSON.stringify(res.kakao_account['email']));
                       var kemail=JSON.stringify(res.kakao_account['email']);
                       console.log(JSON.stringify(res.properties.nickname));
                       var knick=JSON.stringify(res.properties.nickname);
                       console.log(JSON.stringify(res.properties.profile_image));
                       var kprofile_image=JSON.stringify(res.properties.profile_image);
                       console.log(JSON.stringify(res.kakao_account['birthday']));
                       var kbirthday=JSON.stringify(res.kakao_account['birthday']);
                       console.log(JSON.stringify(res.kakao_account['gender']));
                       var kgender=JSON.stringify(res.kakao_account['gender']);
                        //document.
                         //document.member_form.submit();
                  },
                  fail: function(error) {
                    alert(JSON.stringify(error))
                  }
                });
                },
             fail: function(err) {

             }
            });
          };

        //]]>
      </script>
      </div>

      <div class="col">

  </div>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '435335760594195',
      xfbml      : true,
      version    : 'v3.3'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
     console.log(js.id);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v3.3&appId=435335760594195&autoLogAppEvents=1"></script>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
</div>
  </form>

  </body>
</html>
