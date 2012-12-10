<? include_once('./sqljoin.php'); ?>
<? include_once("./head.php"); ?>
<? include_once("./menu.php"); ?>

<SCRIPT type="text/javascript">
function checkGroup(obj)
{
   var btnAll = ['▽', '▼'];
   var btnRev = ['△', '▲'];
   var chkBox = obj.form.elements['g_id[]'];
   var chkLen = chkBox.length;

   switch (obj.name) {
      case 'chkAll':
         switch (obj.value) {
            case btnAll[0]: obj.value = btnAll[1]; var chkAll = 0; break;
            case btnAll[1]: obj.value = btnAll[0]; var chkAll = 1; break;
         }
         if (!chkLen) chkBox.checked = chkAll;
         else
            for (var i=0; i < chkLen; i++) chkBox[i].checked = chkAll;
         break;
      case 'chkRev':
         switch (obj.value) {
            case btnRev[0]: obj.value = btnRev[1]; break;
            case btnRev[1]: obj.value = btnRev[0]; break;
         }
         if (!chkLen) chkBox.checked = !chkBox.checked;
         else
            for (var i=0; i < chkLen; i++) chkBox[i].checked = !chkBox[i].checked;
         break;
   }
}
</SCRIPT>

 <div id="article">
                    

<?
if(!empty($_POST['g_name'])){
    $sql = 'INSERT INTO `group` (`g_name`) VALUES (\''.mysql_real_escape_string($_POST['g_name']).'\')';
    $result = mysql_query($sql);

    if (!$result) {
        $message  = '오류: ' . mysql_error() . "\n";
        $message .= '쿼리: ' . $sql;
        die($message);
    } 
}
?> 
<h3>그룹만들기</h3>
<div class="add_top"></div>
        <form action="./group.php" method="POST">
           <input name='g_name'	 type="input"/>
            <input type="submit" value="그룹생성"> 
        
        
        </form>
       
 <div class="add_top">
 
	 
 </div>       
<form name='delete' action="./delete_gr.php" method="POST"  />
<input type="BUTTON" name="chkAll" value="▼"
 onClick="checkGroup(this)" style="width:2em;height:1.5em"/> 전체선택/해제	
<table class="table table-striped" style=" width: 350px; ">
  <tr>
    <td>삭제</td>
    <td>ID</td>
    <td>그룹명</td>
    <td>글수</td>

  </tr>
<?
    $sql  = "SELECT * FROM `group` WHERE g_id "; //"SELECT * FROM `group` ORDER BY g_id DESC LIMIT 10"
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result))
    {
    $tsql="SELECT `g_id` FROM  `group_cn` WHERE  `g_id`='$row[g_id]'";
    $tresult = mysql_query($tsql);
    $trow = mysql_num_rows($tresult);   
    
	echo "
  <tr>
    <td><input type='CHECKBOX' name='g_id[]' value=".$row['g_id']." /></td>
    <td>".$row['g_id']."</td>
    <td>".$row['g_name']."</td>
    <td>".$trow."</td>

  </tr>";
}
?>
</table>
<input type="submit" value="그룹삭제"> 
</form>
<script type="text/javascript">
var k = 0;
var ckdValue = new Array(); // 체크된 값을 임시로 담을 배열
var blaObj = document.getElementsByName("g_id[]"); // 이름으로 객체를 가져옴
for (var i=0, total=blaObj.length;i<total;i++) {
if (blaObj[i].checked == true) { // 체크되어있는지
ckdValue[k] = blaObj[i].value;
k++;
}
}
document.forms["delete"].blas.value = ckdValue.join(","); // form 네임 쉼표(,)로 구분해서 g_id 필드에 값을 넣음
</script> 
</div>           
<? include_once("./bottom.php"); ?>

