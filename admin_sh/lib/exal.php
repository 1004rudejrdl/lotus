<?php
$mysqli = new mysqli('127.0.0.1', 'root', '123456', 'lotus_db');
//$mysqli = new mysqli('127.0.0.1', 'root', '******', 'DB명');
header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = 판매 상품 매출액.xls" );     //filename = 저장되는 파일명을 설정합니다.
header( "Content-Description: PHP4 Generated Data" );
//엑셀 파일로 만들고자 하는 데이터의 테이블을 만듭니다.
$EXCEL_FILE = "
<table border='1'>
    <tr>
       <td>판매상품이름</td>
       <td>판매상품개수</td>
       <td>판매상품가격</td>
       <td>판매상품 총 가격</td>
    </tr>
";
$sql1 = "SELECT * from order_list o inner join prd_shop_detail s on o.prd_num = s.prd_num;";
$res = $mysqli->query($sql1);
// DB 에 저장된 데이터를 테이블 형태로 저장합니다.
while ($row = $res->fetch_object()) {
$EXCEL_FILE .= "
    <tr>
       <td>".$row->prd_name."</td>
       <td>".$row->order_count."</td>
       <td>".$row->shop_price."</td>
       <td>".($row->shop_price)*($row->order_count)."</td>
    </tr>
";
}
$EXCEL_FILE .= "</table>";
// 만든 테이블을 출력해줘야 만들어진 엑셀파일에 데이터가 나타납니다.
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
echo $EXCEL_FILE;

?>
<script type="text/javascript">
  history.go(-1);
</script>
