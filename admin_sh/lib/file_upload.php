<?php
// 1. 업로드된 파일의 정보를 가져온다.
$copied_file_name=$type=$upload_file="";
$upfile = $_FILES['shop_img'];//한개파일업로드정보(5가지정보배열로들어있음)
$upfile_name= $upfile['name'];//f03.jpg
$upfile_type=$upfile['type'];
$upfile_tmp_name=$upfile['tmp_name'];
$upfile_error= $upfile['error'];
$upfile_size= $upfile['size'];

// $upfile_name[$i] = $_FILES['upfile']['name'][$i];
// $upfile_type[$i] = $_FILES['upfile']['type'][$i];
// $upfile_tmp_name[$i] = $_FILES['upfile']['tmp_name'][$i];
// $upfile_error[$i] = $_FILES['upfile']['error'][$i];
// $upfile_size[$i] = $_FILES['upfile']['size'][$i];
// $upfile = array(5) {
//   ["name"]=> string(17) "ansisung3 (2).zip"
//   ["type"]=> string(28) "application/x-zip-compressed"
//   ["tmp_name"]=> string(27) "C:\Windows\Temp\php10F8.tmp"
//   ["error"]=> int(0)
//   ["size"]=> int(1827713)
// } //files의 배열 형식. 정보를 준다.
// exit; 테스트용 exit
// php ini 설정
// ; Maximum allowed size for uploaded files.
// ; http://php.net/upload-max-filesize
// upload_max_filesize = 2M
//
// ; Maximum number of files that can be uploaded via a single request
// max_file_uploads = 20

//2. 파일명과 확장자를 구분해서 저장한다.
if (!$upfile_name=="") {
$file = explode(".", $upfile_name); //파일명과 확장자구분에서 배열저장
$file_name = $file[0];              //파일명
$file_extension = $file[1];         //확장자

// 3. 업로드 될 폴더를 지정한다.
$upload_dir="./img/";
//mkdir($upload_dir);

// 4. 파일 업로드가 성공했는지 점검. 성공은 0 실패 1
//파일명이 중복 되지 않도록 임의의 파일명을 정한다.
if(!$upfile_error){
  $new_file_name = date("Y_m_d_H_i_s");//날짜
  $new_file_name = $new_file_name."_".$com_type.$com_num."_rg";//날짜_i
  $copied_file_name=$new_file_name.".".$file_extension;
  $upload_file = $upload_dir.$copied_file_name;

  // $new_file_name = 2019_04_22_15_09_30
  // $new_file_name.= 2019_04_22_15_09_30_0
  // $copied_file_name= 2019_04_22_15_09_30_0.확장자
  // $upload_file = ./data/2019_04_22_15_09_30_0.확장자
}

// 5. 업로드된 파일 사이즈를 점검하여 지정 사이즈를 넘어가면 돌려보낸다.
if($upfile_size>10000000){
  echo("
  <script>
  alert('업로드 가능한 파일 크기는 10MB이하입니다');
  history.go(-1)
  </script>
  ");
  exit;
}

// //6. 업로드된 파일 확장자를 체크한다.
// switch ($type[1]) {
//   case 'jpg':
//   case 'jpeg':
//   case 'png':
//   case 'gif':
//   case 'bmp':
//     break;
//   default: alret_back('jpg, jpeg, png, gif, bmp 확장자가 아닙니다');
//     //break; 함수에서 끝내므로 불요
// }

//7. 임시 저장소에 있는 파일을 서버의 지정한 위치로 이동시킨다.
if (!move_uploaded_file($upfile_tmp_name, $upload_file)) {
  echo("
  <script>
  alert('서버 내에서 파일을 이동하던 중 오류가 발생했습니다');
history.go(-1);
  </script>
  ");
  exit;
}
}
?>
