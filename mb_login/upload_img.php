<?php
// 1. 업로드된 파일의 정보를 가져온다.
$upfile = $_FILES['upfile'];//한개파일업로드정보(5가지정보배열로들어있음)
$upfile_name= $_FILES['upfile']['name'];//f03.jpg
$upfile_type= $_FILES['upfile']['type'];
$upfile_tmp_name= $_FILES['upfile']['tmp_name'];
$upfile_error= $_FILES['upfile']['error'];
$upfile_size= $_FILES['upfile']['size'];

//2. 파일명과 확장자를 구분해서 저장한다.
$file = explode(".", $upfile_name); //파일명과 확장자구분에서 배열저장
$file_name = $file[0];              //파일명
$file_extension = $file[1];         //확장자

// 3. 업로드 될 폴더를 지정한다.
$upload_dir="./profile_img/";
//mkdir($upload_dir);

// 4. 파일 업로드가 성공했는지 점검. 성공은 0 실패 1
//파일명이 중복 되지 않도록 임의의 파일명을 정한다.
if(!$upfile_error){
  $new_file_name = date("Y_m_d_H_i_s",time());
  $new_file_name.="_".'0';
  $copied_file_name=$new_file_name.".".$file_extension;
  $upload_file = $upload_dir.$copied_file_name;

}

// 5. 업로드된 파일 사이즈를 점검하여 지정 사이즈를 넘어가면 돌려보낸다.
if($upfile_size>500000000){
  alret_back('업로드 가능한 파일 크기는 500MB이하입니다');
}

//6. 업로드된 파일 확장자를 체크한다.
$type = explode("/", $upfile_type);
switch ($type[1]) {
  case 'jpg':
  case 'jpeg':
  case 'png':
  case 'gif':
  case 'bmp':
    break;
  default: alret_back('jpg, jpeg, png, gif, bmp 확장자가 아닙니다');
    //break; 함수에서 끝내므로 불요
}

//7. 임시 저장소에 있는 파일을 서버의 지정한 위치로 이동시킨다.
if (!move_uploaded_file($upfile_tmp_name, $upload_file)) {
  alret_back('서버 내에서 파일을 이동하던 중 오류가 발생했습니다');
}

?>
