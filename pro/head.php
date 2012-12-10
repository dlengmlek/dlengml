<!DOCTYPE html>
<html>
    <head>
    <?
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0')) {
 echo '<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE; chrome=1" />';
 // 또는 header('X-UA-Compatible: IE=EmulateIE7');
}
if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = '$_GET[id]'" ;  
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
}

?>
    <meta name="viewport"  charset="utf-8" lang="kr" />
    <!--타이틀바-->
    <title><?=$topic['title']?></title> 


    <script src="./ckeditor/ckeditor.js"></script>
    <link href="css.css" rel="stylesheet" >
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	
	<link rel="stylesheet" href="./ckeditor/sample.css">

         </head>
 
    <body id="body">
    
   
                <div id="header">
                <a href="./index.php">
<h1>Hello World!</h1></a>
<div class="number">
<!--//그룹메뉴-->
<?

if(!empty($_GET['g_id'])) {
$sql="SELECT `g_id`  FROM `group` WHERE `g_id` = '$_GET[g_id]'" ;  
$result = mysql_query($sql);
$zxc = mysql_fetch_assoc($result);
// print_r($zxc);
}
if(!empty($_GET['g_id'])) {

// 중요코드 
$sql = "SELECT * FROM  `group_cn` WHERE  `g_id` ='$zxc[g_id]' AND  `ck` ='1' ORDER BY  `group_cn`.`id` DESC LIMIT 1"; 
$result = mysql_query($sql);
$ca = mysql_fetch_assoc($result);
// print_r($ca);
}
$sql="SELECT * FROM  `topic` WHERE  `id` ='$ca[id]' ";
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
// print_r($topic);

$gmenu="SELECT * FROM  `group` ORDER BY  `g_id` ASC ";
$gcresult = mysql_query($gmenu);
$ggcat = mysql_num_rows($gcresult);
//while($gcat = mysql_fetch_array($gcresult)){
for ($i=0; $gcat = mysql_fetch_array($gcresult); $i++) {
echo "
<a href=\"index.php?g_id={$gcat['g_id']}\">{$gcat['g_name']}</a>
";
if ($i < $ggcat-1)
echo "<span class='l' >|</spam>";
}
?>


<!--// 그룹메뉴 -->
</div>

<div class="tnum">
<!--// 글수 -->
<?            
$result = mysql_query("SELECT * FROM topic", $link);
$num_rows = mysql_num_rows($result);
// 강의수
echo "글 수는 총 ";
echo "$num_rows 개\n";
//새글확인
if (new_count(topic) > 0) { echo "하루동안 새글이 있습니다."; 	
} else { echo "하루동안 새글이 없습니다.";
}
?>
<!--// 글수 -->

  </div>
</div>