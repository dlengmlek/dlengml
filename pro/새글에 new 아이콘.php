

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
