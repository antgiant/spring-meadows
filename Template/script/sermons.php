<?php
  if(!isset($selected_year)) {
    $selected_year = date("Y");
  }
  $files = scandir("/home/wintersp/public_html/site/1/podcast/");
  $dfiles = array();
  $bfiles = scandir("/home/wintersp/public_html/site/1/docs/");
  $bufiles = array();
  $years = array();
  Foreach ($files as $file) {
    preg_match('/([0-9]{2,4})[_\\.\/-]([0-9]{2})[_\\.\/-]([0-9]{2,4})/', $file, $matches);
    If (isset($matches[1])) {
      If (strlen($matches[1]) == 4) {
        $dfiles[$matches[1]."-".($matches[2] - 0)."-".($matches[3] - 0)] = $file;
        $years[$matches[1]] = $matches[1];
      }
      If (strlen($matches[3]) == 4) {
        $dfiles[$matches[3]."-".($matches[1] - 0)."-".($matches[2] - 0)] = $file;
        $years[$matches[3]] = $matches[3];
      }
    }
  }
  Foreach ($bfiles as $file) {
    preg_match('/bulletin.*?([0-9]{1,4})[_\\.\/-]([0-9]{1,2})[_\\.\/-]([0-9]{1,4})/i', $file, $matches);
    If (isset($matches[1])) {
      If (strlen($matches[1]) == 4) {
        $bufiles[$matches[1]."-".($matches[2] - 0)."-".($matches[3] - 0)] = $file;
      }
      If (strlen($matches[3]) == 4) {
        $bufiles[$matches[3]."-".($matches[1] - 0)."-".($matches[2] - 0)] = $file;
      }
      If (strlen($matches[3]) != 4 && strlen($matches[1]) != 4) {
        $bufiles["20".$matches[3]."-".($matches[1] - 0)."-".($matches[2] - 0)] = $file;
      }
    }
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
  $temp = mysql_query("select title, speaker, file_date, link, status from podcast where zone = 1 order by file_date desc");
  While($tr = mysql_fetch_assoc($temp)) {
      $podcast[date("Y-n-j", strtotime($tr["file_date"]))] = $tr;
      if (date("Y", strtotime($tr["file_date"])) > 2000) {
        $years[date("Y", strtotime($tr["file_date"]))] = date("Y", strtotime($tr["file_date"]));
      }
  }
  rsort($years);
  $thisYear = "";
  Foreach ($years as $year) {
    if ($year == $selected_year) {
      $tmp = 12;
      If (date("Y") == $year) {
        $tmp = date("m");
      }
      If (date("Y") < $year) {
        $tmp = 0;
      }
      if ($tmp > 0) {
        For ($i = $tmp; $i > 0; $i--) {
          $i = $i - 0;
          $firstOfMonth = mktime(0, 0, 0, $i, 1, $year);
          Print "    <h2>".Date("M", $firstOfMonth).".</h2>";
          $oldDay = 0;
          Print "    <ul style='list-style-type: none;'>";
          For ($j = 0; $j < 5; $j++) {
            $tmp = Abs(date("w", $firstOfMonth) - 6);
            $day = date("j", Mktime(0, 0, 0, $i, (1 + $tmp + (7*$j)), $year));
            If ($oldDay > $day) {
              $day = "";
            }
            $output = "";
            $oldDay = $day;
            $title = preg_replace("/^.*[0-9]{2,4}-[0-9]{2}-[0-9]{2,4} - (.*)\\.mp3$/","$1", str_replace("_", " ", $dfiles[$year.'-'.$i."-".$day]));
            $preacher = preg_replace("/^.*?\((.*?)\).*/","$1", $title);
            If ($title == $preacher) { $preacher = ""; }
            $title = preg_replace("/^.*?\) */","", $title);
            $title = preg_replace("/^\(/","", $title);
            If (!isset($podcast[$year.'-'.$i."-".$day]) && strlen(Trim($title)) < 3 && strlen(trim($preacher)) > 1) { $title = "Untitled"; }
            If (isset($podcast[$year.'-'.$i."-".$day]['title']) && strlen(Trim($podcast[$year.'-'.$i."-".$day]['title'])) < 3) { $podcast[$year.'-'.$i."-".$day]['title'] = "Untitled"; }
            If (isset($podcast[$year.'-'.$i."-".$day])) {
              $link = "";
              If (strlen($podcast[$year.'-'.$i."-".$day]['link']) > 5 && $podcast[$year.'-'.$i."-".$day]['status'] == 'active' && trim($podcast[$year.'-'.$i."-".$day]['link']) != 'http://www.wintersprings22.adventistchurchconnect.org/site/1/podcast/' && trim($podcast[$year.'-'.$i."-".$day]['link']) != 'http://www.springmeadows.org/site/1/podcast/') {
                $link = str_replace("http://www.wintersprings22.adventistchurchconnect.org", "", $podcast[$year.'-'.$i."-".$day]['link']);
              }
              $title = str_replace("\\'", "'", str_replace('\\"', '"', $podcast[$year.'-'.$i."-".$day]['title']));
              if (trim($podcast[$year.'-'.$i."-".$day]['speaker']) != "")
                $preacher = trim($podcast[$year.'-'.$i."-".$day]['speaker']);
            }
            If (!isset($podcast[$year.'-'.$i."-".$day]) && isset($dfiles[$year.'-'.$i."-".$day])) {
              $link = "site/1/podcast/".$dfiles[$year.'-'.$i."-".$day];
            }
            if ($day != "" && $title != "") {
              print "    <li>\n";
              if (FALSE && $link != "") {
                print "<a class='control_audio' href='".$link."' >\n";
                print "  <audio preload>\n";
                print "    <source src='".$link."' type='audio/mpeg' />\n";
                print "  </audio>\n";
                print "  <object id='flash_obj' class='playerpreview' type='application/x-shockwave-flash' data='/site/1/template/script/player_mp3_js.swf' width='0' height='0'>\n";
                print "    <param name='movie' value='/site/1/template/script/player_mp3_js.swf' />\n";
                print "    <param name='AllowScriptAccess' value='always' />\n";
                print "    <param name='FlashVars' value='mp3=".$link."' />\n";
                print "  </object>\n";
                print "  <img src='/site/1/template/images/Play_Button.png' alt='Play Button' />\n";
                print "</a>\n";
              }
              print (strlen($day) == 1?"0":"").$day." &nbsp;&nbsp;";
              print ($link == ""?"":"<a href='".$link."'>");
              print $title;
              print ($link == ""?"":"</a>");
              print ($preacher == ""?"":" - ".$preacher);
            }
            if (isset($bulletin_db[$year.'-'.$i."-".$day])) {
              Print " &nbsp;&nbsp;<a href = '".$bulletin_db[$year.'-'.$i."-".$day]."'>Bulletin</a>";
            }
            else if (isset($bufiles[$year.'-'.$i."-".$day])) {
              Print " &nbsp;&nbsp;<a href = 'site/1/docs/".$bufiles[$year.'-'.$i."-".$day]."'>Bulletin</a>";
            }
            Print "\n    </li>\n";
          }
          Print "    </ul>";
        }
      }
    }
  }
?>
