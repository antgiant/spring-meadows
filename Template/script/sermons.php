<?php
  if(!isset($selected_year)) {
    $selected_year = date("Y");
  }
  $years = array();

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
  $temp = mysql_query("select title, speaker, file_date, link, status from podcast where zone = 1 and status = 'active' order by file_date desc");
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
          Print "    <ol>";
          $actualOutput = "";
          For ($j = 0; $j < 5; $j++) {
            $tmp = Abs(date("w", $firstOfMonth) - 6);
            $day = date("j", Mktime(0, 0, 0, $i, (1 + $tmp + (7*$j)), $year));
            If ($oldDay > $day) {
              $day = "";
            }
            $output = "";
            $oldDay = $day;
            $title = "";
            $preacher = "";
            If (!isset($podcast[$year.'-'.$i."-".$day]) && strlen(Trim($title)) < 3 && strlen(trim($preacher)) > 1) { $title = "Untitled"; }
            If (isset($podcast[$year.'-'.$i."-".$day]['title']) && strlen(Trim($podcast[$year.'-'.$i."-".$day]['title'])) < 3) { $podcast[$year.'-'.$i."-".$day]['title'] = "Untitled"; }
            If (isset($podcast[$year.'-'.$i."-".$day])) {
              $link = "";
              If (strlen($podcast[$year.'-'.$i."-".$day]['link']) > 5 && $podcast[$year.'-'.$i."-".$day]['status'] == 'active' && preg_replace ('/(.*)(http[s]{0,1}:\/\/[^\/]*\/site\/1\/podcast\/)(.*)/ism', '$1$3', $podcast[$year.'-'.$i."-".$day]['link']) != '') {
                $link = preg_replace('/(.*)(http[s]{0,1}:\/\/[^\/]*\/site\/1\/podcast\/)(.*)/ism', '$1/site/1/podcast/$3', $podcast[$year.'-'.$i."-".$day]['link']);
              }
              $title = str_replace("\\'", "'", str_replace('\\"', '"', $podcast[$year.'-'.$i."-".$day]['title']));
              if (trim($podcast[$year.'-'.$i."-".$day]['speaker']) != "")
                $preacher = trim($podcast[$year.'-'.$i."-".$day]['speaker']);
            }
            if ($day != "" && $title != "") {
              $output .= "    <li value='".$day."'>\n";
              $output .= ($link == ""?"":"<a href='".$link."'>");
              $output .= $title;
              $output .= ($link == ""?"":"</a>");
              $output .= ($preacher == ""?"":" - ".$preacher);
              if (isset($bulletin_db[$year.'-'.$i."-".$day])) {
                $output .= " &nbsp;&nbsp;<a href = '".$bulletin_db[$year.'-'.$i."-".$day]."'>Bulletin</a>";
              }
              $output .= "\n    </li>\n";
            }
            $actualOutput = $output.$actualOutput;
          }
          Print $actualOutput;
          Print "    </ol>";
        }
      }
    }
  }
?>
