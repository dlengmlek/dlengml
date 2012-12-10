    <meta charset="utf-8" />
<?
include_once('./sqljoin.php');

/*
if(!empty($_GET['id'])){
$sql="delete from `topic` where id='$_GET[id]'"; // 중요!!!!
//echo $sql;
$result = mysql_query($sql);
}
if(!empty($_GET['g_id'])){
$sql="delete from `group_cn` where id='$_GET[g_id]'"; // 중요!!!!
$result = mysql_query($sql);
} 

*/
echo " $_GET[title] 자료가 삭제 되었습니다.<br>LIST로 이동합니다.</b>
<meta http-equiv=refresh content='2; url=index.php'>";
?>