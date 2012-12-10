<?php
include_once('./sqljoin.php');
@extract($_POST);
@extract($_GET);

if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = '$_GET[id]'" ;  
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
    <meta name="viewport" charset="utf-8" lang="kr"  />

<title>NHN :: NULI &gt; Guidelines &gt; UIO &gt; Layout &gt; 2단 컬럼 + 가변폭 + 로컬메뉴 + 컨텐츠</title>

<script type="text/javascript" src="http://html.nhndesign.com/js/default.js"></script>

<style type="text/css">

/* Layout */

*{margin:0; padding:0;}

#wrap{width:100%;}

#header{width:100%;}

#container{width:100%;}

.snb{width:199px; float:left; margin-right:-200px; 
    border-left-width: 0px !important;
    padding-bottom: 0px;
    padding-top: 0px;
text-align:center !important;
}

#content{margin-left:200px; width: 700px;}

#footer{width:100%;}

.clear{display:block; float:none; clear:both; height:0; width:100%; font-size:0 !important; line-height:0 !important; overflow:hidden; margin:0 !important; padding:0 !important;}

/* Layout Color - 실제 서비스 적용 후 아래 코드는 삭제 하세요 */

div{padding:10px 0; margin:0 0 10px 0; font:bold 14px Tahoma; color:#2D2C2D;}

#wrap {margin:0; width:auto; padding:10px; border:1px solid #bdbdbd;}

#header {margin-top:10px;}

#header,

#container{width:auto;  padding:0px; border:2px solid #bfbfbf;}

.snb,

#content{ background:#fff; min-height: 500px; margin-bottom:0px; border-left:1px solid #bdbdbd; }

#content{}

#footer{padding:10px; background:#e5e5e5; border:2px solid #bfbfbf; width:auto;}

.disqus{margin:10px 20px 20px 20px; padding:0px 20px; background:#e9e9e9; border-top:1px dashed #484848;}
            ul {
                list-style: none;
                padding-left: 0px;
                margin: 20px 0px 20px 5px
                }
.mcontent{
	
	margin: 0px 0px 0px 20px;
} 

ul{
	margin: 0px !important; 
	
	
}             
</style>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">

</head>

<body id="index">

<div id="wrap">

     #wrap

     <div id="header">

          #header

     </div>

     <div id="container">

    

          <div class="snb">

<div class="btn-group">       
<a href='add.php'><button type="button" class="btn">추가</a></button>
<a href='modify.php?id=<?=$topic['id']?>'><button type="button" class="btn">수정</a></button>
<a href='delete.php?id=<?=$topic['id']?>'><button type="button" class="btn">삭제</a></button>
</div>
<ul>
                   <?
                    // $sql="select id,title from topic ORDER BY id LIMIT 10 "; //10행만 보이기 
                    $menu="select id,title from topic ";
                    $result=mysql_query($menu);
                    while($row=mysql_fetch_assoc($result)) {
                    echo "
                    <li><a href=\"i.php?id={$row['id']}\">{$row['title']}</a></li>";
                        }
                        ?>
</ul>
          </div>

          <div id="content">
<div class="mcontent">         
  <h2><?=$topic['title']?></h2>
                <div class="created"><?=$topic['created']?></div>

                <div class="description">
                    <?=$topic['description']?>
                </div>

</div>         
<div class="disqus">
<?php   
include_once('./disqus.php');
?> 
</div>
          </div>

          <div class="clear">

          </div>

     </div>

     <div id="footer">

          #footer

     </div>

</div>





</body></html>

