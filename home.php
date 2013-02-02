<div style="text-align: center;">
	<div class="third" style="margin-right: 0px; border-right-width: 0px;">
		<h3>
			Welcome&nbsp;</h3>
		<p>
			I am delighted that you are visiting our website. We want to share our love for Jesus with you and provide meaningful resources that will support your spiritual growth. We offer vibrant nurturing programs for seniors, couples, singles, youth, and children which include engaging activities during the week.</p>
		<p>
			We would love for you to visit us in our new facility and be touched by the Holy Spirit through our worship services which are:</p>
		<p style="text-align: left;">
			<strong>Saturdays</strong>:<br />
			<em>9:30 am</em> Bible study for adults, youth, and children<br />
			<em>10:45 am</em> Worship<br />
			<br />
			A live stream of the worship service is available on the top of this page every Sabbath (Saturday) morning starting at 10:45 am.</p>
		<p>
			I look forward to meeting each of you,</p>
		<p>
			With Christian love,</p>
		<p>
			Pastor Frank</p>
		<h3 id="directions">
			<?php
                    $ver = array();
                    $dest = urlencode('5783 N Ronald Reagan Blvd. Sanford, FL 32773');
                    preg_match("/.*CPU [^ ]*( ){0,1}OS ([0-9]+)_([0-9]+) like Mac OS.*/", $_SERVER['HTTP_USER_AGENT'], $ver);
                    //Check for IOS Version 6 or above
                    //If you are editing this be sure to edit the template as well.
                    if(isset($ver[2]) && $ver[2] >= 6) {
                      Echo '			<a href="http://maps.apple.com/maps?daddr='.$dest.'">Click for Directions</a>';
                    }
                    else {
                      Echo '			<a href="http://maps.google.com/maps?saddr=&amp;daddr='.$dest.'">Click for Directions</a>';
                    }
                  ?></h3>
	</div>
	<div class="third" style="margin-right: 0px; border-right-width: 0px;">
		<h3>
			Thought For Today</h3>
		##rssdigest14##
		<h3>
			Latest Message</h3>
		<?php
If (mysql_ping()) {
  $temp = mysql_query("select title, speaker, file_date, link from podcast where zone = 1 and Status = 'active'  Order by file_date desc  LIMIT 1");
  while (($tr = mysql_fetch_assoc($temp)) != false) {
    $podcast[] = $tr;
  }
}
if (count($podcast) > 0) {
 Echo "<a class='control_audio' href='".trim($podcast[0]["link"])."' >\n    <audio preload>\n      <source src='".trim($podcast[0]["link"])."' type='audio/mpeg' />\n    </audio>\n      <object id='flash_obj' class='playerpreview' type='application/x-shockwave-flash' data='/site/1/template/script/player_mp3_js.swf' width='0' height='0'>\n        <param name='movie' value='/site/1/template/script/player_mp3_js.swf' />\n        <param name='AllowScriptAccess' value='always' />\n        <param name='FlashVars' value='mp3=".trim($podcast[0]["link"])."' />\n      </object>\n      <img class='floatLeft third_thumbnail' src='/site/1/template/images/Play_Button.png' alt='Play Button' /></a><span class='sermon_title'><a href='".trim($podcast[0]["link"])."' >".$podcast[0]["title"]."</a></span><p class='tighter_text'>".$podcast[0]["speaker"]."</p>";
}
If (false) {
?>
		<audio preload="">
			<a class="control_audio" href=""><source src="" type="audio/mpeg"></source></a></audio>
		<object class="playerpreview" data="/site/1/template/script/player_mp3_js.swf" height="0" id="flash_obj" type="application/x-shockwave-flash" width="0"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><source src="" type="audio/mpeg"><param name="movie" value="/site/1/template/script/player_mp3_js.swf" />\n<param name="AllowScriptAccess" value="always" />\n<param name="FlashVars" value="mp3=" /></source></source></source></source></source></source></source></source></object><img alt="Play Button" class="floatLeft third_thumbnail" src="/site/1/template/images/Play_Button.png" /> <span class="sermon_title"><a href="">Auto-generated Sermon Title</a></span>
		<p class="tighter_text">
			Auto-generated Speaker Name</p>
		<?php } ?>
		<p>
			<a href="http://www.springmeadows.org/article/92/rejoice/sermons">Past Sermons</a></p>
		<h3>
			<span style="font-family: georgia, serif;">Latest Blog Posts</span></h3>
		<span style="font-family: georgia, serif;">##rssdigest15##</span>
		<h3>
			Connect</h3>
		<div id="socialIcons">
			<a href="http://www.facebook.com/pages/Spring-Meadows-Seventh-day-Adventist-Church/252734141407822"><img alt="Facebook Icon" src="/site/1/template/images/social/facebook.png" /></a> <a href="http://twitter.com/meadows_sda"><img alt="Twitter Icon" src="/site/1/template/images/social/twitter.png" /></a> <a href="http://youtube.com/wssdachurch"><img alt="Youtube Icon" src="/site/1/template/images/social/youtube.png" /></a> <a href="http://www.springmeadows.org/rss.php?zone=default"><img alt="RSS Icon" src="/site/1/template/images/social/rss.png" /></a> <a href="mailto:office@wssdachurch.com"><img alt="Email Icon" src="/site/1/template/images/social/email.png" /></a></div>
	</div>
	<div class="third" style="margin-right: 0px; border-right-width: 0px;">
		<h3>
			In the next few days...</h3>
		##calendar## ##calendarlist##</div>
</div>
<br />
