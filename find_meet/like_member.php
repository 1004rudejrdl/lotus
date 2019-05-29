<?php
session_start();
define('SCALE', 4);
$userid=$_SESSION['userid'];
if(isset($_GET["mode"]) &&$_GET["mode"]=="like"){
  $sql="SELECT * FROM member_like WHERE `id`='$userid'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $like_me_count=mysqli_num_rows($result);
  $total_page=($like_me_count % SCALE == 0 )?
  ($like_me_count/SCALE):(ceil($like_me_count/SCALE));
  //2.페이지가 없으면 디폴트 페이지 1페이지
  $like_page=(!isset($_GET['like_page']))?(1):(test_input($_GET['like_page']));

  //3.현재페이지 시작번호계산함.
  $like_start=($like_page -1) * SCALE;
  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $rowcount - $start;
  for ($i = $like_start; $i < $like_start+SCALE && $i<$like_me_count; $i++){
    mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $like_me=$row['vote_id'];
    $sql="SELECT * FROM member WHERE `id`='$like_me'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    mysqli_data_seek($result,$i);
    $row1=mysqli_fetch_array($result);
    $name[$i]=$row1['name'];
    $tel[$i]=$row1['tel'];
    $sql="SELECT * FROM member_meeting WHERE `id`='$like_me'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    mysqli_data_seek($result,$i);
    $row2=mysqli_fetch_array($result);
    $img[$i]=$row2['img'];
    $job[$i]=$row2['job'];
    if($job==1){
      $job="무직";
    }else if($job==2){
      $job="공무원";
    }else if($job==3){
      $job="학생";
    }else if($job==4){
      $job="자영업";
    }else if($job==5){
      $job="직장인";
    }
    $height[$i]=$row2['height'];
    $weight[$i]=$row2['weight'];
    $self_info[$i]=$row2['self_info'];
  }

  $s = '[{"name":"'.$name[$i].'"},{"tel":"'.$tel[$i].'"},{"img":"'.$img[$i].'"},{"job":"'.$job[$i].'"},{"height":"'.$height[$i].'"},{"weight":"'.$weight[$i].'"},{"self_info":"'.$self_info[$i].'"}]';
  echo $s;
}else if(isset($_GET["mode"]) &&$_GET["mode"]=="match"){
  $sql="SELECT*FROM member_meeting WHERE `id`='$userid'and `matching`like'%'";
  $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
  $rowcount=mysqli_num_rows($result);
  $total_page=($rowcount % SCALE == 0 )?
  ($rowcount/SCALE):(ceil($rowcount/SCALE));
  //2.페이지가 없으면 디폴트 페이지 1페이지
  $page=(!isset($_GET['page']))?(1):(test_input($_GET['page']));

  //3.현재페이지 시작번호계산함.
  $start=($page -1) * SCALE;
  //4. 리스트에 보여줄 번호를 최근순으로 부여함.
  $number = $rowcount - $start;
  for ($i = $like_start; $i < $like_start+SCALE && $i<$total_record; $i++){
    //mysqli_data_seek($result,$i);
    mysqli_data_seek($result,$i);
    $row=mysqli_fetch_array($result);
    $id=$row['matching'];
    $matching_day=$row['matching_day'];
    $sql="SELECT *FROM member WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    mysqli_data_seek($result,$i);
    $row1=mysqli_fetch_array($result);
    $name=$row1['name'];
    $tel=$row1['tel'];
    $sql="SELECT * FROM member_meeting WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    mysqli_data_seek($result,$i);
    $row2=mysqli_fetch_array($result);
    $img=$row2['img'];
    $job=$row2['job'];
    if($job==1){
      $job="무직";
    }else if($job==2){
      $job="공무원";
    }else if($job==3){
      $job="학생";
    }else if($job==4){
      $job="자영업";
    }else if($job==5){
      $job="직장인";
    }
    $height=$row2['height'];
    $weight=$row2['weight'];
    $self_info=$row2['self_info'];
  }

  $s = '[{"name":"'.$name.'"},{"tel":"'.$tel.'"},{"img":"'.$img.'"},{"job":"'.$job.'"},{"height":"'.$height.'"},{"weight":"'.$weight.'"},{"self_info":"'.$self_info.'"}]';
  echo $s;
}
 ?>
