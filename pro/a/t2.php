<?php
include_once('./sqljoin.php');
@extract($_POST);
@extract($_GET);

if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = '$_GET[id]'" ;  
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);

}


//24시간 이내의 글 수 알아내기 
$new_icon = "<img src='./img/icon_new.gif' align='absmiddle'>";  //이미지 파일 경로 

function new_count($result){ 
    // 오늘을 불러옵니다. 
    $intime = date("Y-m-d H:i:s", time() - (int)(60 * 60 * 24)); 

    // 여기는 오늘과 글쓴 날짜를 비교합니다. 
    //$sql2 = " select created from $tmp_write_table where created >= '$intime' and wr_is_comment = '0'";     
    $sql2 = " select created from `topic` where created >= '$intime'"; 

    // 새로운 글이 몇개 있는지 확인합니다. 
    $result2 = mysql_query($sql2); 
    $total_count = mysql_num_rows($result2);
    
    if ($total_count > 0) { 
//        $str_cnt .= " [".$total_count."]"; 
        $str_cnt .= "".$total_count.""; 
        return $str_cnt; 
    } 
    else { 
        $str_cnt .= ""; 
        return $str_cnt;      
    } 
} 
//24시간 이내의 글 수 알아내기 

?>

<html>
    <head>
    <?
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0')) {
 echo '<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE; chrome=1" />';
 // 또는 header('X-UA-Compatible: IE=EmulateIE7');
}
?>
    <meta name="viewport" charset="utf-8" lang="kr"   />
    <!--타이틀바-->
    <title><?=$topic['title']?></title> 
    <script language="Javascript" src="./Spac_Editor/spac_editor_common.js"></script>
<script language="Javascript" src="./Spac_Editor/spac_editor.js"></script>
<link rel="stylesheet" type="text/css" href="./Spac_Editor/spac_editor_common.css">
<link rel="stylesheet" type="text/css" href="./Spac_Editor/spac_editor.css">
    <link href="css.css" rel="stylesheet" >
<link href="css/bootstrap.css" rel="stylesheet" media="screen">

         </head>
 
    <body id="body">
 
                <div id="header">
                <a href="./index.php">
<h1>Hello World!</h1></a>
<div class="number">
<!--//그룹메뉴-->
<?
if(!empty($_GET['g_id'])) {
$sql="SELECT * FROM `group` WHERE g_id = '$_GET[g_id]'" ;  
$result = mysql_query($sql);
$zxc = mysql_fetch_assoc($result);
//var_dump($zxc);
}

$gmenu="SELECT * FROM  `group` ORDER BY  `g_id` ASC ";
$gcresult = mysql_query($gmenu);
while($gcat = mysql_fetch_assoc($gcresult)){
//var_dump($gcat);
echo "
<a href=\"index.php?g_id={$gcat['g_id']}\">{$gcat['g_name']}</a>
<a>&nbsp;&nbsp;|&nbsp;&nbsp;</a>
";
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
               <div class="theader">
        </div> 
        
            

            
            
<div id="nav">
     
<a class="btn btn-small" href="add.php" ><i class="icon-pencil"></i></a>
<a class="btn btn-small" href="modify.php?id=<?=$topic['id']?>"><i class="icon-ok"></i></a>
<a class="btn btn-small" href="delete.php?id=<?=$topic['id']?>"><i class="icon-trash"></i></a>
<a class="btn btn-small" href="group.php"><i class="icon-inbox"></i></a>



<ul>
                   <?
                    if(!empty($_GET['g_id'])) {
$sql = "SELECT `id` FROM `group_cn` WHERE `g_id`='$zxc[g_id]'"; 
$result = mysql_query($sql);
while($ca = mysql_fetch_assoc($result)){
//var_dump($ca);
$menu="SELECT * FROM `topic` WHERE `id`='$ca[id]'";
$cresult = mysql_query($menu);
while($cat = mysql_fetch_assoc($cresult)){
//var_dump($cat);


 echo "
<lu><li>
<a href=\"index.php?id={$ca['id']}&g_id={$zxc['g_id']}\">{$cat['title']}</a>
</lu></li>
";

}
}
}
                        ?>

<!--새글에 new 아이콘
<?
if (new_count(topic) > 0) { 
$menu="select id,title from topic ";
$result=mysql_query($menu);
while($row=mysql_fetch_assoc($result)) {
echo "
<li>
<a href=\"?id={$row['id']}\">{$row['title']}$new_icon</a></li>";}
; } else {      
while($row=mysql_fetch_assoc($result)) {
echo "
<li>
<a href=\"?id={$row['id']}\">{$row['title']}</a></li>";}    
; }
?> 
새글에 new 아이콘-->   



                                        
</ul>
</div>
           <div id="article">
            <div id="content">
                <h3><?=$topic['title']?></h3>
                <div class="created"><?=$topic['created']?></div>

                <div class="description">
                    <?=$topic['description']?>
                </div>
            </div>

 <div class="disqus">

<? include_once('./disqus.php'); ?>   

   </div>
<div class="clear"></div>
<div class="footer">
테스트입니다.
</div>           
</body>
</html>
