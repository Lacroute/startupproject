<?php
  //si le formulaire a bien été envoyé
  if(isset ($_POST)){



  //var_dump($_POST);

  // On commence par récupérer les champs 


  //1 - controle si les champs sont bien remplis

  $champsvide=array(); //stock le nomps des événtuels champs non rempli


  foreach ($_POST as $champ => $value) {

    if(!empty($value)){
      ${$champ} = $value;
      //si la valeur n'est pas nulle alors on cree une variable "nom du champs" 
      //égale à la valeur du champs
      }else{
        $champsvide[]= $champ ;// on enregiste le nom des champs nom rempli
      }     
  }

  //si il y a des champs non rempli
  if(!empty($champsvide)){
    ?>

    <p class="alert alert-danger">Attention tous les champs sont obligatoires<br>
      Veuillez remplir le(s) champ(s) manquant(s) :<br>

    <?php

        
      //affiche le nom des champs vide
      foreach ($champsvide as $value) {
       echo $value.'<br>';
      }

      ?>
    <a class="btn btn-danger" id="retourformulaire" href="javascript:history.back();">Retour au formulaire</a>
    </p>
      <?php

  }
  else
  {


  //2- on concatainne les champs dates et on les mets au bon format YYYY-MM-DD pour la base de données

    $cd_date= $cd_date_Annee.'-'.$cd_date_Mois.'-'.$cd_date_Jour;


  //3- On fait les controles spécifiques de l'integrité des données (on verifie que les données on bien le format attendu 
  //ex: un email est bien un email.)

    //message d'erreur :
      $erreurFormatDate=" n'est pas une date valide <br>"; 
      $erreurFormatEmail=" n'est pas un email valide<br>"; 
      $erreurFormatURL=" n'est pas une URL valide<br>";
      $erreurFormatTel=" n'est pas un numéro de tel valide<br>";
      $error='';

    //validation des dates
      function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    if(!validateDate($cd_date, 'Y-m-d')){ $error .= $cd_date.$erreurFormatDate ;}else{ $date = new DateTime($cd_date);};

   

    //validation Email 
    if(!filter_var($cd_contact_email, FILTER_VALIDATE_EMAIL)){ $error .= $cd_contact_email.$erreurFormatEmail;} ;

    //validation URL
    if(!filter_var($cd_link, FILTER_VALIDATE_URL)){ $error .= $cd_link.$erreurFormatURL;} ;

    //validation n° téléphone
	if(!filter_var($cd_contact_tel, FILTER_VALIDATE_TEL)){ $error .= $cd_contact_tel.$erreurFormatTel;} ;
      


      //si il y a encore des erreurs on les affiches
      if(!empty($error)){

       echo '<p class="alert alert-danger"> <strong>Attention :</strong><br>' .$error .'<a class="btn btn-danger" id="retourformulaire" href="javascript:history.back();">Retour au formulaire</a> </p>';
       
      }else{

        //Sinon on update de la base
        // connexion à la base
        try
        {
          //$bdd = new PDO('mysql:host=nom de domaine;dbname=nom de la base', 'user', 'password');
           $bdd = new PDO('mysql:host=srv1506.sd-france.net;dbname=startup', 'startup_admin', '8dtd1yns');
		      //$bdd = new PDO('mysql:host=localhost;dbname=startup', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

            //$db = mysql_connect('localhost', 'root', 'root') or die('Erreur de connexion '.mysql_error());
            // sélection de la base  

           // mysql_select_db('startup',$db) or die('Erreur de selection '.mysql_error()); 
         
          // on écrit la requête sql ,  
         
         $sql = "INSERT INTO candidatures
         (cd_id, cd_RS, cd_nom_com, cd_siret, cd_domaine, cd_nature, cd_domaine_autre, cd_rep_prenom, cd_rep_nom, cd_adresse, cd_ville, cd_cp, cd_contact_nom, cd_contact_prenom, cd_contact_email, cd_contact_tel, cd_site, cd_date, cd_effectif, cd_equipe, cd_CA_2012, cd_CA_2013, cd_CA_2014, cd_EBE_2012, cd_EBE_2013, cd_EBE_2014, cd_CAE_2012, cd_CAE_2013, cd_CAE_2014, cd_description, cd_innovation, cd_atout, cd_techno, cd_marche, cd_buisnessplan, cd_description_GP, cd_link, cd_CG, cd_date_inscription, cd_valid, cd_whish, cd_startup) VALUES ('', '$cd_RS', '$cd_nom_com', '$cd_siret', '$cd_domaine', '$cd_nature', '$cd_domaine_autre', '$cd_rep_prenom', '$cd_rep_nom', '$cd_adresse', '$cd_ville', '$cd_cp', '$cd_contact_nom', '$cd_contact_prenom', '$cd_contact_email', '$cd_contact_tel', '$cd_site', '$cd_date', '$cd_effectif', '$cd_equipe', '$cd_CA_2012', '$cd_CA_2013', '$cd_CA_2014', '$cd_EBE_2012', '$cd_EBE_2013', '$cd_EBE_2014', '$cd_CAE_2012', '$cd_CAE_2013', '$cd_CAE_2014', '$cd_description', '$cd_innovation', '$cd_atout', '$cd_techno', '$cd_marche', '$cd_buisnessplan', '$cd_description_GP', '$cd_link', '$cd_CG', '$cd_date_inscription', '$cd_valid', '$cd_whish', '$cd_startup')";

          // on execute la requete : on insère les informations du formulaire dans la table 
          $bdd->exec($sql)or die(print_r($bdd->errorInfo()));

          // on affiche le résultat pour le visiteur 
          echo '<p class="alert alert-success">Votre inscription a bien été prise en compte</p>';    
        }  
  }
}
?>
