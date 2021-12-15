<?php
if(isset($_POST['get_image']))

{
 $url=$_POST['img_url'];
 $data = file_get_contents($url);
 $new = 'slike/new_image.jpg';
 file_put_contents($new, $data);

echo "<img src='slike/new_image.jpg'>";
}
?>