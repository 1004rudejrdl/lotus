<?php
  //$_FILES 로 부터 5가지 배열명을 가져와서 저장한다

$upfile = $_FILES['upfile'];//파일 업로드 정보 (5가지배열)
$upfile_name = $upfile['name'];//f03.jpg
$upfile_type = $upfile['type'];//image/gif  file/txt
$upfile_tmp_name = $upfile['tmp_name'];
$upfile_error = $upfile['error'];
$upfile_size = $upfile['size'];

//파일명과 확장자를 구분해서 저장한다.
$file = explode(".", $upfile_name); //파일명과 확장자 구분에서
$file_name = $file[0];              //파일명
$file_extension = $file[1];         //확장자

//업로드 될 폴더를 지정한다
$upload_dir = "./data/";  //임의의 업로드된 파일을 저장하는 장소 지정
//파일 업로드가 성공 되었는지 점검한다.
//이름이 중복되지 않도록 임의의 파일 명을 지정한다

if (!$upfile_error) {
  $new_file_name = date("Y_m_d_H_i_s");
  $new_file_name.="_"."0";
  $copied_file_name=$new_file_name.".".$file_extension;
  $upload_file = $upload_dir.$copied_file_name;
  // $new_file_name = date("2019_04_22_15_19_30");
  // $new_file_name.=2019_04_22_15_19_30_0;
  // $copied_file_name=2019_04_22_15_19_30_0.jpg;
  // $upload_file = ./data/2019_04_22_15_19_30_0.jpg;
}
//업로드된 파일 사이즈를 체크해서 넘어버리면 돌려보낸다

// var_dump($upfile);
//파일이름 타입(확장자) 템프네임(서버가 임시로 받아놓는 위치) 에러검출 파일크기

//5업로드된 파일 확장자를 체크한다.

$type = explode("/", $upfile_type);


if ($type[0]=='image') {
  switch ($type[1]) {
    case 'gif':        case 'jpg':        case 'png':
      case 'jpeg':       case 'pjpeg':      break;

      default:
      alert_back('3. gif,jpg,png,jpeg,pjpeg 중 확장자가 아닙니다.');
      break;
    }
    if ($upfile_size>2000000) {
      alert_back('2. 이미지파일 사이즈가 2MB이상입니다.');
    }
}else {
  if ($upfile_size>500000) {
    alert_back('2. 파일 사이즈가 500KB이상입니다.');
  }

}
//임시 저장소에 있는 파일을 서버에 지정한 위치로 이동한다.
if (!move_uploaded_file($upfile_tmp_name, $upload_file)) {
  alert_back('444. 서버 전송 에러');
}

 ?>
