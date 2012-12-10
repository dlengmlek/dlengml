           <div id="article">
            <div id="content">
                <h3><?=$topic['title']?></h3>
                <div class="created"><?=$topic['created']?></div>

                <div class="description">
                    <?=$topic['description']?>
                </div>
            </div>

 <div class="disqus">

<? include_once('./disqus.php'); ?>   

   </div>
           </div>            




