<?php
if (stripos($_SERVER["HTTP_HOST"], "www.springmeadows.org") === FALSE) {
Header("HTTP/1.1 301 Moved Permanently");
Header ("Location: http://www.springmeadows.org".$_SERVER["REQUEST_URI"]);
exit;
}
?>
<html>
<head>
<style type="text/css">
<!--
.bodytext-10pt {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 10pt; }

.bodytext-9pt {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 9pt; }

.rsscredit {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 8pt; }

.rsslinks {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #000000;
    font-size : 8pt; }

.DigestTitle {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #D19800;
    font-size : 14px;
	line-height : 24px;
    font-weight : bold; }

.Subhead-black {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #000000;
    font-size : 13px;
    font-weight : bold; }

.FeedTitle {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #D19800;
    font-size : 12px;
	line-height : 13px;
    font-weight : bold; }

a.FeedTitle {
    text-decoration : none; }

a.FeedLink:hover   {
    color : #555555; }

a.FeedLink {
    color : #333333; }

.FeedDescription {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 12px;
    text-decoration : none;  }

.FeedLink {
    text-decoration : none;}


.title {
     font-size : 18px;
     color : #000000;
     font-family: 'lucida grande', tahoma, sans-serif;
     font-weight : bold;
     font-style : italic;
     border-style : solid;
     border-color : #3366cc;
     border-bottom-width : 1px;
     border-top-width : 0px;
     border-left-width : 0px;
     border-right-width : 0px; }

.2ndline {
     font-size : 12px;
     font-style : italic;
     font-family: 'lucida grande', tahoma, sans-serif;
     color : #000000; }

.headline {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #D19800;
    font-size: 24px;
    font-weight: bold; }

.Subhead-18px-Gold {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #D19800;
    font-size: 18px;
    font-weight: bold; }
	
.Subhead-16px-Gold {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #D19800;
    font-size: 16px;
    font-weight: bold; }
	
.Subhead-14px-italic-Gold {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #D19800;
    font-size: 14px;
    font-weight: bold;
    font-style : italic; }
	
.Subhead-18px-Brown {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #381A0A;
    font-size: 18px;
    font-weight: bold; }
	
.Subhead-16px-Brown {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #381A0A;
    font-size: 16px;
    font-weight: bold; }
	
.Subhead-14px-italic-Brown {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #381A0A;
    font-size: 14px;
    font-weight: bold;
    font-style : italic; }

.devotionteaser {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 12px;
    text-decoration : none;  }

a.devotionteaser {
    text-decoration : none;  }

a.devotionteaser:hover {
    color : #555555;
    text-decoration : none;  }

.address {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #ffffff;
    font-weight: bold;
    font-size : 7pt; }

.body {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 10px; }

.sitename {
    font-family: 'lucida grande', tahoma, sans-serif;
	font-size: 32px;
	color: #666666;
}

.caption {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #000000;
    font-size : 10px; }

.pullquote {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #000000;
    font-size : 14px;
    font-style : italic; }

.credit {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #000000;
    font-size : 14px;
    font-style : italic; }

.bottom_links {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 8pt; 
    text-align : center; 
    color : #FFFFFF; }

a.bottom_links {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 8pt; 
    text-align : center; 
    color : #FFFFFF; }

a.bottom_links:hover {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #FFFFFF;
    text-decoration : underline; }


.footer {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 8pt;
	text-decoration : none;
    color : #FFFFFF;
    text-align : center; }

a.footer {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #FFFFFF;
    font-weight : bold; }

a.footer:hover {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #FFFFFF;
    text-decoration : underline; }

.whatsnew-title { 
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333889;
    font-size : 12px;
    line-height : 13px;
    font-weight : bold;
    text-decoration : none; }

.whatsnew {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 12px;
    text-decoration : none; }

.whatsnew:hover {
    color : #555555; }

.eventsnew-title { 
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #D19800;
    font-size : 12px;
    line-height : 13px;
    font-weight : bold;
    text-decoration : none; }

.eventsnew {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #000000;
    font-size : 12px;
    text-decoration : none; }

.eventsnew:hover {
    color : #555555; }

.subpages-description {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #333333;
    font-size : 12px;
    text-decoration : none; }

.subpages-description:hover {
    color : #555555; }

.navcell {
	color: #FFFFFF;
}

.navlinks {
	color: #FFFFFF;
	font-family: 'lucida grande', tahoma, sans-serif;
	font-size: 12px;
	text-decoration: none;
	font-weight: bold; }

a.navlinks {
	color: #FFFFFF;
	font-family: 'lucida grande', tahoma, sans-serif;
	text-decoration: none;
    padding: 3px; }

a.navlinks:hover {
	color: #FFFFFF;
	text-decoration: underline; }

.navcell2 {
	color: #999999;
}

.navlinks2 {
	color: #999999;
	font-family: 'lucida grande', tahoma, sans-serif;
	font-size: 10px;
    text-decoration: none; }

a.navlinks2 {
	color: #999999;
	font-family: 'lucida grande', tahoma, sans-serif;
    text-decoration: none;
    padding: 0px; }

a.navlinks2:hover {
	color: #999999;
	text-decoration: underline; }

.vertical-links {
    color : #666666;
	font-weight : bold;
	text-decoration : none;
	font-family: 'lucida grande', tahoma, sans-serif;
	font-size: 9pt;
    line-height : 18px;
	max-height : 40px; }

.vertical-links:hover {
    color : #555555; }

a   {
    font-family: 'lucida grande', tahoma, sans-serif;
    color : #683013;
    text-decoration : underline; }

a:hover { 
	color: #9D491D;
	}

.printlink {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #999999;
    font-size : 8pt; }

a.printlink {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #999999;
    font-size : 8pt; }

a.printlink:hover {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #cccccc;
    font-size : 8pt; }

.system {
	color : #000000;
    font-size : 10pt;
   	font-family: 'lucida grande', tahoma, sans-serif; }

.syssmall {
	font-size : 8pt;
   	font-family: 'lucida grande', tahoma, sans-serif;
   	color : #000000; }

.bodysmall {
	font-size : 8pt;
        color : #000000;
   	font-family: 'lucida grande', tahoma, sans-serif; }

.bodysmallgrey {
	font-size: 8pt;
   	font-family: 'lucida grande', tahoma, sans-serif;
   	color: #000000; }

table { 
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size: 10pt; }
	
.GalleryPopupTitle {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 11pt;
    font-weight: bold; 
    color : #555555; }

.GalleryPopupDescription {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #555555; }

.GalleryPopupDetails {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #555555; }

.GalleryExplainText {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #555555; }

.GalleryThumbnailTitle {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
    font-weight: bold;
	color : #555555; }

.GalleryThumbnailDescription {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #555555; }

.GalleryHeadline {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 18px;
	font-weight: bold;
	color : #D19800; }

.GalleryIntro {
   font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #000000; }

.GalleryEditorLink {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #000000; }

.GalleryNavigation {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 20pt;
	color : #D19800; }

.GalleryTitle {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
    font-weight: bold;
	color : #D19800; }

.GalleryDescription {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #555555; }

.GalleryNoPhotos {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #000000; }

.GalleryInactive {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size : 10pt;
	color : #000000; }	

a.forum:link {
        color : #000000;
        text-decoration : underline;
        font-size: 10pt; }

a.forum:visited {
        color : #000000;
        text-decoration : underline;
        font-size: 10pt; }

a.forum:hover {
        color : #000000;
        text-decoration : none;
        font-size: 10pt; }

a.forum:active {
        text-decoration : underline;
        color : #0a5593;
        font-size: 10pt; }

.forum_title {
    font-family: 'lucida grande', tahoma, sans-serif;
    color: #273872;
    font-size: 18px;
    font-weight: bold; }

.forum_intro {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-weight:normal;
    font-size: 11pt; }

.forum_table {
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size: 10pt; }

.forum_td {
     font-family: 'lucida grande', tahoma, sans-serif;
     color:#666666;
     background-color:#ffffff; }

.flat {
     background-color:#CCCCCC; }

.table_header {
     background-color:#273872;
     color:#ffffff; 
	 font-family: 'lucida grande', tahoma, sans-serif;
     font-size: 10pt; }

.latest_post {
     font-family: 'lucida grande', tahoma, sans-serif;
     font-size:8pt;
     color:#000000; }

.latest_post_link {
      background-color:#ff9966;
      color:#333333;
      font-size:9pt;
      font-family:arial;
      border: solid 1px #000000;
      text-decoration:none; }

.new {
      font-family: 'lucida grande', tahoma, sans-serif;
      font-size:7pt;
      color:#ff0000;
      font-weight:bold; }

.notnew {
      font-family:verdana;
      font-size:7pt;
      color:#555555; }

.message {
      border-bottom:solid 1px #000000;
      background-color:#CCCCCC;
      font-size : 10pt }

.highlight {
      background-color:#CCCCCC; }

.quote {
      padding:5px;
      border:solid 1px #000000;
      background-color:#e6e6e6;
      color:#000000; }

.pollquestion{
    font-family: 'lucida grande', tahoma, sans-serif;
    font-size: 12px;
    font-weight: bold;
    color: #000000;
}

-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0"
marginheight="0" bgcolor="#DBCBA4">
<div align="center">
<table width="100%" border="0" cellpadding="0"
cellspacing="0" bgcolor="#DBCBA4">
  <tr>
    <td><table width="650" border="0" align="center"
cellpadding="0" cellspacing="0">
  <tr>
    <td height="75" align="left" valign="top"><table
width="650" border="0" cellspacing="0" cellpadding="0"
bgcolor="#FFFFFF">
  <tr>
    <td width="60" height="75" align="center"
valign="middle"><img
src="images/BoxShadow_V_NavTan/acc27b_sdaLogo.jpg"></td>
    <td width="590" height="75" align="left" valign="middle"
class="sitename" style="font-size:24px; color:#666666;
font-weight:bold"><? print
$_SESSION[$su]['siteinfo']['name']; ?></td>
  </tr>
</table>
</td>
  </tr>
  <tr><td height="6" align="center" valign="middle"
bgcolor="#D19800"><img src="images/BoxShadow_V_NavTan/spacer.gif"
width="1" height="6"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="650" border="0"
cellspacing="0" cellpadding="0">
    <tr>
    <td width="10"><img src="images/BoxShadow_V_NavTan/spacer.gif"
width="10" height="1"></td>
    <td width="630" style="color:#333333"><table width="630"
border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"><img src="images/BoxShadow_V_NavTan/spacer.gif"
height="10"></td>
  </tr>
  <tr>
    <td>##content##</td>
  </tr>
  <tr>
    <td height="10"><img src="images/BoxShadow_V_NavTan/spacer.gif"
height="10"></td>
  </tr>
</table>
</td>
    <td width="10"><img src="images/BoxShadow_V_NavTan/spacer.gif"
width="10" height="1"></td>
  </tr>
</table></td>
  </tr>
  <tr>    <td height="30" align="center" valign="middle"
bgcolor="#1E0903" style="font-size:9px; color:#FFFFFF;
font-weight:bold"><? print
$_SESSION[$su]['siteinfo']['address1']; ?> &#8226; <? print
$_SESSION[$su]['siteinfo']['city']; ?>, <? print
$_SESSION[$su]['siteinfo']['state']; ?>, <? print
$_SESSION[$su]['siteinfo']['zip']; ?></td>
  </tr>
</table>
</td>
  </tr>
</table>
</div>
</body>
</html>
