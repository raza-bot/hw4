<?php
  namespace sjsu_174\hw4\src\views\helper;

  class CreateNew {

    function createFile() {
      return $createFile = fopen("../resources/active_image.txt", "w");  
    }

    function generateNum() { 
      $myfile = $this->createFile(); 
      $txt = ''; 
      $rand_num = range(0,8); 
      shuffle($rand_num); 
      
      foreach ($rand_num as $num) {
          $txt = $num . "\n"; 
          fwrite($myfile, $txt); 
      }
    }
  }



