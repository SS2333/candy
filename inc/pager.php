<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
//计算总记录数

//计算总页数
$page_size =5;
$page_amount = ceil($row_amount / $page_size);
//当未指定页号，或者页号错误时
$page_current = empty($_GET['page']) ? 1 : $_GET['page'];
if ($page_current < 1) $page_current = 1;
if ($page_current > $page_amount) $page_current = $page_amount;
//生成上一页、下一页
if($page_current <= 1 )
    $page_previous = 1 ;
else
    $page_previous = $page_current - 1;
if($page_current >= $page_amount )
    $page_next = $page_amount ;
else
    $page_next = $page_current + 1 ;
$params = $_GET;
$params['page'] = 1;
$page_first_q =  http_build_query($params);
$params['page'] = $page_previous;
$page_previous_q =  http_build_query($params);
$params['page'] = $page_next;
$page_next_q =  http_build_query($params);
$params['page'] = $page_amount;
$page_last_q =  http_build_query($params);
//计算返回纪录的起点与记录数
$row_base= ($page_current-1) * $page_size;
$page_sql = "LIMIT {$page_size} OFFSET {$row_base}";
?>