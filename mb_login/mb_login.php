<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="39643103539-t0uv6g7l80uea0pcao3snjrm4sqjufu0.apps.googleusercontent.com">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/header_sidenav.css">
  <link rel="stylesheet" href="./css/login.css">
  <script type="text/javascript" src="https://static.nid.naver.com/js/naverLogin_implicit-1.0.3.js" charset="utf-8"></script>
  <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>
<body>
<!-- header start -->
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
<!-- header end -->
<!-- main_body start -->
<div class="main_body">
<div id="sidenav" class="sidenav">
  <a href="#">연애, 꽃피우다</a>
  <a href="#">이성찾기</a>
  <a href="#">쇼핑몰</a>
  <a href="#">테스트</a>
  <a href="#">커뮤니티</a>
</div><!-- sidenav end -->
<div class="main">
  <div class="logo_login">
    <div class="ll_login">
      <form class="" action="./check_login.php?mode=login" method="post">
        <table class="login_table">
          <tr>
            <td><input type="text" name="id" placeholder="Username" required> </td>
            <td rowspan="2"><input type="submit" name="" value="로그인"> </td>
          </tr>
          <tr>
            <td><input type="password" name="password" placeholder="Password" required> </td>
          </tr>
          <tr>
            <td><a href="./mb_join_form.php">회원이 아니시라면 가입하세요!</a></td>
          </tr>
        </table>
      </form>
    </div>
  </div><!-- logo_login end -->
  <div class="sns_login">
      <!-- 페북 -->
      <a href="javascript:void(0);" onclick="fbLoginAction();" class="fb btn">
        <i class="fa fa-facebook fa-fw"></i> Facebook
      </a>
      <form id="fb_login_form" action="./check_login.php?mode=fb" method="post">
        <input type="hidden" id="fb_id" name="fb_id" value="">
      </form>
      <script>
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id))
         return;
         js = d.createElement(s);
         js.id = id;
         js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.8&appId=435335760594195";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
         window.fbAsyncInit=function(){
           FB.init({
             appId:'{435335760594195}',
             cookie:true,
             xfbml:true,
             version:'v2.8'
           });
           FB.getLoginStatus(function(response){
             console.log('statusChangeCallback');
             console.log(response);
             if(response.status==='connected'){
               $("#result").append("status:connected");
             }else{
               $("#result").append(response);
             }
           });
         };
         function fbLoginAction(){
           FB.login(function(response){
             var fbname;
             var accessToken=response.authResponse.accessToken;
             FB.api('/me?fields=id,name,age_range,birthday,gender,email',function(response){
               var fb_data=jQuery.parseJSON(JSON.stringify(response));
               var data="<br>fb_id:"+fb_data.id;
               data +="<br>email:"+fb_data.email;
               data +="<br>name:"+fb_data.name;
               location.href="./check_login.php?mode=facebook&id="+fb_data.id+"&email="+fb_data.email+"&name="+fb_data.name;
             });
           },{scope:'public_profile,email'});
         }
      </script>
      <!-- 구글 -->
      <div class="g-signin2 google" data-onsuccess="onSignIn" data-theme="dark" ></div>
      <form id="google_login_form" action="./check_login.php?mode=google" method="post">
        <input type="hidden" id="g_id" name="g_id" value="">
        <input type="hidden" id="g_name" name="g_name" value="">
        <input type="hidden" id="g_pic" name="g_pic" value="">
        <input type="hidden" id="g_email" name="g_email" value="">
      </form>
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
        var id=profile.getId();
        var email=profile.getEmail();
        var name=profile.getFamilyName()+profile.getGivenName();
        // document.getElementById('g_id').value=profile.getId().value;
        // document.getElementById('g_name').value=name;
        // document.getElementById('g_pic').value=profile.getImageUrl().value;
        // document.getElementById('g_email').value=profile.getEmail().value;
        location.href="./check_login.php?mode=google&id="+id+"&name="+name+"&email="+email;
      }
    </script>
    <!-- 네이버 -->
    <div id="naver_id_login"></div>
    <form id="naver_login_form" action="./check_login.php?mode=naver" method="post">
      <input type="hidden" id="n_id" name="n_id" value="">
      <input type="hidden" id="n_email" name="n_email" value="">
      <input type="hidden" id="n_birth" name="n_birth" value="">
      <input type="hidden" id="n_gender" name="n_gender" value="">
      <input type="hidden" id="n_name" name="n_name" value="">
      <input type="hidden" id="n_pic" name="n_pic" value="">
    </form>
    <script type="text/javascript">
      var naver_id_login = new naver_id_login("iYEgEAiSJyUpSuOMax8p", "http://localhost/lotus/mb_login/naver_callback.html");
      var state = naver_id_login.getUniqState();
      naver_id_login.setButton("white", 2.5,58.5);
      naver_id_login.setDomain("http://localhost/lotus/index.php");
      naver_id_login.setState(state);
      naver_id_login.setPopup();
      naver_id_login.init_naver_id_login();
    </script>

    <a href="javascript:loginWithKakao()" id="kakao-login-btn"></a>
    <form id="kakao_login_form" action="./check_login.php?mode=kakao" method="post">
      <input type="hidden" id="k_id" name="k_id" value="">
      <input type="hidden" id="k_email" name="k_email" value="">
      <input type="hidden" id="k_name" name="k_name" value="">
      <input type="hidden" id="k_pic" name="k_pic" value="">
      <input type="hidden" id="k_birth" name="k_birth" value="">
      <input type="hidden" id="k_gender" name="k_gender" value="">
    </form>
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
                     var id=res.id;
                     console.log(JSON.stringify(res.kakao_account['email']));
                     var email=res.kakao_account['email'];
                     console.log(JSON.stringify(res.properties.nickname));
                     console.log(JSON.stringify(res.properties.profile_image));
                     console.log(JSON.stringify(res.kakao_account['birthday']));
                     var birth=res.kakao_account['birthday'];
                     console.log(JSON.stringify(res.kakao_account['gender']));
                     var gender=res.kakao_account['gender'];
                     location.href="./check_login.php?mode=kakao&id="+id+"&email="+email+"&gender="+gender+"&birth="+birth;
                     window.close();
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
  </div>  <!-- sns_login end -->
  <div class="ll_logo">
    <img src="../main_img/lotus_logo_text_black.png" alt="">
  </div>
</div>  <!-- main end -->
</div>  <!-- main_body end -->
<!-- footer start -->
<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
<!-- footer_bg end -->
</body>


</html>
