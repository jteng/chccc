<?php require_once "$_SERVER[DOCUMENT_ROOT]/common/db_conn.php" ?>
<?php require_once "$_SERVER[DOCUMENT_ROOT]/common/LanguageUtil.php" ?>
<?php
	$language = LanguageUtil::getCurrentLanguage();

	mysql_connect($db_host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	mysql_query ('SET NAMES utf8');
	
	$query="SELECT * FROM ch_group order by sort_order";
	$result=mysql_query($query);
	
	$num=mysql_numrows($result);
	
	mysql_close();
	$field_group_name="group_name";
	if("en"==$language){
		$field_group_name=$field_group_name."_".$language;
	}
?>
	<div id="leftnav_container">
        <div class="leftnav">
        	<h3>Fellowship</h3>
	        <ul>
<?php	        
			$i=0;
			while ($i < $num) {
				$group_id  =mysql_result($result,$i,"group_id");
				$group_name =mysql_result($result,$i,$field_group_name);
				echo ("<li><a href='./group.php?id=$group_id'>$group_name</a></li>");
				$i++;
			} 
?>
	        </ul>
        </div>
</div>