 <meta charset="utf-8" />

<?php
include_once('./sqljoin.php');

    
// topic 테이블
if(!empty($_POST['title'])){
    $sql = 'INSERT INTO `topic` (`title`,`description`,`created`) VALUES (\''.mysql_real_escape_string($_POST['title']).'\', \''.mysql_real_escape_string($_POST['description']).'\',NOW())';
// echo $sql;
$result = mysql_query($sql);


// topic 의 id 값과 group 의 id 값을  group_cn 에 저장
    $gsql  = "SELECT id FROM `topic` ORDER BY id DESC LIMIT 1";
    $gresult = mysql_query($gsql);
    $topic = mysql_fetch_array($gresult);
    $sql = 'INSERT INTO `group_cn` (`g_id`,`id`,`ck`) VALUES (\''.mysql_real_escape_string($_POST['g_id']).'\', \''.mysql_real_escape_string($topic['id']).'\',\''.($_POST['ck']).'\')';
//  echo $sql;
$result = mysql_query($sql);
}
if(!empty($_POST['g_id'])) {
$sql="SELECT * FROM `group` WHERE g_id = '$_POST[g_id]'" ;  
$result = mysql_query($sql);
$zxc = mysql_fetch_assoc($result);
//var_dump($zxc);
}

$msg = "성공적으로 등록되었습니다";
 echo " <html><head>
                 <script name=javascript>
 
                if('$msg' != '') {
                        self.window.alert('$msg');
              }

                location.href='./index.php?id=".$topic[id]."&g_id=".$zxc[g_id]."';
 
               </script>
                </head>
                </html> ";
                
              
?>



