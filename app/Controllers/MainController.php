<?php

class MainController{
  
  function __construct(){
  }


  function home($f3){
    $template = new Template;
    F3::set('success', false);
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

  function fileUpload($folder, $input_name){

    $folder = $this->Slug($folder);
    $input_name = $this->Slug($input_name);

    $allowedExts  = array("ppt", "pdf", "jpg", "jpeg", "png", "gif", "mp4", "wma", "avi");
    $allowedTypes = array("application/vnd.ms-powerpoint", "application/pdf", "image/pjpeg", "image/png", "image/jpeg", "image/gif", "video/mp4", "audio/wma", "video/avi");
    $extension    = pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);

    if ($_FILES[$input_name]["size"] < 15000) {
      throw new Exception("Error: Filesize over 15Mo");
    }
    if (in_array($_FILES[$input_name]["type"], $allowedTypes) && in_array($extension, $allowedExts)) {
      if ($_FILES[$input_name]["error"] > 0) {
        throw new Exception("Upload error : ".$_FILES[$input_name]["error"]);
      } else {
        if (!file_exists('upload/' . $folder)) {
          mkdir('upload/' . $folder);
        }
        move_uploaded_file($_FILES[$input_name]["tmp_name"], "upload/" . $folder . "/" . $folder . '_' . $input_name . time() . '.' . $extension);
      }

    } else {
      throw new Exception("Invalid file");
      
    }
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
    $mapper = new DB\SQL\Mapper($this->initDB(),'candidatures_startup');
    
    if(isset($clean['domaine_creation'])){
      $mapper->domaine_creation = $clean['domaine_creation'];
    } 

    if(isset($clean['domaine_analyse'])){
      $mapper->domaine_analyse = $clean['domaine_analyse'];
    } 

    if(isset($clean['domaine_campagnes'])){
      $mapper->domaine_campagnes = $clean['domaine_campagnes'];
    } 

    if(isset($clean['domaine_autre'])){
      $mapper->domaine_autre = $clean['domaine_autre'];
    }

    if(isset($clean['cap_digital_member'])){
      $mapper->cap_digital_member = $clean['cap_digital_member'];
    }

    $mapper->RS               = $clean['RS'];
    $mapper->nom              = $clean['nom'];
    $mapper->siret            = $clean['siret'];
    $mapper->nature           = $clean['nature']; 
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
    $mapper->CA_2013          = $clean['CA_2013'];
    $mapper->CA_2012          = $clean['CA_2012'];
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
    $mapper->atout            = $clean['atout'];
    $mapper->marche           = $clean['marche'];
    $mapper->buisnessplan     = $clean['buisnessplan'];
    $mapper->description_GP   = $clean['description_GP'];
    $mapper->link             = $clean['link'];
    $mapper->CG               = $clean['CG'];
    $mapper->date_inscription = date('Y-m-d', time());

    $this->fileUpload($mapper->nom, 'logo');
    $this->fileUpload($mapper->nom, 'video');

    $mapper->insert();
    $mapper = null;

    $template = new Template;
    $f3->set('success', true);
    echo $template->render('layout.htm');

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
    // secteur_1
    if(isset($clean['tourisme'])){
      $mapper->tourisme = $clean['tourisme'];
    }
    if(isset($clean['gaming'])){
      $mapper->gaming = $clean['gaming'];
    }
    if(isset($clean['musique'])){
      $mapper->musique = $clean['musique'];
    }
    if(isset($clean['media'])){
      $mapper->media = $clean['media'];
    }
    if(isset($clean['mobilite'])){
      $mapper->mobilite = $clean['mobilite'];
    }
    if(isset($clean['secteur_1_autre'])){
      $mapper->secteur_1_autre = $clean['secteur_1_autre'];
    }
    
    // secteur_2
    if(isset($clean['crm'])){
      $mapper->CRM = $clean['crm'];
    }
    if(isset($clean['data'])){
      $mapper->Data = $clean['data'];
    }
    if(isset($clean['creation'])){
      $mapper->Création = $clean['creation'];
    }
    if(isset($clean['gestion'])){
      $mapper->Gestion = $clean['gestion'];
    }
    if(isset($clean['analyse'])){
      $mapper->Analyse = $clean['analyse'];
    }
    if(isset($clean['campagnes'])){
      $mapper->Campagne = $clean['campagnes'];
    }
    if(isset($clean['secteur_2_autre'])){
      $mapper->secteur_2_autre = $clean['secteur_2_autre'];
    }

    $mapper->secteur_3 = $clean['secteur_3'];
    $mapper->interet = $clean['interet'];
    $mapper->date_inscription = date('Y-m-d', time());

    $mapper->insert();
    $mapper = null;
    
    $template = new Template;
    $f3->set('success', true);
    echo $template->render('layout.htm');

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

  function remove_accent($str){
    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
                  'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
                  'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
                  'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
                  'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
                  'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
                  'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
                  'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
                  'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 
                  'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 
                  'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
                  'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');

    $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
                  'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
                  'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
                  'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
                  'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
                  'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
                  'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
                  'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
                  's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
                  'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
                  'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
    return str_replace($a, $b, $str);
  }


  /* Générateur de Slug (Friendly Url) : convertit un titre en une URL conviviale.*/
  function Slug($str){
    return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
    array('', '-', ''), $this->remove_accent($str)));
  }

  function __destruct(){

  }
}
?>