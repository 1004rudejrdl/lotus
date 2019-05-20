<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="39643103539-t0uv6g7l80uea0pcao3snjrm4sqjufu0.apps.googleusercontent.com">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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
      <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
      <script>
        function onSignIn(googleUser) {
          // Useful data for your client-side scripts:
          var profile = googleUser.getBasicProfile();
          console.log("ID: " + profile.getId()); // Don't send this directly to your server!
          console.log('Full Name: ' + profile.getName());
          console.log('Given Name: ' + profile.getGivenName());
          console.log('Family Name: ' + profile.getFamilyName());
          console.log("Image URL: " + profile.getImageUrl());
          console.log("Email: " + profile.getEmail());

          // The ID token you need to pass to your backend:
          var id_token = googleUser.getAuthResponse().id_token;
          console.log("ID Token: " + id_token);
        }
      </script>
      <a href="../sns_login_api/naverlogin.php" class="naver btn"><img class="naver_icon" src="../image/naver_login_icon_green.png" alt="">   Login with Naver </a>
      <!-- 네이버아이디로로그인 버튼 노출 영역 -->
      <div id="naver_id_login"></div>
      <!-- //네이버아이디로로그인 버튼 노출 영역 -->
      <script type="text/javascript">
      	var naver_id_login = new naver_id_login("iYEgEAiSJyUpSuOMax8p", "http://localhost/lotus/mb_login/naver_callback.html");
      	var state = naver_id_login.getUniqState();
      	naver_id_login.setButton("white", 2,40);
      	naver_id_login.setDomain("http://localhost/lotus/index.php");
      	naver_id_login.setState(state);
      	naver_id_login.setPopup();
      	naver_id_login.init_naver_id_login();
      </script>
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
