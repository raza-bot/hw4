<?php

class puzzle
{
  function render()
  {
    foreach(glob("uploads/*") as $img)
    {
      $target_file = $img;
    }
    $check = getimagesize($target_file);
    $type = $check[2];
    switch($type)
    {
      case IMAGETYPE_GIF:
        $src = imagecreatefromgif($target_file);
        break;
      case IMAGETYPE_PNG:
        $src  = imagecreatefrompng($target_file);
        break;
      case IMAGETYPE_JPEG:
        $src = imagecreatefromjpeg($target_file);
        break;
      default:
        echo "error";
        break;
    }

    $new_img = imagecreatetruecolor(40,40);

    imagecopy($new_img, $src ,0,0,0,0,80,80);

    switch($type)
    {
      case IMAGETYPE_GIF:
        imagegif($new_img,"uploads/puzzle0.gif");
        break;
      case IMAGETYPE_PNG:
        imagepng($new_img,"uploads/puzzle0.png");
        break;
      case IMAGETYPE_JPEG:
        imagejpeg($new_img,"uploads/puzzle0.jpg");
        break;
      default:
        echo "error";
        break;
    }

    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Example</title>
      </head>
      <body>
        <img src="<?= $target_file; ?>">
      </body>
    </html>
    <?php
  }
}

?>
