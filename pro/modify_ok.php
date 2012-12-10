<meta charset="utf-8" />


<?
include_once('./sqljoin.php');


if(!empty($_POST['title'])){
//POST 방식으로 전달받은 인수를 PHP 변수에 할당
$no = $_POST[id]; 
$title = $_POST[title];
$description = $_POST[description];
//질의어 작성
$query = "UPDATE `topic` SET title='$title', description='$description' WHERE id='$no'" ;
// echo $query;//질의어 실행
$result = mysql_query($query);
}
?>
<?
$sql="SELECT * FROM group_cn WHERE ck = '$_POST[ck]'" ;  
$result = mysql_query($sql);
$ca = mysql_fetch_assoc($result);
// print_r($ca);     
// topic 의 id 값과 group 의 id 값을  group_cn 에 저장
if(!empty($_POST['g_id'])){
$gno = $_POST[g_id]; 
$gtitle = $_POST[id];

    $sql = "UPDATE `group_cn` SET g_id='$gno', id='$gtitle', ck='$_POST[ck]'  WHERE id='$gtitle'" ;
//echo $sql;
$result = mysql_query($sql);

}
if(!empty($_POST['g_id'])) {
$sql="SELECT * FROM `group` WHERE g_id = '$_POST[g_id]'" ;  
$result = mysql_query($sql);
$zxc = mysql_fetch_assoc($result);
//var_dump($zxc);
}

$msg = "성공적으로 등록되었습니다";

if ($result==FALSE) {
 echo "레코드 갱신를 실패하였습니다.";
}else{ 
echo "
<script name=javascript>
if('$msg' != '') {
self.window.alert('$msg');
}
location.href='index.php?id=".$no."&g_id=".$zxc[g_id]."';
</script>
"
;}

?>

