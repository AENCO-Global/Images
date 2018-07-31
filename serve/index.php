<?php
$images = glob("*.*");

foreach($images as $image) {
    echo '<img src="'.$image.'" height=100 width=100 /><br />';
}

?>