<?php
function fitimage($image,$fit) 
{
  $size = @getimagesize($image);
  $w=$size[0];$h=$size[1];
  if($h>$w) $tg=$h;else $tg=$w;
  if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
  echo "<img src='$image' height='$h' width='$w' border='1'>";
} 
function whimage($image,$fit,$wh) 
{
  $size = @getimagesize($image);
  $w=$size[0];$h=$size[1];
  if($h>$w) $tg=$h;else $tg=$w;
  if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}  
  if($wh==0) return $w;
  if($wh==1) return $h;
} 
?>
