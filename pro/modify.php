<? include_once('./sqljoin.php'); ?>
<? include_once("./head.php"); ?>
<? include_once("./menu.php"); ?>

           <div id="article">

<h3>글수정하기</h3>
<div class="add_top"></div>
	          
				<form action="modify_ok.php" method="POST" onsubmit="syncEditor();">
	            <input type=hidden  name="id" value='<?=$topic['id']?>'>
	            <input name=title type=input value='<?=$topic['title']?>'>
<input name="<?=$topic['id']?>" type="hidden" /> 



<!-- 셀렉터 -->
<select name="g_id" style="margin-bottom: 0px;width: 152px;">
<option value="<?=$row['g_id']?>" >그룹선택</option>

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
<!-- 셀렉터 --> 
<?
$sql="SELECT * FROM group_cn WHERE ck = '$_GET[ck]'" ;  
$result = mysql_query($sql);
$ca = mysql_fetch_assoc($result);
         
?>	            
	            <input type="submit" value="수정" />
	            그룹메인글  <input type="checkbox" name="ck" value="<?=$ca['ck']?>" <? if ($ck == "1") echo "checked"; ?>>   
	            </br>
	            <div class="add_top"></div>
	           <textarea rows="30"  class="ckeditor"  cols="60" name="description"><?=$topic['description']?></textarea>
	          <!--<script language="Javascript">createEditor('description','300','<?=$topic['description']?>');</script>-->

	          </div>


            </article>


<? include_once("./bottom.php"); ?>
