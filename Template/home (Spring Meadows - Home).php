<?php
if (stripos($_SERVER["HTTP_HOST"], "www.springmeadows.org") === FALSE) {
Header("HTTP/1.1 301 Moved Permanently");
Header ("Location: http://www.springmeadows.org".$_SERVER["REQUEST_URI"]);
exit;
}
//Determine time till next live stream
  $next = mysql_query("select *, TIMESTAMPDIFF(SECOND, STR_TO_DATE('".date("Y-m-d H:i:s", time() + (5*60 + 15))."','%Y-%m-%d %H:%i:%S'), STR_TO_DATE(CONCAT(DisplayStart, ' ', StartTime),'%Y-%m-%d %H:%i:%S')) as SecondsTillLive from calendar_details where active = 1 and CategoryID = 13 and STR_TO_DATE(CONCAT(DisplayStart, ' ', StartTime),'%Y-%m-%d %H:%i:%S') >= STR_TO_DATE('".date("Y-m-d H:i:s")."','%Y-%m-%d %H:%i:%S') order by DisplayStart desc, StartTime desc  limit 1");
  $next_event = mysql_fetch_assoc($temp);
  $reload = $next_event["SecondsTillLive "];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8>
<meta name = "viewport" content = "initial-scale = 1.0">
<meta name="google-site-verification" content="0NKzJjrbdhMjBsKwO2TecxYzHQe8KK46rckvYfn7F0M" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed for springmeadows.org" href="/rss.php?zone=default" />
<title><?php echo $_SESSION["_"]["siteinfo"]["title"]." - ".$content["title"]; ?></title>
<link rel="stylesheet" type="text/css" media="all" href="/site/1/template/css/theme.css" />
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if !IE 8]>
  <link rel="search" href="http://www.springmeadows.org/search/description/open" type="application/opensearchdescription+xml" title="Spring Meadows Seventh-day Adventist Church" />
<![endif]-->
<script type="text/javascript" src="/site/1/template/script/jquery.fitvids.js"></script>
<script type="text/javascript" src="/site/1/template/script/jquery.lwtCountdown-1.0.js"></script>
<script src="/site/1/template/script/jquery.bxslider/jquery.bxslider.min.js"></script>
<link href="/site/1/template/script/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript" src="/site/1/template/script/misc.js"></script>
<!--[if lt IE 8]>
<style type="text/css">
  .MenuBarHorizontal li{
    zoom: 1;
    display:inline
  }
</style>
<![endif]-->
<style>
  table {
    display:none;
  }
</style>
</head>

<body>
<div id="pageArea" class="centerWrapper fullBoxShadow">
  <div class="floatRight" style="margin-left: 1em; margin-right:1px;">##search##</div>
  <div class="headerWrapper lightfullBoxShadow" style="margin-bottom:0; margin-top:30px">
    <div id="headerArea" style="background-image:none;">
     <a href="/" title="Front Page"><img alt="<? print $_SESSION[$su]['siteinfo']['name']; ?>" class="articleTop floatLeft" src="/site/1/template/images/logo_two_lines_new.png" /></a>

     <nav class="topMenu serif italics articleTop" style="margin-bottom:0; margin-top:0">##menu-horizontal##</nav>
    </div>
  </div>
  <section>
    <article id="contentArea">
      <div class="contentWrapper centerWrapper">
<!--        ##breadcrumbs##-->
        ##content##
      <aside></aside>
      </div>
    </article>
  </section>
</div>
<footer id="footerArea">
  <div class="footerWrapper centerWrapper" style="border: 0; padding-top: 0;">
       <p style="float:left">5783 North Ronald Reagan Blvd. ♦ Sanford, FL, 32773 ♦ <a href="tel:4073271190">407-327-1190</a></p>
       <div class="floatRight" id="socialIcons">
            <span id="directions">
