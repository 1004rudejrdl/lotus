<?php
session_start();

  include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";

//
//
// $num= $_GET['num'];
// $page= $_GET['page'];
//
// $sql= "select * from commu where num=$num";
// $result= mysqli_query($con, $sql) or die(mysqli_error($con));
// $row= mysqli_fetch_array($result);
//
// $gno= $row['gno'];
// $item_id= $row['id'];
// $content= $row['content'];
// $content=str_replace(" ", "&nbsp;", $content);
// $content=str_replace("\n", "<br>", $content);
// $regist_day= $row['regist_day'];
// $hit= $row['hit']+1;
// $subject=$row['subject'];
//
// $sql= "update qna set hit=$hit where num=$num";
// mysqli_query($con, $sql) or die(mysqli_error($con));
//
//
// $sql2= "select id from qna where gno=$gno";
// $result2= mysqli_query($con, $sql2) or die(mysqli_error($con));
// $row2= mysqli_fetch_array($result2);
// $p_id= $row2['id'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/common.css">
   <link rel="stylesheet" href="./css/view.css">
   <link rel="stylesheet" href="../css/header_sidenav.css">
   <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<title></title>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
  <script src="../js/effect_common.js"></script>
  <div class="main_body">
      <div id="sidenav" class="sidenav">
        <a href="../cm_free/cm_free_exhibit.php">자유게시판</a>
        <a href="../cm_gath_/cm_gath_exhibit.php">모임</a>
        <a href="../cm_rv_/cm_rv_exhibit.php">성공후기</a>
        <a href="../cm_qna_/cm_qna_exhibit.php">QnA</a>
      </div>
	<section id="section2">
		<div class="main">
			<div id="head">
        		<h1>NOTICE</h1>
        	</div>
        	<hr>
        	<div id="view_contents">
        		<div id="view_contents_title">
        			<div id="view_contents_title1"><?=$subject?></div>
        			<div id="view_contents_title2"><?=$row['id']?> | 조회 : <?=$hit?> | <?=$regist_day?></div>
        			<div class="clear"></div>
        		</div>
        		<br>
        		<div id="view_contents_content"><?=$content?></div>
        		<hr>
        	</div>
        	<div id="qna_link">
        		<?php
        		if(isset($_SESSION['id'])){
        		?>
        		<a href="qna_input_form.php?page=<?=$page?>"><img src="../img/write.png"></a>
        		<?php
            		if($_SESSION['id']===$item_id || $_SESSION['id']==="admin"){
        		    ?>
            		<a href="./cm_free_delete.php?page=<?=$page?>&num=<?=$num?>"><img src="../img/delete.png"></a>
            		<a href="qna_input_form.php?page=<?=$page?>&num=<?=$num?>&mode=update"><img src="../img/modify.png"></a>
            		<?php
        		    }
            		if($_SESSION['id']==="admin" || $_SESSION['id']===$p_id){
        		    ?>
            		<a href="qna_input_form.php?page=<?=$page?>&gno=<?=$gno?>&num=<?=$num?>&mode=reply"><img src="../img/response.png"></a>
                    <?php
                    }
        		}
            		?>
        		<a href="qna_list.php?page=<?=$page?>"> <img src="../img/list.png"> </a>
        	</div>
        	<div class="clear"></div>
    	</div>

	</section>
    <footer>
      	<?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
    </footer>
</body>
</html>
