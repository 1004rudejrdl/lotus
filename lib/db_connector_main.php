<?php
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/lotus/lib/create_table.php";

create_table($conn, 'member');
create_table($conn, 'member_meeting');
create_table($conn, 'member_msg');
create_table($conn, 'member_like');
create_table($conn, 'member_type_survey');
create_table($conn, 'com_info');
create_table($conn, 'prd_shop');
create_table($conn, 'prd_shop_detail');
create_table($conn, 'order_list');
create_table($conn, 'prd_like');
create_table($conn, 'wish_list');
create_table($conn, 'commu');
create_table($conn, 'commu_ripple');
create_table($conn, 'commu_review');
create_table($conn, 'admin_authority');

insert_init_data($conn, 'member');
insert_init_data($conn, 'member_meeting');
insert_init_data($conn, 'member_msg');
insert_init_data($conn, 'member_type_survey');
insert_init_data($conn, 'com_info');
insert_init_data($conn, 'prd_shop');
insert_init_data($conn, 'prd_shop_detail');
insert_init_data($conn, 'order_list');
insert_init_data($conn, 'wish_list');
insert_init_data($conn, 'commu');
insert_init_data($conn, 'commu_ripple');
insert_init_data($conn, 'admin_authority');

?>
