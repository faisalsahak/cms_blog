<?php

  $connection = mysqli_connect('localhost', 'root', '', 'cms_blog');
  if($connection){
    echo "connected to database";
  }else{
    echo "Error, could not connect to database";
  }

 ?>
