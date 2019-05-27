<?php
  //$_FILES 로 부터 5가지 배열명을 가져와서 저장한다

//파일명과 확장자를 구분해서 저장한다.


//업로드 될 폴더를 지정한다
//$upload_dir = "./img/";  //임의의 업로드된 파일을 저장하는 장소 지정
//파일 업로드가 성공 되었는지 점검한다.
//이름이 중복되지 않도록 임의의 파일 명을 지정한다

//업로드된 파일 사이즈를 체크해서 넘어버리면 돌려보낸다

// var_dump($upfile);
//파일이름 타입(확장자) 템프네임(서버가 임시로 받아놓는 위치) 에러검출 파일크기

//5업로드된 파일 확장자를 체크한다.

//임시 저장소에 있는 파일을 서버에 지정한 위치로 이동한다.


//********************************************

$files = $_FILES["shop_img"];
$count = count($files["name"]);
$upload_dir = '../img/';

for ($i = 0; $i < $count; $i ++) {

    $upfile_name[$i] = $files["name"][$i];//실제 파일명
    $upfile_tmp_name[$i] = $files["tmp_name"][$i];//서버에 임시 저장될 파일명.
    $upfile_type[$i] = $files["type"][$i];//파일 형식
    $upfile_size[$i] = $files["size"][$i];//파일 크기
    $upfile_error[$i] = $files["error"][$i];//에러 발생확인

    // $upfile = $_FILES['logo_img'];//파일 업로드 정보 (5가지배열)
    // $upfile_name = $upfile['name'];//f03.jpg
    // $upfile_type = $upfile['type'];//image/gif  file/txt
    // $upfile_tmp_name = $upfile['tmp_name'];
    // $upfile_error = $upfile['error'];
    // $upfile_size = $upfile['size'];

    $file = explode(".",$upfile_name[$i]);
    $file_name = $file[0];
    $file_ext  = $file[1];

    // $file = explode(".", $upfile_name); //파일명과 확장자 구분에서
    // $file_name = $file[0];              //파일명
    // $file_extension = $file[1];         //확장자

    //파일값이 비어있으면 에러입니다. 비어있을시 실행을 안하는 것.
    // if (!$upfile_error) {
    //   $new_file_name = date("Y_m_d_H_i_s");
    //   $new_file_name.="_"."0";
    //   $copied_file_name=$new_file_name.".".$file_extension;
    //   $upload_file = $upload_dir.$copied_file_name;
    //   // $new_file_name = date("2019_04_22_15_19_30");
    //   // $new_file_name.=2019_04_22_15_19_30_0;
    //   // $copied_file_name=2019_04_22_15_19_30_0.jpg;
    //   // $upload_file = ./data/2019_04_22_15_19_30_0.jpg;
    // }



    if(!$upfile_error[$i]){//카피.

        $new_file_name = date("Y_m_d_H_i_s");//날짜
        $new_file_name = $new_file_name."_".$com_type.$com_num.$shop_name."_".$i;//날짜_i
        $copied_file_name[$i] = $new_file_name.".".$file_ext;//날짜_i.확장자명.
        $uploaded_file[$i] = $upload_dir.$copied_file_name[$i];//.data/날짜_i.확장자명.


        if($upfile_size[$i]  > 5000000 ) {//size가 500KB초과일시.
            echo("
            <script>
            alert('업로드 파일 크기가 지정된 용량(5MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
            history.go(-1)
            </script>
            ");
            exit;
        }

        if (($upfile_type[$i] != "image/jpg") ||
        ($upfile_type[$i] != "image/jpeg") ||
        ($upfile_type[$i] != "image/png") ||
        ($upfile_type[$i] != "image/gif") ||
        ($upfile_type[$i] != "image/bmp") ||
        ($upfile_type[$i] != "image/pjpeg") ||
        ($upfile_type[$i] != "image/tiff")){
            echo("
               <script>
                  alert('이미지 파일만 업로드 가능합니다!');
                  history.go(-1)
               </script>
               ");
            exit;
        }

        if (!move_uploaded_file($upfile_tmp_name[$i],$uploaded_file[$i])){//1번째 인자(임시파일)를 2번째 인자에 넣겠다.
            echo("
               <script>
               alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
               history.go(-1)
               </script>
            ");
            exit;
        }

    }
}

 ?>
