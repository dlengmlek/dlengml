 <meta charset="utf-8" />

<?php
include_once('./sqljoin.php');
@extract($_POST);
@extract($_GET);
    
if(!empty($_POST['g_id'])){
    $gsql  = "SELECT id FROM `topic` ORDER BY id DESC LIMIT 1";
    $gresult = mysql_query($gsql);
    $topic = mysql_fetch_array($gresult);
    $gtopic =$topic ++1 ;
    $sql = 'INSERT INTO `group_cn` (`g_id`,`id`) VALUES (\''.mysql_real_escape_string($_POST['g_id']).'\', \''.mysql_real_escape_string($gtopic['id']).'\')';
 echo $sql;
$result = mysql_query($sql);
}

$msg = "성공적으로 등록되었습니다";
 echo " <html><head>
                 <script name=javascript>
 
                if('$msg' != '') {
                        self.window.alert('$msg');
              }

                location.href='./index.php?id=".$gtopic[id]."';
 
               </script>
                </head>
                </html> ";
?>