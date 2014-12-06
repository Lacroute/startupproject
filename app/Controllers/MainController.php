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


  function displayForm($f3, $params){
    $type =F3::get('GET')['type'];
    if($type == "agency"){
      echo Template::instance()->render('templates/agency_form.htm');
    }else{
      echo Template::instance()->render('templates/startup_form.htm');
    }
  }


  function handleForm($f3){
    $clean = $this->securityCheck($f3->get('POST'));
    return true;
  }


  function securityCheck($data){
    $clean = array();

    foreach ($data as $key => $value) {
      if(is_array($value)){
        $this->securityCheck($value);
      }else{
        $value = mysql_real_escape_string($value);
        $value = strip_tags($value);
        $value = preg_quote($value);
        $value = stripslashes($value);
        $clean[$key] = $value;
      }
    }

    return $clean;
  }


  function __destruct(){

  }
}
?>