<?php


foreach(glob("../hw4/src/controllers/uploads/*") as $img)
{
  $target_file = $img;
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
