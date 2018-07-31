<?php
$images = glob("*.*");

foreach($images as $image) {
    echo '<img src="'.$image.'" /><br />';
}

?>