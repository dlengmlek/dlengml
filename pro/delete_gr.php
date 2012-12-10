    <meta charset="utf-8" />
<?
include_once('./sqljoin.php');

if(!empty($_POST['g_id'])){
for ($i=0, $total=count(($_POST['g_id']));$i<$total;$i++){
$gd= $_POST['g_id'][$i];
$sql="delete from `group` where g_id ='$gd'"; // 중요!!!!
$result = mysql_query($sql);
//echo $sql;
}
}

echo " 그룹이 삭제 되었습니다.<br>그룹 LIST로 이동합니다.</b>
<meta http-equiv=refresh content='2; url=group.php'>";

?>
