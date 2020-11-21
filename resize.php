<?php

$max_width = 360;
$max_height = 360;

list($width, $height, $type, $attr) = getimagesize( $file_name );
if ($width > $max_width || $height > $max_height) {
  $target_filename = $file_name;
  $ratio = $width/$height;
  if ($ratio > 1) {
    $new_width = $max_width;
    $new_height = $max_height/$ratio;
  } else {
    $width = $max_width * $ratio;
    $height = $max_height;
  }
  $src = imagecreatefromstring( file_get_contents( $file_name ));
  $dst = imagecreatetruecolor( $new_width, $new_height);
  imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
  imagejpg( $dst, $target_filename );

}
move_uploaded_file(BASE_DIR/src/resources/active_image.jpg );
