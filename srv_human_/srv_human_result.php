<?php
session_start();//글로벌 변수값을 쓰거나할때에는 페이지 최 상위에 선언해야 한다
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
// if (!isset($_SESSION['userid'])) {
//   echo "<script>alert('권한이 없습니다.');window.close();</script>";
//   exit;
// }

$sql ="SELECT * from `member_type_survey`;";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}
$count1_1=$count1_2=$count1_3=$count1_4=$count1_5=0;
$count2_1=$count2_2=$count2_3=$count2_4=$count2_5=0;
$count3_1=$count3_2=$count3_3=$count3_4=$count3_5=0;
$count4_1=$count4_2=$count4_3=$count4_4=$count4_5=0;
$count5_1=$count5_2=$count5_3=$count5_4=$count5_5=0;

$total=mysqli_num_rows($result);
      for ($i=0; $i <$total ; $i++) {
        $row = mysqli_fetch_array($result);
        $total1 = $row['type_height'] + $row['type_shape'] + $row['type_age'] + $row['type_job'] + $row['type_place'];

        $height = $row['type_height'];
        switch ($height) {
          case '1':
            $count1_1++;
            break;
          case '2':
            $count1_2++;
            break;
          case '3':
            $count1_3++;
            break;
          case '4':
            $count1_4++;
            break;
          case '5':
            $count1_5++;
            break;
          default:

            break;
        }

        $shape = floor($row['type_shape']);
        switch ($shape) {
          case '1':
            $count2_1++;
            break;
          case '2':
            $count2_2++;
            break;
          case '3':
            $count2_3++;
            break;
          case '4':
            $count2_4++;
            break;
          case '5':
            $count2_5++;
            break;
          default:

            break;
        }

        $age = floor($row['type_age']);
        switch ($age) {
          case '1':
            $count3_1++;
            break;
          case '2':
            $count3_2++;
            break;
          case '3':
            $count3_3++;
            break;
          case '4':
            $count3_4++;
            break;
          case '5':
            $count3_5++;
            break;
          default:

            break;
        }

        $job = floor($row['type_job']);
        switch ($job) {
          case '1':
            $count4_1++;
            break;
          case '2':
            $count4_2++;
            break;
          case '3':
            $count4_3++;
            break;
          case '4':
            $count4_4++;
            break;
          case '5':
            $count4_5++;
            break;
          default:

            break;
        }

        $place = floor($row['type_place']);
        switch ($place) {
          case '1':
            $count5_1++;
            break;
          case '2':
            $count5_2++;
            break;
          case '3':
            $count5_3++;
            break;
          case '4':
            $count5_4++;
            break;
          case '5':
            $count5_5++;
            break;
          default:

            break;
        }
      }
