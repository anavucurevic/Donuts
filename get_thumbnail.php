<?php
if(isset($_POST['get_thumbnail']))
{
 $url=$_POST['url'];
 $fetch=explode("v=", $url);
 $videoid=$fetch[1];
 echo '<img src="http://img.youtube.com/vi/'.$videoid.'/0.jpg" width="250"/>';
}
?>