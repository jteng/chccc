<?php include 'DBConfig.php'; ?>		
<?php
$group_id = $_GET['id'];

mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');

$query="SELECT * FROM ch_group where group_id = $group_id";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$group_name =mysql_result($result, 0, "group_name"); 

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 <script type="text/javascript">
	function deletePhoto(photo_id) {
		if (confirm('������������')) {
			//alert (document.getElementById('gid').value);
			document.getElementById("pid").value = photo_id;
			document.getElementById("command").value = "delete";
			document.getElementById("frmDelete").submit(); 
		} 
		
	}
</script>
</head>
<body>
<h1><?php echo $group_name ?>������������</h1>

<br>
<fieldset style="width:600px" >
	<legend align="left"><strong>������������</strong></legend>
	<form action="GroupPhotoUD.php" id="frmPhoto" method="post" enctype="multipart/form-data">
		<input type="hidden" name="gid" id="gid" value= "<?php echo $group_id ?>" />
		<input type="file" name="file" id="file"><br>
		��������������� <input type="text" name="photo_description" id="photo_description" />
		<input type="submit" name="submit" value="Submit">
	</form>
</fieldset>

<form action="GroupPhotoUD.php" id="frmDelete" method="post" >
		<input type="hidden" name="group_id" id="group_id" value= "<?php echo $group_id ?>" />
		<input type="hidden" name="pid" id="pid" value= "" />
		<input type="hidden" name="photo_name" id="photo_name" value= "" />
		<input type="hidden" name="command" id="command" value="" />
	</form>

<p>
<?php
mysql_connect($db_host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
mysql_query ('SET NAMES utf8');

$query="SELECT gp.photo_id as photo_id, gp.photo_path, gp.photo_description, gp.group_id, g.group_name " .
		"FROM ch_group_photo gp inner join ch_group g on gp.group_id = g.group_id where gp.group_id = $group_id";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

if ($num>0){
	echo "<table width='60%' border='1'></tr>";
	$i=0;
	
	while ($i < $num) {
		$group_id  =mysql_result($result,$i,"group_id");
		$group_name =mysql_result($result,$i,"group_name"); 
		$photo_id = mysql_result($result,$i,"photo_id");
		$photo_path = mysql_result($result,$i,"photo_path");
		$photo_description  = mysql_result($result,$i,"photo_description");
	?>
		<tr>
			<td>
				<img src="/images/group/<?php echo $group_id ?>/<?php echo $photo_path?>" /><br>
				<?php echo $photo_description ?>
			</td>
			
			<td valign="top"><a href="#" onclick="javascript:deletePhoto('<?php echo $photo_id?>');">Delete</a></td>
		</tr>
	<?php	
		$i++;
	}
	
	echo "</table>";
}
?>
</body>
</html>
