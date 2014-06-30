<?php
if (FALSE) {
?>
<h1>Please do not Edit</h1>
<!--
<?php
}
else {
?>
<style type="text/css">.banner {
    width:100%;
  }
</style>
<?php
  //Get live stream event that is live now, and went live most recently.
   date_default_timezone_set("America/New_York");
  $temp = mysql_query("select *, TIMESTAMPDIFF(SECOND, STR_TO_DATE('".date("Y-m-d H:i:s")."','%Y-%m-%d %H:%i:%S'), STR_TO_DATE(CONCAT(DisplayStart, ' ', StartTime),'%Y-%m-%d %H:%i:%S')) as SecondsTillLive from calendar_details where active = 1 and CategoryID = 13 and STR_TO_DATE(CONCAT(DisplayStart, ' ', StartTime),'%Y-%m-%d %H:%i:%S') <= STR_TO_DATE('".date("Y-m-d H:i:s", time() - (5*60 + 15))."','%Y-%m-%d %H:%i:%S') and STR_TO_DATE(CONCAT(DisplayStop, ' ', StopTime),'%Y-%m-%d %H:%i:%S') >= STR_TO_DATE('".date("Y-m-d H:i:s")."','%Y-%m-%d %H:%i:%S') order by DisplayStart asc, StartTime asc limit 1");
  $DB_Data = mysql_fetch_assoc($temp);
        if($_GET['livetest'] == "golive" || isset($DB_Data["ContactWeb"])) {
          if ($_GET['livetest'] == "golive" && !isset($DB_Data["ContactWeb"])) {
            $next = mysql_query("select *, TIMESTAMPDIFF(SECOND, STR_TO_DATE('".date("Y-m-d H:i:s", time() + (5*60 + 15))."','%Y-%m-%d %H:%i:%S'), STR_TO_DATE(CONCAT(DisplayStart, ' ', StartTime),'%Y-%m-%d %H:%i:%S')) as SecondsTillLive from calendar_details where active = 1 and CategoryID = 13 and STR_TO_DATE(CONCAT(DisplayStart, ' ', StartTime),'%Y-%m-%d %H:%i:%S') >= STR_TO_DATE('".date("Y-m-d H:i:s")."','%Y-%m-%d %H:%i:%S') order by DisplayStart asc, StartTime asc  limit 1");
            $DB_Data = mysql_fetch_assoc($next);
            $DB_Data["SecondsTillLive"] = "30";
          }
          $serviceURL = $DB_Data["ContactWeb"];
          echo '<h3>Live Stream of Service</h3>';
          if ($DB_Data["SecondsTillLive"] > 0) {
            $tmp = ($DB_Data["SecondsTillLive"] < 5*60 + 15?$DB_Data["SecondsTillLive"]:5*60 + 15);
            echo '<iframe id="liveStream" src="http://www.youtube.com/embed/A-KIbuFDcMw?autoplay=1&start='.((5*60 + 15) - $tmp).'" frameborder="0" allowfullscreen></iframe>';
            echo "<script>";
            echo '  setTimeout( "window.location = '."'".$serviceURL."'".'", '.$tmp.'*1000 );';
            echo "</script>";
          }
          else {
            echo "<script>";
            echo "  window.location = '".$serviceURL."';";
            echo "</script>";
          }
        }
        else {
      ?>
<div id="superGraphic" style="height:initial; padding-top:0.5em; width:99%;">
<ul class="bxslider" style="margin:0"><?php
If (mysql_ping()) {
  $temp = mysql_query("select feature_image, feature_title, feature_url from feature where feature_status = 'active' and feature_zone = 1 and feature_activate_date <= '".date("Y-m-d")."' and feature_expire_date >= '".date("Y-m-d")."'");
  While($tr = mysql_fetch_assoc($temp)) {
    echo "<li><a href='".$tr['feature_url']."'><img alt='".$tr['feature_title']."' class='banner' src='/site/1/feature/".$tr['feature_image']."' /></a></li>\n";
  }
  $temp = mysql_query("select feature_image, feature_title, feature_url from feature where feature_status = 'active' and feature_zone = 1 and feature_activate_date <= '".date("Y-m-d")."' and feature_expire_date = '0000-00-00'");
  While($tr = mysql_fetch_assoc($temp)) {
    echo "<li><a href='".$tr['feature_url']."'><img alt='".$tr['feature_title']."' class='banner' src='/site/1/feature/".$tr['feature_image']."' /></a></li>\n";
  }
} else {
?>
	<li><a href="/article/67"><img alt="Our Miracle" class="banner" src="/site/1/template/images/temp/Church.jpg" /></a></li>
	<li><a href="/article/3"><img alt="Ministries" class="banner" src="/site/1/template/images/temp/Children.jpg" /></a></li>
	<?php
}
?>
</ul>
</div>
<?php } ?>
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
            $temp = mysql_query("select title, page_id from article where title like 'Bulletin %'");
            While($tr = mysql_fetch_assoc($temp)) {
              preg_match('/([0-9]{1,4})[_\\.\/-]([0-9]{1,2})[_\\.\/-]([0-9]{1,4})/i', $tr["title"], $matches);
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
            if (isset($bulletin_db[date("Y-n-j", strtotime($podcast[0]["file_date"]))])) {
              $temp = "<a href='".$bulletin_db[date("Y-n-j", strtotime($podcast[0]["file_date"]))]."' target = '_blank'>Bulletin</a>";
            } else {
              $temp = "";
            }
}
if (count($podcast) > 0) {
 Echo "<a class='control_audio' href='".trim($podcast[0]["link"])."' >\n    <audio preload>\n      <source src='".trim($podcast[0]["link"])."' type='audio/mpeg' />\n    </audio>\n      <object id='flash_obj' class='playerpreview' type='application/x-shockwave-flash' data='/site/1/template/script/player_mp3_js.swf' width='0' height='0'>\n        <param name='movie' value='/site/1/template/script/player_mp3_js.swf' />\n        <param name='AllowScriptAccess' value='always' />\n        <param name='FlashVars' value='mp3=".trim($podcast[0]["link"])."' />\n      </object>\n      <img class='floatLeft third_thumbnail' src='/site/1/template/images/Play_Button.png' alt='Play Button' /></a><span class='sermon_title'><a href='".trim($podcast[0]["link"])."' >".str_replace("\\", "", $podcast[0]["title"])."</a></span><p class='tighter_text'>".str_replace("\\", "", $podcast[0]["speaker"])."<br /><br />".$temp."</p>";
}
If (false) {
?>

<audio preload=""><source src="" type="audio/mpeg" /></audio>
<object class="playerpreview" data="/site/1/template/script/player_mp3_js.swf" height="0" id="flash_obj" type="application/x-shockwave-flash" width="0"><source src="" type="audio/mpeg" /><param name="movie" value="/site/1/template/script/player_mp3_js.swf" />\n<param name="AllowScriptAccess" value="always" />\n<param name="FlashVars" value="mp3=" /></object><img alt="Play Button" class="floatLeft third_thumbnail" src="/site/1/template/images/Play_Button.png" /> <span class="sermon_title"><a href="">Auto-generated Sermon Title</a></span>

<p class="tighter_text">Auto-generated Speaker Name</p>
<?php } ?></div>

<div class="third" style="margin-right: 0px; border-right-width: 0px;">
<p><a href="/calendar.php?view=month"><img src="/site/1/template/images/events_button.png" /></a></p>
##calendarlist##</div>
</div>
<?php
}
if (FALSE) {
?>
--><?php
}
?>