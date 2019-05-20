<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";

create_table($conn, 'member');
create_table($conn, 'member_meeting');
create_table($conn, 'member_msg');
create_table($conn, 'member_like');
create_table($conn, 'member_type_survey');
create_table($conn, 'com_info');
create_table($conn, 'prd_cplx');
create_table($conn, 'prd_cplx_datail');
create_table($conn, 'prd_acm');
create_table($conn, 'prd_acm_room');
create_table($conn, 'prd_acm_rsv');
create_table($conn, 'prd_shop');
create_table($conn, 'prd_shop_detail');
create_table($conn, 'prd_shop_drv');
create_table($conn, 'order_list');
create_table($conn, 'order_takeback');
create_table($conn, 'member_point');
create_table($conn, 'prd_like');
create_table($conn, 'cart');
create_table($conn, 'wish_list');
create_table($conn, 'prd_review');
create_table($conn, 'prd_q');
create_table($conn, 'prd_a');
create_table($conn, 'commu');
create_table($conn, 'commu_ripple');
create_table($conn, 'commu_review');
create_table($conn, 'admin_authority');
create_table($conn, 'company_information');
create_table($conn, 'main_banner');
create_table($conn, 'prd_anl');

 ?>
