 <meta name="viewport" charset="utf-8" lang="kr"  />
 <?
 include_once('./sqljoin.php');
 
 ?>
<form action="./add_gr.php" method="post">
<select name="g_id">
<option value="">그룹선택</option>
<?

    $sql  = "SELECT * FROM `group` ORDER BY g_id"; //"SELECT * FROM `group` ORDER BY g_id DESC LIMIT 10"
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result))
    {
echo "
	<option value=".$row['g_id']." name=".$row['g_name'].">".$row['g_name']."</option>
";   
}

?>
</select>
<input type="submit" value="보내기">
</form>
