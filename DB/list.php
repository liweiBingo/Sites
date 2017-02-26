<?php
//http:xxxxxx/list.php?=1&pagesize=12
require_once('./response.php');
require_once ('./db.php');
require_once ('../file.php');

$page = isset($_GET['page'])?$_GET['page']:1;
$pageSize = isset($_GET['pagesize'])?$_GET['pagesize']:6;

if(!is_numeric($page) || !is_numeric($pageSize)){
    return Response::show(401,'数据不合法');
}
$offset = ($page - 1) * $pageSize;
$sql = "select *from video where status= 1 order by orderby desc limit ".$offset .",".$pageSize;

$cache = new File();

$videos = array();
if (!$videos = $cache ->cacheData('index_mk_cache'.$page.'-'.$pageSize)){

try{
    $connect = Db::getInstance()->connect();
}catch (Exception $e){
//    $e->getMessage();
    return Response::show(403, '数据库连接失败',$videos);
}

$result =  $connect->query($sql);

//var_dump($result);

while ($video = mysqli_fetch_assoc($result)){
    $videos[] = $video;
}
if ($videos){
    $cache ->cacheData('index_mk_cache'.$page.'-'.$pageSize, $videos,1200);
}
}
//var_dump($videos);
if ($videos) {
    return Response::show(200, '首页数据获取成功', $videos);
}else{
    return Response::show(400, '首页数据获取失败',$videos);
}
