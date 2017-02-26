<?php
$str = date("Y-m-d",time());
echo $str;
echo '<br/>';
$result='ws'.$str;
echo $result;
echo '<br/>';

$result=md5($result);
echo $result;
echo '<br/>';

$authaccesstoken=sha1('ws'. $result);
echo $authaccesstoken;
echo '<br/>';
?>
