<?php

//1. $_FILES['upfile'] 1개의 파일업로드 정보가 들어있음. 총5가지 정보가 배열로들어있음 위에설명
$upfile = $_FILES['upfile']; //파일은 POST방식으로 받으면안되고 파일로받아야된다. 엔코드타입으로 해야된다. 폼에
//업파일된 네임,타입,템프,에러,사이즈
$upfile_name = $_FILES['upfile']['name']; // 원본이름
$upfile_type = $_FILES['upfile']['type']; // 확장자
$upfile_tmp_name = $_FILES['upfile']['tmp_name']; //이미 임시파일로 저장되어있다. 그이름이 템프이다.
$upfile_error = $_FILES['upfile']['error'];//잘됬는지 안됬는지 에러
$upfile_size = $_FILES['upfile']['size']; // 파일크기



//2. 파일명과 확장자 구분해서(explode) 저장한다.
$file = explode(".", $upfile_name); //https://www.w3schools.com/php/showphp.asp?filename=demo_func_string_explode
$file_name = $file[0];        //파일명
$file_extension = $file[1];   //확장자

//3. 업로드될 폴더를 지정한다.
$upload_dir = "./data/"; //업로드된 파일을 저장하는 장소
// mkdir($upload_dir);  업로드 dir 을만듬 . 위에방법은 강제로 만듬 data라는 폴더를

//4. 파일업로드가 성공되었는지 점검한다. 성공했으면 : 0 , 실패면 : 1
//파일명이 중복되지 않도록 임의파일명을 정한다. (날짜로 정함). $new_file_name = date("Y_m_d_H_i_s");
if (!$upfile_error) { //아래 예시
  $new_file_name = date("Y_m_d_H_i_s");  //대소문자 다름 (양식이 다 틀림) https://www.w3schools.com/php7/php7_date_time.asp
  $new_file_name = $new_file_name."_"."0"; //순서가 동시에들어오기때문에 0으로 지정함.
  $copied_file_name = $new_file_name.".".$file_extension;
  $upload_file = $upload_dir.$copied_file_name;

  // $new_file = "2019_04_22_15_09_30 파일명";
  // $new_file_name = "2019_04_22_15_09_30_0";
  // $copied_file_name = "2019_04_22_15_09_30_0.jpg"
  // $upload_file = "./data/2019_04_22_15_09_30_0.jpg"
}

//5. 업로드된 파일사이즈(phpini에서 조절 : 2mb되어있음)를 체크해서 넘어버리면 돌려보낸다.
if ($upfile_size>2000000) { //byte로 표현해야됨. 500kb까지니깐
  alert_back("파일사이즈가 2MB이상입니다.");
}

//6. 업로드된 파일 확장자를 체크한다. "image/gif" 첫번째는 이미지가들어있고 두번째는 확장자가 들어있다.
  $type = explode("/",$upfile_type);
  switch ($type[1]) {
    case 'gif':
    case 'jpeg':
    case 'png':
    case 'jpg':
    case 'pjpeg':break;
    default: alert_back("gif,jpeg,png 확장자가 아닙니다.");
  }

  //잘되었는지 안되었는지 하는 명령어
  //7. 임시저장소에 있는 파일을 서버에 지정한 위치로 이동한다.
  if (!move_uploaded_file($upfile_tmp_name, $upload_file)) {
    alert_back("서버 전송에러!!");
  }


















 ?>
