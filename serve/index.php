<?php
// $images = glob("*.*");
// foreach($images as $image) {
//    echo '<img src="'.$image.'" height=100 width=100 /><br />';
// }

  $dir    = '';
  $files  = scandir($dir);
  $images = array();

  foreach($files as $file)
    {
        if( fnmatch('*.jpg',$file) || fnmatch('*.png',$file) || fnmatch('*.mp4',$file) || fnmatch('*.gif',$file) )
        {
            $images[] = $file;
        }
    }

    $image_count = count($images);
    $count_each_column = ceil($image_count/4);

    echo '<div style="width:100%; max-width:950px; margin:0 auto;">';
    $count = 0;
    foreach($images as $image)
    {
        $count+=1;
        if($count==1)
        {
            echo '<div class="box boxgallery">';
        }

            echo '<img src="images/gallery/'.$image.'" />';

        if($count>=$count_each_column)
        {
            $count=0;
            echo '</div>';
        }
    }

    if($count>0)
    {
        echo '</div>';
    }
    echo '</div>';

?>

<style>
.boxgallery {
    margin: 0 0.6% 0 0;
    padding: 0;
    width: 24%;
    float:left;
}

.boxgallery img {
    clear: both;
    float: left;
    height: auto;
    margin-bottom: 2%;
    transition: opacity 0.3s ease 0s;
    width: 100%;
}

</style>