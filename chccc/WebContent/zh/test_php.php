<!DOCTYPE HTML>
<html>

<head>
  <?php include '../common/head.php'; ?> 
  <link rel="Stylesheet" type="text/css" href="/css/smoothDivScroll.css" /> 
</head>

<body>


<?php require_once "$_SERVER[DOCUMENT_ROOT]/common/LanguageUtil.php" ?>
<?php
	$language = LanguageUtil::getCurrentLanguage();
	$title_news="�̕���Ϣ";
	$title_message="������Ϣ";
	$title_songs="����Ԋ��IԊ";
	if("en"== $language){
		$title_news="News";
		$title_message="Sunday Message";
		$title_songs="Songs";
	}
?>
<div class="content">
     <div class="latest_message">
          <h3><?php echo ($title_songs);?></h3>
		  <?php include "$_SERVER[DOCUMENT_ROOT]/common/content/list_all_hymns.php"; ?>
        </div>
</div>

<!--
  <script type="text/javascript" src="http://webplayer.yahooapis.com/player.js"></script>
-->
</body>
</html>