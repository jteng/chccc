<?php 
function switchLanguage($target){	
	$uri=$_SERVER["REQUEST_URI"];
	$language="en";
	if(preg_match("/\/zh\//",$uri)){
		$language="zh";
	}
	
	if($target!=$language){
	
		$pattern="/\/".$language."\//";
		$replacement="/".$target."/";
		
		$targetUri=preg_replace("/\/".$language."\//","/".$target."/",$uri);
		if(file_exists("$_SERVER[DOCUMENT_ROOT]$targetUri"))
			print $targetUri;
		else print "/$target/index.php";
	}else print $uri;
 
}

?>
   <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="/index.php">櫻桃山華人基督教會</a></h1>
          <h2>Together We Serve</h2>
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="/zh/index.php">主頁</a></li>
            <li><a href="/zh/aboutus/statement.php">簡介</a>
               <ul>
                <li><a href="/zh/aboutus/statement.php">教會信仰</a></li>
                <li><a href="/zh/aboutus/vision.php">教會異象</a></li>
                <li><a href="/zh/aboutus/history.php">教會歷史</a></li>
                <li><a href="/zh/aboutus/map.php">地圖</a></li>
                <li><a href="/zh/aboutus/contactus.php">聯絡我們</a></li>
              </ul>	
            </li>
            <li><a href="/zh/worship/children_worship.php">崇拜</a>
              <ul>
                <li><a href="/zh/worship/children_worship.php">兒童崇拜</a></li>
                <li><a href="/zh/worship/hymns.php">詩歌</a></li>
                <li><a href="/zh/worship/messages.php">網絡信息</a></li>
                <li><a href="/zh/worship/worship_time.php">崇拜時間</a></li>
              </ul>	
            </li>
            <li><a href="/zh/community/community_ministry.php">團契與社區</a>
              <ul>
                <li><a href="/zh/community/community_ministry.php">社區事工</a></li>
                <li><a href="/zh/community/children_ministry.php">團契小組</a></li>
              </ul>
            </li>
            <li><a href="/events.php">最新活動</a></li>
            <li><a href="<?php switchLanguage('en'); ?>">English</a></li>
          </ul>
        </div>
      </nav>
    </header>