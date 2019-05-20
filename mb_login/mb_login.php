
<?php
  session_start();
  // include $_SERVER['DOCUMENT_ROOT']."/ansisung/lib/session_call.php"; 로그인 인증이 필요한곳
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_con.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";
  // include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/func_main.php";
  // include __DIR__."/../lib/create_table.php"; 자기 폴더 까지 찍으므로 상대경로의 문제점을 고치지는 못함
?>
<!DOCTYPE html>
<html>

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/common.css">
  <!-- <link rel="stylesheet" href="../css/join.css"> -->
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <!-- <script type="text/javascript" src="../js/sign_update_check_html.js?ver=1" ></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <!-- <script type="text/javascript" src="../js/sign_update_check_ajax_main.js?ver=1"></script> -->
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="#about">추천/예약</a>
  <a href="#services">맛집</a>
  <a href="#clients">숙박</a>
  <a href="#contact">렌트카</a>
</div><!-- sidenav end -->
<div class="main">
  <div id="login_logo">
    //로그인 이미지 넣을거임
  </div>
  <div class="container">
  <form class="" action="./check_login.php?mode=login" method="post">
    <table class="login_table">
      <tr>
        <td><input type="text" name="id" placeholder="Username" required> </td>
        <td rowspan="2"><input type="submit" name="" value="로그인"> </td>
      </tr>
      <tr>
        <td><input type="password" name="password" placeholder="Password" required> </td>
      </tr>
    </table>
    <a href="./mb_join_form.php">회원이 아니시라면 가입하세요!</a>
  </form>
<form action="/action_page.php">
  <div class="row">
    <div class="vl">
      <!-- <span class="vl-innertext">or</span> -->
    </div>

    <div class="col">
      <div id="fb-login-button"class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="true"></div>
      <script type="text/javascript">
      </script>
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
        document.getElementById('g_id').val(profile.getId());
        var name=profile.getGivenName+profile.getGivenName;
        document.getElementById('g_name').val(name);
        document.getElementById('g_pic').val(profile.getImageUrl());
        document.getElementById('g_email').val(profile.getEmail());
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
   document.getElementById('fb_id').val(js.id);
 }
 (document, 'script', 'facebook-jssdk')
);
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v3.3&appId=435335760594195&autoLogAppEvents=1"></script>

<div
class="fb-like"
data-share="true"
data-width="450"
data-show-faces="true">
</div>
<form id="sns_login_form" action="./check_login.php?mode=kakao" method="post">
  <input type="hidden" id="k_id" name="k_id" value="">
  <input type="hidden" id="k_email" name="k_email" value="">
  <input type="hidden" id="k_name" name="k_name" value="">
  <input type="hidden" id="k_pic" name="k_pic" value="">
  <input type="hidden" id="k_birth" name="k_birth" value="">
  <input type="hidden" id="k_gender" name="k_gender" value="">
</form>
<form class="" action="./check_login.php?mode=naver" method="post">
  <input type="hidden" id="n_id" name="n_id" value="">
  <input type="hidden" id="n_email" name="n_email" value="">
  <input type="hidden" id="n_birth" name="n_birth" value="">
  <input type="hidden" id="n_gender" name="n_gender" value="">
  <input type="hidden" id="n_name" name="n_name" value="">
  <input type="hidden" id="n_pic" name="n_pic" value="">
</form>
<form class="" action="./check_login.php?mode=fb" method="post">
  <input type="hidden" id="fb_id" name="fb_id" value="">
</form>
<form class="" action="./check_login.php?mode=google" method="post">
  <input type="hidden" id="g_id" name="g_id" value="">
  <input type="hidden" id="g_name" name="g_name" value="">
  <input type="hidden" id="g_pic" name="g_pic" value="">
  <input type="hidden" id="g_email" name="g_email" value="">
</form>
<form class="" action="index.html" method="post">

</form>

  <input type="hidden" id="n_email" name="n_email" value="">
  <input type="hidden" id="n_gender" name="n_gender" value="">
  <input type="hidden" id="n_id" name="n_id" value="">
  <input type="hidden" id="n_name" name="n_name" value="">
  <input type="hidden" id="n_profile_image" name="n_profile_image" value="">
  <input type="hidden" id="n_birth" name="n_birth" value="">
</div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>

</html>
