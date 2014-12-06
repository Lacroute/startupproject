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
    <a class="btn btn-danger"  id="retourformulaire" href="javascript:history.back();">Retour au formulaire</a>
    </p>
      <?php

  }
  else
  {


  //2- on concatainne les champs dates et on les mets au bon format YYYY-MM-DD pour la base de données

    $ag_date= $ag_date_Annee.'-'.$ag_date_Mois.'-'.$ag_date_Jour;


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

    if(!validateDate($ag_date, 'Y-m-d')){ $error .= $ag_date.$erreurFormatDate ;}else{ $date = new DateTime($ag_date);};

   

    //validation Email 
    if(!filter_var($ag_email, FILTER_VALIDATE_EMAIL)){ $error .= $ag_email.$erreurFormatEmail;} 
    if(!filter_var($ag_dir_email, FILTER_VALIDATE_EMAIL)){ $error .= $ag_dir_email.$erreurFormatEmail;} 
    if(!filter_var($ag_mentor_email, FILTER_VALIDATE_EMAIL)){ $error .= $ag_mentor_email.$erreurFormatEmail;};

    //validation n° téléphone
	if(!filter_var($ag_dir_tel, FILTER_VALIDATE_TEL)){ $error .= $ag_dir_tel.$erreurFormatTel;}
	if(!filter_var($ag_mentor_tel, FILTER_VALIDATE_TEL)){ $error .= $ag_mentor_tel.$erreurFormatTel;} ;
      


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
		       //  $bdd = new PDO('mysql:host=localhost;dbname=startup', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

            //$db = mysql_connect('localhost', 'root', 'root') or die('Erreur de connexion '.mysql_error());
            // sélection de la base  

           // mysql_select_db('startup',$db) or die('Erreur de selection '.mysql_error()); 
         
          // on écrit la requête sql ,  
         
         $sql = "INSERT INTO candidatures_agence
		(ag_id, ag_nom, ag_date, ag_effectif, ag_RCC, ag_site, ag_email, ag_adresse, ag_ville, ag_cp, ag_dir_nom, ag_dir_prenom, ag_dir_fonction, ag_dir_email, ag_dir_tel, ag_mentor_nom, ag_mentor_prenom, ag_mentor_email, ag_mentor_tel, ag_nbre_places, ag_accueil, ag_dispo, ag_secteur_1, ag_secteur_2, ag_secteur_1_autre, ag_secteur_2_autre, ag_secteur_3, ag_inscription, ag_interet, ag_date_inscription, ag_CG)VALUES ('', '$ag_id', '$ag_nom', '$ag_date', '$ag_effectif', '$ag_RCC', '$ag_site', '$ag_email', '$ag_adresse', '$ag_ville', '$ag_cp', '$ag_dir_nom', '$ag_dir_prenom', '$ag_dir_fonction', '$ag_dir_email', '$ag_dir_tel', '$ag_mentor_nom', '$ag_mentor_prenom', '$ag_mentor_email', '$ag_mentor_tel', '$ag_nbre_places', '$ag_accueil', '$ag_dispo', '$ag_secteur_1', '$ag_secteur_2', '$ag_secteur_1_autre', '$ag_secteur_2_autre', '$ag_secteur_3', '$ag_inscription', '$ag_interet', '$ag_date_inscription', '$ag_CG')";

          // on execute la requete : on insère les informations du formulaire dans la table 
          $bdd->exec($sql)or die(print_r($bdd->errorInfo()));

          // on affiche le résultat pour le visiteur 
          echo '<p class="alert alert-success">Votre inscription a bien été prise en compte</p>';    
        }  
  }
}
?>
