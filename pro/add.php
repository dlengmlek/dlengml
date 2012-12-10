<? include_once('./sqljoin.php'); ?>
<? include_once("./head.php"); ?>
<? include_once("./menu.php"); ?>

<div id="article">


<h3>글등록</h3>
<div class="add_top"></div>
<form action="./add_ok.php" method="POST" onsubmit="syncEditor();">
<input name="title" type="input" /> 
<input name="id" type="hidden" /> 


<!-- 셀렉터 -->
<select name="g_id" style="margin-bottom: 0px;width: 152px;">
<option value="0" name="id">그룹선택</option>

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
<input type="submit" value="추가" >             
 <input type="checkbox" name="ck" value="1"> 그룹메인글등록        

</br>                
<div class="add_top"></div> 
<textarea rows="30"  class="ckeditor"  cols="60" name="description"></textarea>  
<!--<script language="Javascript">createEditor('description','300');</script>-->
</form>
</div>

</article>



<? include_once("./bottom.php"); ?>           


            
