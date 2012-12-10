<?
if (!defined('_GNUBOARD_')) exit;

$cols  = 2;
$col_height = 10;

$cnt_bo_1 =  7; // 한줄당 분류 갯수 
?>
<style type="text/css">
<!--
.style1 {
	color: #660000;
	font-weight: bold;
}
-->
</style>
<?
    //$icon_h ="<img src='".$latest_skin_path."/img/sitemap_icon.gif' border=0 align=absmiddle width=17 height=9>"; //출력부분 아이콘

    $cnt = 1;
    
    $row = sql_fetch(" SELECT bo_category_list FROM $g4[board_table] WHERE bo_table = '$bo_table' ");
    
    $arr = explode("|", $row[bo_category_list]); // 구분자가 , 로 되어 있음
    
    $str = "";
    
    $str .= "<tr>";
     
    for ($i=0; $i<count($arr); $i++) 
        
        if (trim($arr[$i]))  {
        
        //카테고리별 게시물수 체크
    	
    	$row1 = sql_fetch(" SELECT count(*) as cat_cnt FROM {$g4[write_prefix]}{$bo_table} WHERE ca_name = '$arr[$i]' and wr_is_comment = 0 ");
    	    
        //새글표시(아이콘뉴) 부분
        
        $sql = " SELECT wr_datetime FROM {$g4[write_prefix]}{$bo_table} WHERE ca_name = '$arr[$i]' order by wr_datetime desc limit 1 ";
        
        $row2 = sql_fetch_array(mysql_query($sql));

        if($row2[wr_datetime] >= date("Y-m-d H:i:s", time() - 24 * 3600)) {
               
    $icon_new  = "<img src='$latest_skin_path/icon_new_areacate.gif' border=0>"; 
                     
        } else {
        
        $icon_new  = "";
        
        }
                
        
        //출력부분 설정
         
        $str .= "<td width='75'>".$icon_h."<a href='$g4[path]/bbs/board.php?bo_table=$bo_table&page=$page&mode=$mode&sca=$arr[$i]'><font color=#888888>$arr[$i]</font></a><font color=#999999>[".$row1[cat_cnt]."]  </font>".$icon_new."</td>";
		
		if ($cnt == $cnt_bo_1) { $cnt = 0; $str .= "</tr><tr>"; } //줄바꿈 부분
     	
     	$cnt++;
    }
    
?>
<!--
<table width="100%" cellpadding="0" cellspacing="0" align=center border="0">
<tr>
	<td width="3" height="3"><img src='<?=$latest_skin_path?>/img/sitemap_table1.gif' width="3" height="3"></td>
	<td height='3' background='<?=$latest_skin_path?>/img/sitemap_table1_bg.gif'></td>
	<td width='3' height='3'><img src='<?=$latest_skin_path?>/img/sitemap_table2.gif' width="3" height="3"></td>
</tr>
<tr>
	<td width="3" background='<?=$latest_skin_path?>/img/sitemap_table4_bg.gif'></td>
	<td>

		<table width=100% cellpadding=7 cellspacing=0 align=center border="0">
		<tr>
			<!--게시판 제목
			<td width="100px"  rowspan='6'>&nbsp;<img src='<?=$latest_skin_path?>/img/icon_nemo.gif'>&nbsp; <B> <a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><strong><?=$board[bo_subject]?></strong></a> </B> </td>
			실제출력부분-->
			<!--<td height='<?=$col_height?>' colspan='<?=$cols?>'>
				<?=$str?>
			</td>
		</tr>
		<tr>
			<td height='<?=$col_height?>' colspan='<?=$cols?>'>	</td>
		</tr>
		</table>

	</td>
	<td width="3" background='<?=$latest_skin_path?>/img/sitemap_table2_bg.gif'></td>
</tr>
<tr>
	<td width="3" height='3'><img src='<?=$latest_skin_path?>/img/sitemap_table3.gif' width="3" height="3"></td>
	<td height="3" background='<?=$latest_skin_path?>/img/sitemap_table3_bg.gif'></td>
	<td width="3" height='3'><img src='<?=$latest_skin_path?>/img/img/sitemap_table4.gif' width="3" height="3"></td>
</tr>
</table>

-->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30px"><img src='<?=$latest_skin_path?>/img/icon_nemo.gif'><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><strong>
     <span style="COLOR:#ffffff";> <?=$board[bo_subject]?>
    </strong></a></td>
  </tr>
  <tr>
    <td ><?=$str?></td>
  </tr>
</table>