<?php
                    $ver = array();
                    $dir = '';
                    $dest = urlencode('5783 N Ronald Reagan Blvd. Sanford, FL 32773');
                    preg_match("/.*CPU [^ ]*( ){0,1}OS ([0-9]+)_([0-9]+) like Mac OS.*/", $_SERVER['HTTP_USER_AGENT'], $ver);
                    //Check for IOS Version 6 or above
                    //If you are editing this be sure to edit the template as well.
                    $dir = 'http://maps.google.com/maps?saddr=&amp;daddr='.$dest;
                    if(isset($ver[2]) && $ver[2] >= 6) {
                        $dir = 'http://maps.apple.com/maps?daddr='.$dest;
                    }
                  ?>
		<a href="<?php echo $dir; ?>"><img alt="Directions Icon" src="/site/1/template/images/social/directions.png" /></a></span>
		<a href="http://www.facebook.com/pages/Spring-Meadows-Seventh-day-Adventist-Church/252734141407822"><img alt="Facebook Icon" src="/site/1/template/images/social/facebook.png" /></a> <a href="http://twitter.com/meadows_sda"><img alt="Twitter Icon" src="/site/1/template/images/social/twitter.png" /></a> <a href="http://youtube.com/springmeadowssda"><img alt="Youtube Icon" src="/site/1/template/images/social/youtube.png" /></a> <a href="mailto:office@springmeadows.org"><img alt="Email Icon" src="/site/1/template/images/social/email.png" /></a></div>
    <div class="floatLeft requiredFooter">
      ##adminlinks##
      ##footerlinks##
     <span class="footer">Developed by Spring Meadows Team</span>
    </div>
    <script src="/site/1/template/script/accessifyhtml5.jquery.min.js"></script> <script>AccessifyHTML5();</script>
    <!-- bob[if lt IE 9]>
      <script src="/site/1/template/script/sylvester.js"></script>
      <script src="/site/1/template/script/pb.transformie.min.js"></script>
    <! bob [endif]-->
    <script type="text/javascript">
      //Run Slideshow
      $(document).ready(function(){
        $('.bxslider').bxSlider({
          auto: true,
          autoHover: true,
          adaptiveHeight: true,
          video: true,
          useCSS: false,
          tickerHover: true,
          minSlides: 1,
          maxSlides: 1,
          pause: 5000,
          speed: 1000,
        });
      });

      //Make Audio Work
      $(".control_audio").click(function() {
        if (document.createElement('audio').canPlayType) {
          if (!document.createElement('audio').canPlayType('audio/mpeg')) {
            //Toggle flash audio
           if (this.firstChild.nextSibling.nextElementSibling.nextElementSibling.src.indexOf("/site/1/template/images/Pause_Button.png") != -1) {
             this.firstChild.nextSibling.nextSibling.nextSibling.SetVariable("method:pause", "");
              this.firstChild.nextSibling.nextElementSibling.nextElementSibling.src = "/site/1/template/images/Play_Button.png";
            } else {
              this.firstChild.nextSibling.nextSibling.nextSibling.SetVariable("method:play", "");
              this.firstChild.nextSibling.nextElementSibling.nextElementSibling.src = "/site/1/template/images/Pause_Button.png";
            }
          } else {
            //Toggle HTML5 Audio
            if (this.firstChild.nextSibling.paused == false) {
              this.firstChild.nextSibling.pause();
              this.firstChild.nextSibling.nextElementSibling.nextElementSibling.src = "/site/1/template/images/Play_Button.png";
            } else {
              this.firstChild.nextSibling.play();
              this.firstChild.nextSibling.nextElementSibling.nextElementSibling.src = "/site/1/template/images/Pause_Button.png";
            }
          }
        }
        return false;
      });

<?php
  $ver = array();
  preg_match("/.*CPU [^ ]*( ){0,1}OS ([0-9]+)_([0-9]+) like Mac OS.*/", $_SERVER['HTTP_USER_AGENT'], $ver);
  //Check for IOS Version 6 or above
  if(isset($ver[2]) && $ver[2] >= 6) {
    //Do Nothing
  }
  else {
?>
      //Make Directions Clickable
      $("#directions").click(function() {
        $("#directions").html('<form name="directions" action="http://maps.google.com/maps" method="get"><label for="saddr">&nbsp;Starting Address</label><br /><input type="text" name="saddr" /><input type="hidden" name="daddr" value="5783 N Ronald Reagan Blvd. Sanford, FL 32773" /><input type="submit" value="Go" class="directionsSubmit"/></form>');
        document.directions.saddr.focus();
        navigator.geolocation.getCurrentPosition(gotDirections, noDirections, {enableHighAccuracy:true, maximumAge:30000, timeout:300000});
        return false;
      });
<?php } ?>
      function gotDirections(geo) {
        document.directions.saddr.value = geo.coords.latitude+", "+geo.coords.longitude;
//        setTimeout("document.directions.submit()", 500);
        document.directions.submit();
      }
      function noDirections(error) {
        switch(error.code) {
          case error.TIMEOUT:
            //document.directions.saddr.value = "Timeout";
            // Try Again.
            navigator.geolocation.getCurrentPosition(gotDirections, noDirections, {enableHighAccuracy:true, maximumAge:1000, timeout:300000});
            break;
          case error.POSITION_UNAVAILABLE:
            //document.directions.saddr.value = "Position Unavaliable";
            // Try Again.
            navigator.geolocation.getCurrentPosition(gotDirections, noDirections, {enableHighAccuracy:true, maximumAge:1000, timeout:300000});
            break;
          case error.UNKNOWN_ERROR:
            //document.directions.saddr.value = "Unknown Error";
            // Try Again.
            navigator.geolocation.getCurrentPosition(gotDirections, noDirections, {enableHighAccuracy:true, maximumAge:1000, timeout:300000});
            break;
          case error.PERMISSION_DENIED:
            //document.directions.saddr.value = "Permission Denied";
            // Give Up.
            break;
            default:
              document.directions.saddr.value = "Another Error";
          // give up on all the other error cases.
        };
      }
      $(document).ready(function(){ $(".video").fitVids(); });
      //Reload page when next live stream is avaliable
      setTimeout( "window.location.reload(true)", <?php echo $reload; ?>*1000 );
    </script>
  </div>
</footer>
</html>