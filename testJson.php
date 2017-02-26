<?php

require_once('./file.php');
$arr = array(
    'id' => 1,
    'name' => 'singwa'
);
$file = new File();
if ($file->cacheData('index_mk_cache',null)){
    
    echo 'success';
}else{
    echo 'error';
}
