 <meta charset="utf-8" />

<?php
include_once('./sqljoin.php');
@extract($_POST);
@extract($_GET);

//if(!empty($_POST['title'])&&($_POST['description'])){

if(!empty($_POST['g_id'])){
    $sql = 'INSERT INTO `group_cn` (`g_id`,`id`) VALUES (\''.mysql_real_escape_string($_POST['g_id']).'\', \''.mysql_real_escape_string($_POST['id']).'\')';
   echo $sql;
$result = mysql_query($sql);

}

?>
<!--
<?
    $sql  = "SELECT * FROM `topic` ORDER BY id DESC LIMIT 1";
    $result = mysql_query($sql);
    $topic = mysql_fetch_array($result);
$msg = "성공적으로 등록되었습니다";
 echo " <html><head>
                 <script name=javascript>
 
                if('$msg' != '') {
                        self.window.alert('$msg');
              }

                location.href='./index.php?id=".$topic[id]."';
 
               </script>
                </head>
                </html> ";



?>
-->