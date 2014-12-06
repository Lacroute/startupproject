<?php

class MainController{
  
  function __construct(){
  }


  function home(){
    $template = new Template;
    echo $template->render('layout.htm');
  }


  
  function initDB(){
    $db=new DB\SQL(
      'mysql:host='.F3::get('SQL_HOST').
        ';port='.F3::get('SQL_PORT').
        ';dbname='.F3::get('SQL_DB').'',
      F3::get('SQL_USER'),
      F3::get('SQL_PASS')
    );

    return $db;
  }


  function __destruct(){

  }
}
?>