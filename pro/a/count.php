    <meta charset="utf-8" />

<? 
include_once('./sqljoin.php');

       
$result = mysql_query("SELECT * FROM topic", $link);
//$num_rows = mysql_num_rows($result);
//echo "강의는 수는 총 ";
//echo "$num_rows 개\n";


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
?>

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
<?
if (new_count(topic) > 0) { echo "하루동안 새글이 있습니다."; 	
} else { echo "하루동안 새글이 없습니다.";
}
?> 


