
<?php
$_SESSION['naver_state']=md5(microtime().mt_rand());
function generate_state() {
    $mt = microtime();
    $rand = mt_rand();
    return 'https://nid.naver.com/oauth2.0/authorize?client_id='.$this->config->item('NAVER_CLIENT_ID').'&response_type=code&redirect_uri='.$this->config->item('NAVER_REDIRECT_URI').'&state='.$_SESSION['naver_state'];
}
//1회용 state값을 생성후 url 만들어 로그인버튼에 연결
//로그인후 redirect_uri로 넘어와서 처리
if(isset($_GET['code'])){
  if(!isset($_SESSION['navet_state'])||!isset($_GET['state'])||$_SESSION['navet_state']!=$_GET['state']){
    unset($_SESSION['naver_state']);
    return;
  }
  $response=file_get_contents('https://nid.navet.com/oauth2.0/token?client_id='.$this->config->item('NAVER_CLIENT_ID').'&client_secret='.$this->config->item('NAVER_CLIENT_SECRET').'&grant_type=authorization_code&state='.$_GET['state'].'&code='.$_GET['code']);
  unset($_SESSION['naver']);
  if(!$response)return;
  $_SESSION['naver_access_token']=json_decode($response,TRUE);
  $_SESSION['naver_access_token']['created']=time();
  $response=$this->get_naver_data('https://openapi.naver.com/v1/nid/me',array('Authorization:Bearer'.$_SESSION['naver_access_token']['access_token']));
  if(!$response)return;
  $response=json_decode($response,TRUE);
  if($response['resultcode']!='00'||$response['message']!='success')return;
  $this->naver_user=$response['response'];
  $nickname=$this->naver_user['nickname'];
}
  if(isset($_SESSION['naver_access_token'])){
    if($_SESSION['naver_access_token']['created']+$_SESSION['naver_access_token']['expires_in']-30<time()){
      $response=file_get_contents('https://nid.naver.com/oauth2.0/token?grant_type=refresh_token&client_id='.$this->config->item('NAVER_CLIENT_ID').'&client_secret='.$this->config->item('NAVER_CLIENT_SECRET').'&refresh_token='.$_SESSION['naver_access_token']['refresh_token']);
      if(!$response)return;
      $response=json_decode($response,TRUE);
      $_SESSION['naver_access_token']=array_merge($_SESSION['naver_access_token'],$response);
    }
  }
 ?>
