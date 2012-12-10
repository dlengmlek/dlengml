<?php include_once('./sqljoin.php'); ?>
<?php include_once("./head.php"); ?>
<?php include_once("./menu.php"); ?>
<?php
if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = '$_GET[id]'" ;  
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
}
?> 
	<div id='article'>
		<div id="content">
			<h3><?=$topic['title']?></h3>
			<div class="created"><?=$topic['created']?></div>
			<div class="description"><?=$topic['description']?></div>
		</div>
			<div class="disqus"><? include_once('./disqus.php'); ?></div>
	</div>    
<div id='rnav'></div>    
<? include_once("./bottom.php"); ?>


