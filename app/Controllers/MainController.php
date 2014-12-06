<?php

class MainController{
  
  function __construct(){
  }

  function home(){
    $template = new Template;
    echo $template->render('layout.htm');
  }

  function __destruct(){

  }
}
?>