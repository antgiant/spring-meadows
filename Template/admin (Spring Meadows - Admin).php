<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8>
<meta name = "viewport" content = "initial-scale = 1.0">
<title><?php echo $_SESSION["_"]["siteinfo"]["title"]." - ".$content["title"]; ?></title>
<link rel="stylesheet" type="text/css" media="all" href="/site/1/template/css/theme-test.css" />
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if !IE 8]>
  <link rel="search" href="http://www.springmeadows.org/search/description/open" type="application/opensearchdescription+xml" title="Spring Meadows Seventh-day Adventist Church" />
<![endif]-->
<script type="text/javascript" src="/site/1/template/script/jquery.fitvids.js"></script>
<script type="text/javascript" src="/site/1/template/script/jquery.lwtCountdown-1.0.js"></script>
<script type="text/javascript" src="/site/1/template/script/misc.js"></script>
<!--[if lt IE 8]>
<style type="text/css">
  .MenuBarHorizontal li{
    zoom: 1;
    display:inline
  }
</style>
<![endif]-->
</head>

<body>
<div id="siteIdentifier">
  <div id="titleWrapper" class="centerWrapper">
        <div class="floatRight" style="padding-bottom: 1em; margin-left: 1em;">##search##</div>
        <div id="socialIcons" class="floatRight" style="padding-bottom: 1em; ">
		<a href="http://www.facebook.com/pages/Spring-Meadows-Seventh-day-Adventist-Church/252734141407822"><img alt="Facebook Icon" src="/site/1/template/images/social/facebook.png" /></a> <a href="http://twitter.com/meadows_sda"><img alt="Twitter Icon" src="/site/1/template/images/social/twitter.png" /></a> <a href="http://youtube.com/wssdachurch"><img alt="Youtube Icon" src="/site/1/template/images/social/youtube.png" /></a> <a href="http://www.springmeadows.org/rss.php?zone=default"><img alt="RSS Icon" src="/site/1/template/images/social/rss.png" /></a> <a href="mailto:office@wssdachurch.com"><img alt="Email Icon" src="/site/1/template/images/social/email.png" /></a></div>
<!--    <a href="/"><img style="margin-top: -2em;" src="/site/1/template/images/Logo.png" alt="<? print ucwords($_SESSION[$su]['siteinfo']['name']); ?>"/></a>
-->
  </div>
</div>
<div id="pageArea" class="centerWrapper fullBoxShadow">
  <div class="headerWrapper lightfullBoxShadow">
    <div id="headerArea">
      <a href="/" title="Front Page"><img class="articleTop floatLeft" src="/site/1/template/images/logo_two_lines.png" alt="<? print $_SESSION[$su]['siteinfo']['name']; ?>" /></a>
      <nav class="topMenu serif italics articleTop">
        ##menu-horizontal##
      </nav>
    </div>
  </div>
  <section>
    <article id="contentArea">
      <div class="contentWrapper centerWrapper">
          <h1 style="text-align: left;"><?php echo $content["title"]; ?></h1>
          ##content##
      </div>
    </article>
  </section>
</div>
<footer id="footerArea">
  <div class="footerWrapper centerWrapper">
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
      $(function () {
        //Make the first element last so the sideshow behaves as expected.
        $('#superGraphic div.superElement:first-child').appendTo('#superGraphic');
        setInterval(
        function () {
          var rnd = (Math.random()*30) - 15;
          $('#superGraphic div.superElement:first-child').css({'display': 'none'})
            .children('.superImage').children('img').css({'-webkit-transform': 'rotate('+rnd+'deg)', '-moz-transform': 'rotate('+rnd+'deg)', '-o-transform': 'rotate('+rnd+'deg)', '-ms-transform': 'rotate('+rnd+'deg)', 'transform': 'rotate('+rnd+'deg)'}).end().end().appendTo('#superGraphic').prev().children('.superText').fadeOut(1000).end().end().children('.superText').fadeIn(1000).end().fadeIn(1000);
        }, 4000);
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

      //Make Directions Clickable
      $("#directions").click(function() {
        $("#directions").html('<form name="directions" action="http://maps.google.com/maps" method="get"><label for="saddr">&nbsp;Starting Address</label><br /><input type="text" name="saddr" /><input type="hidden" name="daddr" value="555 Markham Woods Road Longwood, FL 32779" /><input type="submit" value="Go" class="directionsSubmit"/></form>');
        document.directions.saddr.focus();
        navigator.geolocation.getCurrentPosition(gotDirections, noDirections, {enableHighAccuracy:true, maximumAge:30000, timeout:300000});
        return false;
      });
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
      //Ensure that tables are visible horizontally
      $("table").parent().css("overflow-x", "auto");
      $(document).ready(function(){ $(".video").fitVids(); });
    </script>
  </div>
</footer>
</html>
