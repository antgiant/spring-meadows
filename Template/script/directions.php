<?php
  $ver = array();
  $destination = '5783 N Ronald Reagan Blvd. Sanford, FL 32773';
  $map_form = 'http://maps.google.com/maps';
  $map_click = $map_form.'?saddr=&amp;daddr='.urlencode($destination);
  //Check for IOS Version 6 or above
  //If you are editing this be sure to edit the template as well.
  preg_match("/.*CPU [^ ]*( ){0,1}OS ([0-9]+)_([0-9]+) like Mac OS.*/", $_SERVER['HTTP_USER_AGENT'], $ver);
  if(isset($ver[2]) && $ver[2] >= 6) {
    $map_form = 'http://maps.apple.com/maps';
    $map_click = $map_form.'?daddr='.urlencode($destination);
  }
?>