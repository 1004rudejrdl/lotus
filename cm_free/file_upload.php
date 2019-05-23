<?php
$file_copied_0=$upload_file="";
$upfile = $_FILES['upfile'];
$upfile_name= $_FILES['upfile']['name'];//f03.jpg
$upfile_type= $_FILES['upfile']['type'];
$upfile_tmp_name= $_FILES['upfile']['tmp_name'];
$upfile_error= $_FILES['upfile']['error'];
$upfile_size= $_FILES['upfile']['size'];

if (!$upfile_name=="") {
$file = explode(".", $upfile_name); //파일명과 확장자구분에서 배열저장
$file_name = $file[0];              //파일명
$file_extension = $file[1];         //확장자

$upload_dir="./data/";

if(!$upfile_error){
  $new_file_name = date("Y_m_d_H_i_s",time());
  $new_file_name.="_".'0';
  $file_copied_0=$new_file_name.".".$file_extension;
  $upload_file = $upload_dir.$file_copied_0;

}

if($upfile_size>500000000){
  alret_back('업로드 가능한 파일 크기는 500MB이하입니다');
}

if (!move_uploaded_file($upfile_tmp_name, $upload_file)) {
  alret_back('서버 내에서 파일을 이동하던 중 오류가 발생했습니다');
}
}
?>
