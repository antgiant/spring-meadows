<?php
if (stripos($_SERVER["HTTP_HOST"], "www.springmeadows.org") === FALSE) {
Header("HTTP/1.1 301 Moved Permanently");
Header ("Location: http://www.springmeadows.org".$_SERVER["REQUEST_URI"]);
exit;
}
//Calculate time till next live stream
$next_sat = strtotime('next saturday 10:30');
$this_sat = strtotime('this saturday 10:30');
if (time() < $this_sat) {
  $reload = $this_sat - time() + 30;
}
else {
  $reload = $next_sat - time() + 30;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8>
<meta name = "viewport" content = "initial-scale = 1.0">
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
        <div class="floatRight" style="padding-bottom: 1em;">##search##</div>
  </div>
</div>
<div id="pageArea" class="centerWrapper fullBoxShadow">
  <div class="headerWrapper lightfullBoxShadow">
    <div id="headerArea">
      <?php
        $no_live_stream = array(
                                 '10-29-2011' => "We apologize but today's live stream is not possible due to a power outage.",
                                 '11-12-2011' => "We apologize but today's live stream is not available due to a church retreat.",
//                                 '9-29-2012' => "We apologize but we are currently having technical problems with today's live stream.",
                                 '10-13-2012' => "We apologize but today's live stream is not available due to technical problems.",
//                                 '10-27-2012' => "We apologize but today's live stream is currently having technical problems.",

                               );
        date_default_timezone_set("America/New_York");
        if((Date("NHi") >= 61030 && Date("NHi") <= 61300 && !array_key_exists(Date("n-j-Y"), $no_live_stream)) || $_GET['livetest'] == "golive") {
          If (mysql_ping()) {
            $temp = mysql_query("select title, speaker, file_date, link from podcast where file_date = '".date("Y-m-d")."' and zone = 1 Order by status desc");
            $tr = mysql_fetch_assoc($temp);
          }
          echo '      <img src="/site/1/template/images/logo_two_lines_front.png" alt="'.$_SESSION[$su]['siteinfo']['name'].'" />';
          echo '<h3>Live Stream of Service</h3>';
            If (isset($tr["title"])) {
              Echo "<h4>".$tr["title"].(isset($tr["speaker"]) && trim($tr["speaker"]) != ""?" (".$tr["speaker"].")":"")."</h4>";
            }
          echo '<iframe id="liveStream" src="http://streaming.priserv.com/SmoothStreamingPlayer.html" >&nbsp;  </iframe>';
          echo "<script>";
          echo "  _gaq.push(function() {";
          echo "  var pageTracker = _gat.b._getTrackerByName();";
          echo "  var iframe = document.getElementById('liveStream');";
          echo "  iframe.src = b.pageTracker._getLinkerUrl('http://streaming.priserv.com/SmoothStreamingPlayer.html');
});";
          echo "</script>";
          if (!isset($_GET['chattest']) || $_GET['chattest'] != "chat") {
echo "<div style='display:none'>";
          }
?>
            <script id="sid0010000016015796269">(function() {function async_load(){s.id="cid0010000016015796269";s.src='http://st.chatango.com/js/gz/emb.js';s.style.cssText="width:350px;height:520px;";s.async=true;s.text='{"handle":"springmeadowschurch","styles":{"b":100,"f":50,"l":"999999","q":"999999","r":100,"s":1,"t":0,"w":0}}';var ss = document.getElementsByTagName('script');for (var i=0, l=ss.length; i < l; i++){if (ss[i].id=='sid0010000016015796269'){ss[i].id +='_';ss[i].parentNode.insertBefore(s, ss[i]);break;}}}var s=document.createElement('script');if (s.async==undefined){if (window.addEventListener) {addEventListener('load',async_load,false);}else if (window.attachEvent) {attachEvent('onload',async_load);}}else {async_load();}})();</script>
<?php
          if (!isset($_GET['chattest']) || $_GET['chattest'] != "chat") {
echo "</div>";
          }
        }
        else {
      ?>
      <img id="titleImage" src="/site/1/template/images/logo_two_lines_front.png" alt="<? print $_SESSION[$su]['siteinfo']['name']; ?>" />
      <div id="superGraphic">
        <div class="superElement first">
          <div class="superImage">
            <img src="/site/1/template/images/1_A_Caring_Church.jpg" alt="A Caring Church" />
          </div>
          <p class="superText">
            A<br />
            Caring<br />
            Church
          </p>
        </div>
        <div class="superElement">
          <div class="superImage">
            <img src="/site/1/template/images/2_A_Friendly_Church.jpg" alt="A Friendly Church" />
          </div>
          <p class="superText">
            A<br />
            Friendly<br />
            Church
          </p>
        </div>
        <div class="superElement">
          <div class="superImage">
            <img src="/site/1/template/images/3_A_Loving_Church.jpg" alt="A Loving Church" />
          </div>
          <p class="superText">
            A<br />
            Loving<br />
            Church
          </p>
        </div>
        <div class="superElement">
          <div class="superImage">
            <img src="/site/1/template/images/4_A_Forgiving_Church.jpg" alt="A Forgiving Church" />
          </div>
          <p class="superText">
            A<br />
            Forgiving<br />
            Church
          </p>
        </div>
        <div class="superElement">
          <div class="superImage">
            <img src="/site/1/template/images/6_An_Encouraging_Church.jpg" alt="An Encouraging Church" />
          </div>
          <p class="superText">
            An<br />
            Encouraging<br />
            Church
          </p>
        </div>
        <div class="superElement">
          <div class="superImage">
            <a href="http://www.springmeadows.org/calendar.php?action=event_details&id=278&date=2012-12-01"><img src="/site/1/template/images/Daniel_Seminar.png" alt="Prophecy Seminar" /></a>
          </div>
          <p class="superText">
            <a href="http://www.springmeadows.org/calendar.php?action=event_details&id=278&date=2012-12-01">Prophecy<br />
            Seminar</a>
          </p>
        </div>
        <div class="superElement last">
          <div class="superImage">
            <img src="/site/1/template/images/5_A_Growing_Church.jpg" alt="A Growing Church" />
          </div>
          <p class="superText">
            A<br />
            Growing<br />
            Church
          </p>
        </div>
      </div>
<?php if (array_key_exists(Date("n-j-Y"), $no_live_stream)) { ?>
      <div><p><?php echo $no_live_stream[Date("n-j-Y")]; ?></p></div>
<?php } ?>
    <?php } ?>
    </div>

  </div>
  <nav class="topMenu serif italics">
    ##menu-horizontal##
  </nav>
  <section>
    <div id="specialAnnounce">##custom4##</div>
    <article id="contentArea">
      <div class="contentWrapper centerWrapper">
        ##content##
      <aside></aside>
      </div>
    </article>
  </section>
</div>
<footer id="footerArea">
  <div class="footerWrapper centerWrapper" style="border: 0; padding-top: 0;">
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
