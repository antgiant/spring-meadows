<style type="text/css">.banner {
    width:100%;
  }
</style>
<?php
  $temp = mysql_query("select * from calendar_details where active = 1 and CategoryID = 13 and DisplayStart <= '".date("Y-m-d")."' and DisplayStop >= '".date("Y-m-d")."' and StartTime <= '".date("H:i:s")."' and StopTime >= '".date("H:i:s")."'");
  While($tr = mysql_fetch_assoc($temp)) {
        $DB_Data[] = $tr;
  }
        $no_live_stream = array(
                                 '10-29-2011' => "We apologize but today's live stream is not possible due to a power outage.",
                                 '11-12-2011' => "We apologize but today's live stream is not available due to a church retreat.",
//                                 '9-29-2012' => "We apologize but we are currently having technical problems with today's live stream.",
                                 '10-13-2012' => "We apologize but today's live stream is not available due to technical problems.",
//                                 '10-27-2012' => "We apologize but today's live stream is currently having technical problems.",

                               );
        date_default_timezone_set("America/New_York");
        if((Date("NHi") >= 61030 && Date("NHi") <= 61300 && !array_key_exists(Date("n-j-Y"), $no_live_stream)) || $_GET['livetest'] == "golive" || isset($DB_Data[0])) {
          If (mysql_ping()) {
            $temp = mysql_query("select title, page_id from article where title like 'Bulletin %'");
            While($tr = mysql_fetch_assoc($temp)) {
              preg_match('/([0-9]{1,4})[_./-]([0-9]{1,2})[_./-]([0-9]{1,4})/i', $tr["title"], $matches);
              If (isset($matches[1])) {
                If (strlen($matches[1]) == 4) {
                  $bulletin_db[$matches[1]."-".($matches[2] - 0)."-".($matches[3] - 0)] = "/article/".$tr["page_id"];
                }
                If (strlen($matches[3]) == 4) {
                  $bulletin_db[$matches[3]."-".($matches[1] - 0)."-".($matches[2] - 0)] = "/article/".$tr["page_id"];
                }
                If (strlen($matches[3]) != 4 && strlen($matches[1]) != 4) {
                  $bulletin_db["20".$matches[3]."-".($matches[1] - 0)."-".($matches[2] - 0)] = "/article/".$tr["page_id"];
                }
              }
            }
            $temp = mysql_query("select title, speaker, file_date, link from podcast where file_date = '".date("Y-m-d")."' and zone = 1 Order by status desc");
            $tr = mysql_fetch_assoc($temp);
          }
          if (isset($DB_Data[0])) {
            $tr["title"] = $DB_Data[0]["Title"];
            $tr["speaker"] = $DB_Data[0]["ContactName"];
          }
          echo '<h3>Live Stream of Service</h3>';
            If (isset($tr["title"])) {
              Echo "<h4>".$tr["title"].(isset($tr["speaker"]) && trim($tr["speaker"]) != ""?" (".$tr["speaker"].")":"")."</h4>";
            }
            if (isset($bulletin_db[date("Y-n-j")])) {
            Echo "<p><a href='".$bulletin_db[date("Y-n-j")]."' target = '_blank'>Bulletin</a></p>";
            }
          echo '<iframe id="liveStream" width="640px" heigth="510px" src="http://stream.adventistuniversity.edu/SmoothStreamingPlayer.html" >&nbsp;  </iframe>';
//          echo '<iframe id="liveStream" width="640px" heigth="510px" src="http://www.youtube.com/embed/yTpD7JEwTsA" frameborder="0" allowfullscreen></iframe>';
//          echo '<iframe id="liveStream" width="640px" heigth="510px" src="http://streaming.priserv.com/SmoothStreamingPlayer.html" >&nbsp;  </iframe>';
          echo "<script>";
          echo "  _gaq.push(function() {";
          echo "  var pageTracker = _gat.b._getTrackerByName();";
          echo "  var iframe = document.getElementById('liveStream');";
          echo "  iframe.src = b.pageTracker._getLinkerUrl('https://mars.adu.edu/SpringMeadowsSDA.html');
});";
          echo "</script>";
          if (!isset($_GET['chattest']) || $_GET['chattest'] != "chat") {
//echo "<div style='display:none'>";
          }
