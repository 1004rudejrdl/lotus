<?

session_start();//글로벌 변수값을 쓰거나할때에는 페이지 최 상위에 선언해야 한다
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
$board = "member_type_survey"; //이곳은 db에 만들었던 테이블명을 적으면 됩니다. 위에서 poll이라고 만들었죠..
var_dump($_POST['composer1']);
var_dump($_POST['qwer']);

if(!empty($_POST['composer1'])){
    $height = $_POST['composer1'];
    var_dump($height);
}else{
    $height = "";
}
if(!empty($_POST['composer2'])){
    $shape = $_POST['composer2'];
}else{
    $shape = "";
}
if(!empty($_POST['composer3'])){
    $age = $_POST['composer3'];
}else{
    $age = "";
}
if(!empty($_POST['composer4'])){
    $job = $_POST['composer4'];
}else{
    $job = "";
}
if(!empty($_POST['composer5'])){
    $place = $_POST['composer5'];
}else{
    $place = "";
}
$sql="INSERT into $board(`id`,`type_height`,`type_shape`,`type_age`,`type_job`,`type_place`)
 values('test','$height','$shape','$age','$job','$place');";

$result=mysqli_query($conn,$sql) or die("실패원인: ".mysqli_error($conn));


?>
