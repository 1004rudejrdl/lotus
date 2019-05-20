<?php
include '../../common_lib/createLink_db.php';

session_start();

if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    $id = "?";
}
//------------------------------------------//
if(!empty($_POST['product_num'])){
    $area = $_POST['product_num'];
}else{
    $area = "";
}
if(!empty($_POST['area'])){
    $city = $_POST['area'];
}else{
    $city = "";
}
if(!empty($_POST['model'])){
    $city = $_POST['model'];
}else{
    $city = "";
}
if(!empty($_POST['model_num'])){
    $city = $_POST['model_num'];
}else{
    $city = "";
}
if(!empty($_POST['datepicker1'])){
    $city = $_POST['datepicker1'];
}else{
    $city = "";
}
if(!empty($_POST['datepicker2'])){
    $city = $_POST['datepicker2'];
}else{
    $city = "";
}
if(!empty($_POST['Fare'])){
    $city = $_POST['Fare'];
}else{
    $city = "";
}
if(!empty($_POST['stock'])){
    $city = $_POST['stock'];
}else{
    $city = "";
}

//----------------------------------------------------
    $sql= "insert into country (product_num, area, model, model_num, datepicker1, datepicker2, Fare, stock)";
    $sql.= "values ('$area', '$city')";

    mysqli_query($con, $sql) or die(mysqli_error($con));

    mysqli_close($con);

echo "<script>alert('렌터카가 등록되었습니다.')</script>";
echo "<script>location.href='admin_country_insert.php'; </script>";

?>