?><script id="sid0010000016015796269">(function() {function async_load(){s.id="cid0010000016015796269";s.src='http://st.chatango.com/js/gz/emb.js';s.style.cssText="width:350px;height:520px;";s.async=true;s.text='{"handle":"springmeadowschurch","styles":{"b":100,"f":50,"l":"999999","q":"999999","r":100,"s":1,"t":0,"w":0}}';var ss = document.getElementsByTagName('script');for (var i=0, l=ss.length; i < l; i++){if (ss[i].id=='sid0010000016015796269'){ss[i].id +='_';ss[i].parentNode.insertBefore(s, ss[i]);break;}}}var s=document.createElement('script');if (s.async==undefined){if (window.addEventListener) {addEventListener('load',async_load,false);}else if (window.attachEvent) {attachEvent('onload',async_load);}}else {async_load();}})();</script><?php
          if (!isset($_GET['chattest']) || $_GET['chattest'] != "chat") {
//echo "</div>";
          }
        }
        else {
      ?>
<div id="superGraphic" style="height:initial; padding-top:0.5em; width:99%;">
<ul class="bxslider">
	<li><a href="/article/102"><img alt="Welcome" class="banner" src="/site/1/template/images/temp/Pastor.jpg" /></a></li>
	<li><a href="https://www.groupvbspro.com/vbs/ez/SpringMeadows"><img alt="Vacation Bible School" class="banner" src="/site/1/template/images/temp/VBS.jpg" /></a></li>
	<li><a href="/article/67"><img alt="Our Miracle" class="banner" src="/site/1/template/images/temp/Church.jpg" /></a></li>
	<li><a href="/article/3"><img alt="Ministries" class="banner" src="/site/1/template/images/temp/Children.jpg" /></a></li>
	<li><a href="/article/120"><img alt="Missions" class="banner" src="/site/1/template/images/temp/Missions.jpg" /></a></li>
</ul>
</div>
<?php if (array_key_exists(Date("n-j-Y"), $no_live_stream)) { ?>

<div>
<p><?php echo $no_live_stream[Date("n-j-Y")]; ?></p>
</div>
<?php } ?><?php } ?>

<div style="text-align: center;">
<div class="third" style="margin-right: 0px; border-right-width: 0px;">
<p id="directions"><?php 
                    $ver = array();
                    $link = "";
                    $dest = urlencode('5783 N Ronald Reagan Blvd. Sanford, FL 32773');
                    preg_match("/.*CPU [^ ]*( ){0,1}OS ([0-9]+)_([0-9]+) like Mac OS.*/", $_SERVER['HTTP_USER_AGENT'], $ver);
                    //Check for IOS Version 6 or above
                    //If you are editing this be sure to edit the template as well.
                    if(isset($ver[2]) && $ver[2] >= 6) {
                      $link =  'http://maps.apple.com/maps?daddr='.$dest;
                    } 
                    else {
                      $link =  'http://maps.google.com/maps?saddr=&amp;daddr='.$dest;
                    }
                    Echo '			<a href="'.$link.'"><img src="/site/1/template/images/direction_button.png" /></a>';
                  ?></p>
</div>

<div class="third" style="margin-right: 0px; border-right-width: 0px;">
<p><a href="/article/92"><img src="/site/1/template/images/sermon_button.png" /></a></p>
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

<audio preload=""><source src="" type="audio/mpeg" /></audio>
<object class="playerpreview" data="/site/1/template/script/player_mp3_js.swf" height="0" id="flash_obj" type="application/x-shockwave-flash" width="0"><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><source src="" type="audio/mpeg" /><param name="movie" value="/site/1/template/script/player_mp3_js.swf" />\n<param name="AllowScriptAccess" value="always" />\n<param name="FlashVars" value="mp3=" /></object><img alt="Play Button" class="floatLeft third_thumbnail" src="/site/1/template/images/Play_Button.png" /> <span class="sermon_title"><a href="">Auto-generated Sermon Title</a></span>

<p class="tighter_text">Auto-generated Speaker Name</p>
<?php } ?></div>

<div class="third" style="margin-right: 0px; border-right-width: 0px;">
<p><a href="/calendar.php?view=month"><img src="/site/1/template/images/upcoming_events_new.jpg" /></a></p>
##calendarlist##</div>
</div>
