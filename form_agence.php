<p class="text-form"><strong>Formulaire d'inscription Agence
à l'AACC CAP DIGITAL STARTUP PROJECT 2014</p></strong>

<p>L'AACC CAP DIGITALStartup Project a l'ambition de créer un lien entre les agences de communication et les innovations technologiques qui feront l'avenir de nos professions. 
C'est initier de véritables promotions de startups et faire naître une pépinière d'accès au marché. Des séances de formation aux enjeux des métiers de la communication jusqu'à la 
préparation des présentations finales chez des clients, l'implication des adhérents de l'AACC sera totale.</p>
<p>Les agences retenues seront communiquées début janvier 2015. Merci de retenir dès à présent les 22 et 23 janvier pour assister aux pitchs des startups finalistes. </p>

<p class="bg_grey"><small>Prévoyez une vingtaine de minutes pour remplir ce formulaire et munissez-vous de votre liasse fiscale pour renseigner les éléments business . <br>
Merci de votre participation.</small></p>
<p><strong>Pour plus d’information contacter :</strong><br>
CAP DIGITAL | Elisabeth Racine : <a href="mailto:elisabeth.racine@capdigital.com&lt;">elisabeth.racine@capdigital.com</a><br>
AACC | Charles-Frédéric Tauzi : <a href="mailto:ctauzi@aacc.fr">ctauzi@aacc.fr</a></p>



  <form action="index.php?action=form_agence" method="post" role="form" id="candidaturesForm_agence" accept-charset="utf-8" class="form-horizontal">
 <!-- <input type="hidden" name="ag_id" value="" />-->
  <input type="hidden" name="ag_date_inscription" value="<?php //echo date('Y-m-d H:i:s'); ?>" />
  
<fieldset>

<div class="col-md-12 bande-form">
    <p class="titre-form-bande">Coordonnées de l'agence</p>
</div>

    <div class="form-group">
      <label for="ag_nom" class="col-md-3 text-form"> Nom de l'agence* </label>
       <div class="col-sm-4">
        <input type="text" id="ag_nom" name="ag_nom" class="form-control" placeholder="Nom de l'agence"  required />
      </div>
    </div>

  <div class="form-group">
    <label for="ag_date" class="col-md-3 text-form"> Date de création de l'agence* </label>
     <div class="col-md-2">
      <input type="text" class="form-control day" name="ag_date_Jour" placeholder="JJ" required >
    </div> 
     <div class="col-md-2">
      <input type="text" class="form-control month" name="ag_date_Mois" placeholder="MM" required>
    </div>
     <div class="col-md-2">
      <input type="text" class="form-control year" name="ag_date_Annee" placeholder="AAAA" required>
    </div>
  </div>   


    <div class="form-group">
      <label for="ag_effectif" class="col-md-3 text-form"> Effectif </label>
       <div class="col-md-4">
        <input type="text" id="ag_effectif" name="ag_effectif" placeholder="effectif" class="form-control" required />
      </div>
    </div>

    <div class="form-group">
      <label for="ag_RCS" class="col-md-3 text-form"> N° de RCS*</label>
      <div class="col-md-4">
        <input type="text" id="ag_RCS" name="ag_RCS" placeholder="N° de RCS" class="form-control" required  />
      </div>
    </div>
    
    <div class="form-group">
      <label for="ag_site" class="col-md-3 text-form">Site web*</label>
       <div class="col-md-4">
      <input type="text" name="ag_site" id="ag_site" placeholder="http://www.monsite.com" class="form-control" required />
       </div>
    </div>
    
   <div class="form-group">
      <label for="ag_email" class="col-md-3 text-form">Email</label>
      <div class="col-md-4">
      <input type="email" class="form-control" id="ag_email" name="ag_email" placeholder="Email" required >
      </div>
   </div>


   <div class="form-group">
      <label for="ag_adresse" class="col-md-3 text-form"> Adresse* </label>
    <div class="col-md-4">
      <input type="text" name="ag_adresse" id="ag_adresse" class="form-control" placeholder=" n° rue " required/>
    </div>
    <label for="ag_ville"> </label>
    <div class="col-md-2">
      <input type="text" name="ag_ville" id="ag_ville" class="form-control" placeholder=" Ville " required/>
    </div>
      <label for="ag_cp"> </label>
      <div class="col-md-2">
      <input type="text" name="ag_cp" id="ag_cp" class="form-control" placeholder="Code Postal" required/>
      </div>
   </div>  

          <!--Coordonnées du dirigeant-->

  <div class="col-md-12 bande-form">
    <p class="titre-form-bande">Coordonnées du dirigeant</p>
  </div>

    <div class="form-group">
      <label for="ag_dir_nom" class="col-md-3 text-form">Nom / Prénom du dirigeant*</label>
      <div class="col-md-4">
        <input type="text" id="ag_dir_nom" name="ag_dir_nom" class="form-control" placeholder="Nom du dirigeant"  required/>
      </div>
      <label for="ag_dir_prenom"> </label>
      <div class="col-md-4">
        <input type="text" id="ag_dir_prenom" name="ag_dir_prenom" class="form-control" placeholder="Prénom du dirigeant"  required/>
      </div>
    </div>

    <div class="form-group">
      <label for="ag_dir_fonction" class="col-md-3 text-form">Fonction du dirigeant*</label>
      <div class="col-md-4">
        <input type="text" id="ag_dir_fonction" name="ag_dir_fonction" class="form-control" placeholder="Fonction du dirigeant"  required/>
      </div>
    </div>

    <!--<div class="controls">-->

      <div class="form-group">
      <label for="ag_dir_email" class="col-md-3 text-form">Email</label>
        <div class="col-md-4">
     <input type="email" class="form-control" id="ag_dir_email" name="ag_dir_email" placeholder="Email" required >
        </div>
     </div>

    <div class="form-group">
      <label for="ag_dir_tel" class="col-md-3 text-form">Mobile</label>
      <div class="col-md-4">
        <input type="tel" class="form-control" name="ag_dir_tel" placeholder="Mobile" required>
      </div>
    </div>

     <!--Coordonnées du mentor désigné-->

