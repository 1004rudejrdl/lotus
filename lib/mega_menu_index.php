<?php  ?>
<script type="text/javascript">
  function diag(){
    window.open('./tt_diag/tt_diag_list.php','','scrollbars=no,toolbars=no,width=780,height=710');
  }
</script>
<div class="row">
  <div class="column longer">
    <h3>이성찾기</h3>
    <a href="./find_meet/meeting.php?mode=male" style="color:#1565c0">남</a>
    <a href="./find_meet/meeting.php?mode=female" style="color:#f64f59">여</a>
    <a href="./find_meet/match_log.php">데이트로그/회원현황</a>
    <a href="./srv_human_/srv_human_research.php">이상형 설문조사</a>
  </div> <!-- column -->
  <div class="column">
    <h3>쇼핑몰</h3>
    <a href="./sh_man/sh_man_list.php?mode=man">남성의류</a>
    <a href="./sh_man/sh_man_list.php?mode=woman">여성의류</a>
    <a href="./sh_man/sh_man_list.php?mode=shose">신발</a>
  </div> <!-- column -->
  <div class="column longer">
    <h3>테스트</h3>
    <a onclick="diag()">연애진단</a>
    <a href="./tt_tend/tt_tend_test.php">연애성향테스트</a>
    <a href="./tt_color/tt_color_test.php">컬러테스트</a>
  </div> <!-- column end -->
  <div class="column">
    <h3>커뮤니티</h3>
    <a href="./cm_free/cm_free_list.php">자유게시판</a>
    <a href="./cm_gath/cm_gath_list.php">모임</a>
    <a href="./cm_rv/cm_rv_list.php">성공후기</a>
    <a href="./cm_qna/cm_qna_list.php">QnA</a>
  </div> <!-- column end -->
</div> <!-- row end -->
