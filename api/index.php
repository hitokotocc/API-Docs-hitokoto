<?php
/*
 * @Author: 小亦 API
 * @Date: 2023-01-30 04:20:19
 * @Link: https://api.isoyi.net
 * @LastEditors: 小亦 Henry
 * @Github：insoyi
 * @LastEditTime: -
 * @Description: 一言一句 聚合版
 */
$msg=$_REQUEST["code"]?:"1";//需要查看的类型
$type=$_REQUEST["encode"]?:"text";//返回格式，默认json可选text、js

//合并
$jk=array(
"1"=>"data/hitokoto/Comforting.txt",
"2"=>"data/hitokoto/qianming.txt",
"3"=>"data/hitokoto/qwxh.txt",
"4"=>"data/hitokoto/yan.txt",
"5"=>"data/hitokoto/yhyl.txt",
"6"=>"data/hitokoto/dujitang.txt",
"7"=>"data/hitokoto/aiqing.txt",
"8"=>"data/hitokoto/wenrou.txt",
"9"=>"data/hitokoto/shanggan.txt",
"10"=>"data/hitokoto/tiangou.txt",
"11"=>"data/hitokoto/shehui.txt",
"12"=>"data/hitokoto/sc1.txt",
"13"=>"data/hitokoto/saohua.txt",
"14"=>"data/hitokoto/jdyl.txt",
"15"=>"data/hitokoto/qinghua.txt",
"16"=>"data/hitokoto/rshy.txt",
"17"=>"data/hitokoto/renjian.txt",
"18"=>"data/hitokoto/wyyl.txt");

//获取句子文件的绝对路径
$path = dirname(__FILE__);
$file = file($path."/".$jk[$msg]."");
 
//随机读取一行
$arr  = mt_rand( 0, count( $file ) - 1 );
$content  = trim($file[$arr]);

//编码判断，用于输出相应的响应头部编码
if (isset($_GET['charset']) && !empty($_GET['charset'])) {
    $charset = $_GET['charset'];
    if (strcasecmp($charset,"gbk") == 0 ) {
        $content = mb_convert_encoding($content,'gbk', 'utf-8');
    }
} else {
    $charset = 'utf-8';
}
 
//格式化判断，输出js或纯文本
if (''.$type.'' === 'js') {
    echo "function hitokoto(){document.write('" . $content ."');}";
}else if(''.$type.'' === 'text'){
    echo $content;
}else {
    header('Content-type:text/json');
    $content = array('code'=>200,"mag"=>"succes","content"=>$content);
    echo json_encode($content, JSON_UNESCAPED_UNICODE);
}

?>