<div class="col-md-12">
  <p class="titre-form">Coordonnées du mentor désigné</p>
</div>  


    <div class="form-group">
      <label for="ag_mentor_nom" class="col-md-3 text-form"> Nom / Prénom du mentor</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="ag_mentor_nom" name="ag_mentor_nom" placeholder="Nom du mentor" required />
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" id="ag_mentor_prenom" name="ag_mentor_prenom" placeholder="Prénom du mentor" required />
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 text-form"> Fonction du mentor</label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="ag_mentor_fonction" name="ag_mentor_fonction" placeholder="Fonction du mentor" required />
      </div>
    </div>


      <div class="form-group">
      <label class="col-md-3 text-form">Email</label>
        <div class="col-md-4">
     <input type="email" class="form-control" id="ag_mentor_email" name="ag_mentor_email" placeholder="Email" required >
        </div>
     </div>

    <div class="form-group">
      <label class="col-md-3 text-form">Mobile</label>
      <div class="col-md-4">
        <input type="tel" class="form-control" name="ag_mentor_tel" id="ag_mentor_tel" placeholder="Mobile" required>
      </div>
    </div>


<!--Accueil de la Start Up-->

<div class="col-md-12">
  <p class="titre-form">Accueil de la Startup</p>
</div> 

    <div class="form-group">
      <label class="col-md-3 text-form"  for="ag_nbre_places"> Nombre de places disponibles</label>
      <div class="col-md-2">
        <input type="text"  data-type="input-textbox" class="form-control" id="ag_nbre-places" name="ag_nbre-places" required />
      </div>
    </div>


  <div class="form-group">
    <label class="col-md-3 text-form"> Accueil </label>

     <div class="col-md-3">
          <label for="" class="checkbox inline"> 
          <input type="checkbox"  name="ag_accueil[]" value="permanent" />
           permanent</label>
     </div>

      <div class="col-md-3">
          <label for="" class="checkbox inline">
          <input type="checkbox"  name="ag_accueil[]" value="temporaire" />
           temporaire</label>
     </div>
   </div>


    <div class="form-group">
        <label class="col-md-3 text-form"> Nombre de jours par semaine</label>
         <div class="col-md-2">
            <select  name="ag_dispo" id="ag_dispo" class="form-control" required>
              <option value="01"> 1 </option>
              <option value="02"> 2 </option>
              <option value="03"> 3 </option>
              <option value="04"> 4 </option>
              <option value="05"> 5 </option> 
           </select>
          </div>
        </div>


<div class="col-md-12 bande-form">
    <p class="titre-form-bande">Présélection et typologie de startups</p>
</div>  

<div class="col-md-12">
<p class="form-group">Dans le cadre de l'AACC CAP DIGITAL STARTUP PROJECT, nous procédons à une présélection des candidatures, aussi, nous souhaiterions identifier les sujets d’innovations qui pourraient répondre à vos recherches voire à vos projets.<br>
  Etes-vous à la recherche :
