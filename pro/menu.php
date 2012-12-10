               <div class="theader">
        </div> 
        
            

            
            
<div id="nav">
 <?
if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = '$_GET[id]'" ;  
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
}
if(!empty($_GET['id'])) {
$sql="SELECT * FROM group_cn WHERE ck = '$_GET[ck]'" ;  
$result = mysql_query($sql);
$ca = mysql_fetch_assoc($result);
}  
?>     
<a href="add.php" >글등록</a>
<a href="modify.php?id=<?=$topic['id']?>&amp;g_id=<?=$zxc['g_id']?>&amp;ck=<?=$ca['ck']?>">수정</a>
<a href="#">삭제</a>

<!--<a href="delete.php?id=<?=$topic['id']?>&amp;g_id=<?=$zxc['g_id']?>">삭제</a>-->
<a href="group.php">그룹</a>

<div class="line">
	
</div>

<ul>
<?
if(!empty($_GET['g_id'])) {
$sql = "SELECT * FROM `group_cn` WHERE `g_id`='$zxc[g_id]'"; 
$result = mysql_query($sql);
while($ca = mysql_fetch_assoc($result)){
//var_dump($ca);
$menu="SELECT * FROM `topic` WHERE `id`='$ca[id]'";
$cresult = mysql_query($menu);
while($cat = mysql_fetch_assoc($cresult)){
//var_dump($cat);


 echo "

<li>
<a href=\"index.php?id={$ca['id']}&amp;g_id={$zxc['g_id']}&amp;ck={$ca[ck]}\">{$cat['title']}</a>
</li>

";

}
}
}
?>
<?
$sql = "SELECT * FROM `group_cn` WHERE `g_id`=0"; 
$result = mysql_query($sql);
while($ca = mysql_fetch_assoc($result)){
//var_dump($ca);
$menu="SELECT * FROM `topic` WHERE `id`='$ca[id]'";
$cresult = mysql_query($menu);
while($cat = mysql_fetch_assoc($cresult)){
//var_dump($cat);


 echo "

<li>
<a href=\"index.php?id={$ca['id']}\">{$cat['title']}[미분류]</a>
</li>

";


}
}
?>

                                       
</ul>
</div>