?>
 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta http-equiv="content-type" content="text/html; charset=EUC-KR">
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <link rel="stylesheet" href="../css/common.css">
     <link rel="stylesheet" href="../css/header_sidenav.css">
     <link rel="stylesheet" href="./css/srv_human_result.css">
       <script type="text/javascript">

       google.charts.load('current',{'packages': ['corechart']});
       google.charts.setOnLoadCallback(drawVisualization);

       function drawVisualization(){
         var data=google.visualization.arrayToDataTable([
           ['선호하는 이성의 키', '150이하', '151~160', '161~165', '166~170', '170이상'],
           ['결과', <?=$count1_1?>, <?=$count1_2?>, <?=$count1_3?>, <?=$count1_4?>, <?=$count1_5?>]
         ]);
         var options={
           title:'선호하는 이성의 키',
           vAxis:{title:'선호하는 이성의 키'},
           xAxis:{title:'k'},
           seriesType:'bars',
           series:{5:{type:'line'}}
         };
         var chart= new google.visualization.ComboChart(document.getElementById('chart_div'));
         chart.draw(data,options);
       }

       google.charts.load('current',{'packages': ['corechart']});
       google.charts.setOnLoadCallback(drawVisualization2);
       function drawVisualization2(){
         var data2=google.visualization.arrayToDataTable([
           ['선호하는 직업군', '서비스직', '금융권', '교사/공무원', '자영업/사업', '기타'],
           ['결과', <?=$count2_1?>, <?=$count2_2?>, <?=$count2_3?>, <?=$count2_4?>, <?=$count2_5?>]
         ]);
         var options2={
           title:'선호하는 직업군',
           vAxis:{title:'선호하는 직업군'},
           xAxis:{title:'k'},
           seriesType:'bars',
           series:{5:{type:'line'}}
         };
         var chart2= new google.visualization.ComboChart(document.getElementById('chart_div2'));
         chart2.draw(data2,options2);
       }
       google.charts.load('current',{'packages': ['corechart']});
       google.charts.setOnLoadCallback(drawVisualization3);
       function drawVisualization3(){
         var data3=google.visualization.arrayToDataTable([
           ['선호하는 이성의 연봉', '2500이하', '2500~3500', '3500~4500', '4500~5000', '5000이상'],
           ['결과', <?=$count3_1?>, <?=$count3_2?>, <?=$count3_3?>, <?=$count3_4?>, <?=$count3_5?>]
         ]);
         var options3={
           title:'선호하는 이성의 연봉',
           vAxis:{title:'선호하는 이성의 연봉'},
           xAxis:{title:'k'},
           seriesType:'bars',
           series:{5:{type:'line'}}
         };
         var chart3= new google.visualization.ComboChart(document.getElementById('chart_div3'));
         chart3.draw(data3,options3);
       }
       google.charts.load('current',{'packages': ['corechart']});
       google.charts.setOnLoadCallback(drawVisualization4);
       function drawVisualization4(){
         var data4=google.visualization.arrayToDataTable([
           ['선호하는 이성의 연애성향','장난기많은 친구같은 사이', '기댈 수 있는 듬직함', '배울게 많은 사람', '무심한듯 잘챙겨주는 스타일','기타'],
           ['결과', <?=$count4_1?>, <?=$count4_2?>, <?=$count4_3?>, <?=$count4_4?>, <?=$count4_5?>]
         ]);
         var options4={
           title:'선호하는 이성의 연애성향',
           vAxis:{title:'선호하는 이성의 연애성향'},
           xAxis:{title:'k'},
           seriesType:'bars',
           series:{5:{type:'line'}}
         };
         var chart4= new google.visualization.ComboChart(document.getElementById('chart_div4'));
         chart4.draw(data4,options4);
       }
       google.charts.load('current',{'packages': ['corechart']});
       google.charts.setOnLoadCallback(drawVisualization5);
       function drawVisualization5(){
         var data5=google.visualization.arrayToDataTable([
           ['첫만남 시 선호하는 장소', '카페', '술집', '공원', '영화관', '기타'],
           ['결과', <?=$count5_1?>, <?=$count5_2?>, <?=$count5_3?>, <?=$count5_4?>, <?=$count5_5?>]
         ]);
         var options5={
           title:'첫만남 시 선호하는 장소',
           vAxis:{title:'첫만남 시 선호하는 장소'},
           xAxis:{title:'k'},
           seriesType:'bars',
           series:{5:{type:'line'}}
         };
         var chart5= new google.visualization.ComboChart(document.getElementById('chart_div5'));
         chart5.draw(data5,options5);
       }
       </script>
     <title>이상형 설문조사</title>
   </head>
   <body>
     <script src="./srv_human_form.js"> </script>
     <!-- header start -->
     <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/header_sidenav.php"; ?>
     <!-- header end -->
     <!-- main_body start -->
     <div id="main_body" class="main_body">
       <div id="sidenav" class="sidenav">
         <a href="../find_meet/meeting.php?mode=whole">연인찾기</a>
         <a href="../find_meet/meeting.php?mode=male" style="color:#1565c0">남</a>
         <a href="../find_meet/meeting.php?mode=female"style="color:#f64f59">여</a>
         <a href="../find_meet/match_log.php">데이트로그/회원현황</a>
         <a href="./srv_human_research.php">이상형 설문조사</a>
       </div><!-- sidenav end -->

       <div class="main">
         <div class="admin_title">
           이상형 설문결과
         </div>
         <hr class="title_hr">

         <div class="charts" id="chart_div" >

         </div>
         <div class="charts" id="chart_div2" >

         </div>
         <div class="charts" id="chart_div3" >

         </div>
         <div class="charts" id="chart_div4" >

         </div>
         <div class="charts" id="chart_div5" >

         </div>

       <hr class="title_hr">
   </div> <!-- main end -->
 </div> <!-- main_body end -->
 <!-- footer start -->
 <?php include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/footer.php"; ?>
 <!-- footer_bg end -->
 <!-- <script src="../js/admin_effect_common.js"></script> -->
 <!-- Sticky event를 위해서 상단에 올리지 못함 -->
</body>

</html>
