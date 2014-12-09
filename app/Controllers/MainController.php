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


  function handleForm($f3){
    $clean = $this->securityCheck($f3->get('POST'));
    return true;
  }


  function handleStartupForm($f3){
    $clean = $this->securityCheck($f3->get('POST'));
    var_dump($clean);
    die('kouk');
    $mapper = new DB\SQL\Mapper($this->initDB(),'candidatures_startup');
    
    $mapper->RS               = $clean['RS'];
    $mapper->nom              = $clean['nom'];
    $mapper->siret            = $clean['siret'];
    $mapper->domaine          = $clean['domaine'];
    $mapper->nature           = $clean['nature'];
    $mapper->domaine_autre    = $clean['domaine_autre'];
    $mapper->rep_prenom       = $clean['rep_prenom'];
    $mapper->rep_nom          = $clean['rep_nom'];
    $mapper->adresse          = $clean['adresse'];
    $mapper->ville            = $clean['ville'];
    $mapper->cp               = $clean['cp'];
    $mapper->contact_nom      = $clean['contact_nom'];
    $mapper->contact_prenom   = $clean['contact_prenom'];
    $mapper->contact_email    = $clean['contact_email'];
    $mapper->contact_tel      = $clean['contact_tel'];
    $mapper->site             = $clean['site'];
    $mapper->date             = $clean['date'];
    $mapper->effectif         = $clean['effectif'];
    $mapper->equipe           = $clean['equipe'];
    $mapper->CA_2012          = $clean['CA_2012'];
    $mapper->CA_2013          = $clean['CA_2013'];
    $mapper->CA_2014          = $clean['CA_2014'];
    $mapper->EBE_2012         = $clean['EBE_2012'];
    $mapper->EBE_2013         = $clean['EBE_2013'];
    $mapper->EBE_2014         = $clean['EBE_2014'];
    $mapper->CAE_2012         = $clean['CAE_2012'];
    $mapper->CAE_2013         = $clean['CAE_2013'];
    $mapper->CAE_2014         = $clean['CAE_2014'];
    $mapper->description      = $clean['description'];
    $mapper->techno           = $clean['techno'];
    $mapper->innovation       = $clean['innovation'];
    $mapper->etat             = $clean['etat'];
    $mapper->atout            = $clean['atout'];
    $mapper->marche           = $clean['marche'];
    $mapper->buisnessplan     = $clean['buisnessplan'];
    $mapper->description_GP   = $clean['description_GP'];
    $mapper->link             = $clean['link'];
    $mapper->CG               = $clean['CG'];
    $mapper->date_inscription = new DateTime();
    $mapper->valid            = $clean['valid'];
    $mapper->comment          = $clean['comment'];
    $mapper->whish            = $clean['whish'];
    $mapper->startup          = $clean['startup'];
    
    // domaine_creation, domaine_analyse, domaine_campagnes

    var_dump($mapper);
    // $mapper->insert();
    $mapper = null;
        
    return true;
  }


  function handleAgencyForm($f3){
    $clean = $this->securityCheck($f3->get('POST'));
    $mapper = new DB\SQL\Mapper($this->initDB(),'candidatures_agence');

    $mapper->nom = $clean['nom'];
    $mapper->date = $clean['date'];
    $mapper->effectif = $clean['effectif'];
    $mapper->RCS = $clean['RCS'];
    $mapper->site = $clean['site'];
    $mapper->email = $clean['email'];
    $mapper->adresse = $clean['adresse'];
    $mapper->ville = $clean['ville'];
    $mapper->cp = $clean['cp'];
    $mapper->dir_nom = $clean['dir_nom'];
    $mapper->dir_prenom = $clean['dir_prenom'];
    $mapper->dir_fonction = $clean['dir_fonction'];
    $mapper->dir_email = $clean['dir_email'];
    $mapper->dir_tel = $clean['dir_tel'];
    $mapper->mentor_nom = $clean['mentor_nom'];
    $mapper->mentor_prenom = $clean['mentor_prenom'];
    $mapper->mentor_email = $clean['mentor_email'];
    $mapper->mentor_tel = $clean['mentor_tel'];
    $mapper->mentor_fonction = $clean['mentor_fonction'];
    $mapper->nbre_places = $clean['nbre_places'];
    $mapper->accueil = $clean['accueil'];
    $mapper->dispo = $clean['dispo'];
    $mapper->secteur_1 = $clean['secteur_1'];
    $mapper->secteur_2 = $clean['secteur_2'];
    $mapper->secteur_1_autre = $clean['secteur_1_autre'];
    $mapper->secteur_2_autre = $clean['secteur_2_autre'];
    $mapper->secteur_3 = $clean['secteur_3'];
    $mapper->internet = $clean['internet'];
    $mapper->CG = $clean['CG'];

    var_dump($mapper);
    // $mapper->insert();
    $mapper = null;
    
    return true;
  }

  function minify($f3, $args){
    $files = explode(',', $_GET['files']);
    $concatFiles = '';
    foreach ($files as $key => $file) {
      $concatFiles .= Web::instance()->minify(
        DIRECTORY_SEPARATOR.$args['type'].DIRECTORY_SEPARATOR.$file
      );
    }
    echo $concatFiles;
  }

  function __destruct(){

  }
}
?>