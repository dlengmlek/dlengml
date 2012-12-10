 <meta name="viewport" charset="utf-8" lang="kr"  />
<?
include_once('./sqljoin.php');
@extract($_POST);
@extract($_GET);
//ini_set("display_errors", 1);


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
<a href=\"ca.php?g_id={$gcat['g_id']}\">{$gcat['g_name']}</a>
";
}
echo "<div></div>";
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

<a href=\"ca.php?id={$ca['id']}&g_id={$zxc['g_id']}\">{$cat['title']}</a>
";

}
}
}
?>
<?
if(!empty($_GET['id'])) {
$sql="SELECT * FROM `topic` WHERE id = '$_GET[id]'" ;  
$result = mysql_query($sql);
$zxc = mysql_fetch_assoc($result);
//var_dump($zxc);
}
?>

<div></div>
<?=$zxc['title']?><br>
<div></div>
<?=$zxc['description']?>

