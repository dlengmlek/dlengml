<?php
@extract($_POST);
@extract($_GET);
// 1. 데이터베이스 서버에 접속
$link=mysql_connect('localhost','root','dlengml1');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials',$link);



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
//24시간 이내의 글 수 알아내기 
?>