</p>


    <div class="form-group">
    <label class="col-md-10 text-form"> d'une startup qui évolue dans une domaine d'activité particulier* </label>

    <div class="col-md-12">
         <div class="col-md-4">
            <label class="checkbox inline"> 
            <input type="checkbox" name="ag_secteur_1" id="ag_secteur_1" value="tourisme" />
             Tourisme</label>
          </div>

          <div class="col-md-4">
            <label class="checkbox inline">
            <input type="checkbox" name="ag_secteur_1" id="ag_secteur_1" value="gaming" />
             Gaming </label>
          </div>

           <div class="col-md-4">
             <label class="checkbox inline">
             <input type="checkbox" name="ag_secteur_1" id="ag_secteur_1" value="musique" />
             Musique </label>
          </div>
        

         <div class="col-md-4">
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_1" id="ag_secteur_1" value="media/loisirs" />
           Médias/loisirs</label> 
        </div>

        <div class="col-md-4">  
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_1" id="ag_secteur_1" value="mobilite et ville durable" />
           Mobilité et ville durable </label>
        </div>

      <div class="col-md-12">
          <div class="form-group">
             <label class="col-md-3 text-form"> Autre, précisez </label>
             <div class="col-md-12">
               <input type="text" id="ag_secteur_1_autre" name="ag_secteur_1_autre" class="form-control"/>
              </div>
             </div>
      </div>




  </div>

<div class="col-md-12">
   <div class="form-group">
    <label class="col-md-10 text-form"> d'une startup qui dispose d'une expertise particulière* </label>

      <div class="col-md-12">
         <div class="col-md-4">
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_2" id="ag_secteur_2" value="CRM" />
        CRM</label> 
      </div>

        <div class="col-md-4">  
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_2" id="ag_secteur_2" value="Data Visualisation" />
           Data Visualisation </label>
        </div>

        <div class="col-md-4">
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_2" id="ag_secteur_2" value="Création : outil/service à destination des équipes de l’agence" />
          Création : outil/service à destination des équipes de l’agence (ex. CRM, contenu interactif) </label>  
       </div>

      <div class="col-md-4">
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_2" id="ag_secteur_2" value="Gestion de campagnes en ligne" />
          Gestion de campagnes en ligne (marketing relationnel, RTB,…) </label>  
       </div>

       <div class="col-md-4">
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_2" id="ag_secteur_2" value="Analyse du comportement du consommateur" />
          Analyse du comportement du consommateur (online et/ou IRL) </label>  
       </div>


       <div class="col-md-4">
           <label class="checkbox inline">
           <input type="checkbox" name="ag_secteur_2" id="ag_secteur_2" value="Campagnes évènementielles" />
          Campagnes évènementielles  </label>  
       </div>

    </div>

        <div class="col-md-12">
          <div class="form-group">
             <label class="col-md-3 text-form">Autre, précisez </label>
             <div class="col-md-12">
               <input type="text" id="ag_secteur_2_autre" name="ag_secteur_2_autre" class="form-control"/>
              </div>
          </div>
      </div>

</div>

  </div>

<div class="col-md-12">
  <div class="form-group">
    <label class="col-md-10 text-form"> d'une startup qui pourrait vous accompagner sur un projet déjà indentifié, précisez : </label>
      <div class="col-md-12">
            <textarea id="ag_secteur_3" name="ag_secteur_3" rows="3" class="form-control"></textarea>
      </div>
  </div>
</div>

      <div class="col-md-12">
    <p class="form-group"> Qu'attendez-vous de ce partenariat et quels sont vos intérêts à y participer ?</p>
       <div class="form-group">
        <label class="text-form col-md-3"> </label>
          <div class="col-md-12">
            <textarea id="ag_interet" name="ag_interet" rows="3" class="form-control"></textarea>
          </div>
       </div>
      </div>
  
  <div class="col-md-12">
    <div class="form-actions">
    <label class="checkbox inline"> 
    <input type="checkbox" class="form-checkbox" id="ag_CG" name="ag_CG" value="1" />
   Les participants autorisent les organisateurs du concours AACC Cap Digital Start-up Project à publier tout ou partie des informations contenues dans le formulaire dans une publication unique présentant les candidatures pré-sélectionnées de ce concours.<br>
   Les participants s’engagent dans le cas où ils sont retenus à communiquer à l’AACC et CAP DIGITAL les éventuelles évolutions du projet, le changement du mentor en cours de programme.   </label>
   <hr>
   <button type="submit" class="btn btn-primary btn-valid" value="submit"> Soumettre le formulaire </button>
  </div>
</div>
</fieldset>
</form>
  
