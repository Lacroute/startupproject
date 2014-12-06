
   <script src="js/modernizr.custom.17475.js"></script>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
 
  <!-- Bootstrap MODAL JavaScript  -->
    <script type="text/javascript">
        $('#openBtn').click(function(){
  $('#myModal').modal({show:true})
});
    </script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js" type="text/javascript"></script>
    <script src="js/cbpAnimatedHeader.js" type="text/javascript"></script>

    <!-- Contact Form JavaScript 
    <script src="js/jqBootstrapValidation.js" type="text/javascript"></script>
    <script src="js/contact_me.js" type="text/javascript"></script>-->

     <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>



<!-- ------------------ Analytics ----------------- -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4131797-19', 'auto');
  ga('send', 'pageview');

</script>



<!-- ------------------VALIDATION FORMULAIRE----------------- -->
  
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/additional-methods.js" type="text/javascript"></script>
<script src="js/messages_fr.js" type="text/javascript"></script>

  <?php if($page=="index.php"){?>

<script>
$(document).ready(function(){

$("#candidaturesForm_agence").validate({
  
    rules: {
      ag_email: "email",


   ag_email: {
      required: true,
      email: true
    },

    ag_mentor_email: {
      required: true,
      email: true
    },
  
    ag_dir_email: {
      required: true,
      email: true
    },

  ag_secteur_1:{ 
    required: true,
    maxlength: 3
  },

  ag_secteur_2:{ 
    required: true,
    maxlength: 3
  },
  
  ag_cp:{
    digits: true,
        minlength: 5,
        maxlength: 5
  },
  
  ag_site:{
      required: true,
      url: true
    },
  
  ag_effectif:{
    digits: true,
    }, 

    ag_secteur_1:{   
        maxlength: "Ne pas cocher plus de {0} case",
      required: "Cochez au moins une case"
  },

   ag_secteur_2:{   
        maxlength: "Ne pas cocher plus de {0} case",
      required: "Cochez au moins une case"
    }

    }

  });

})

</script>

<?php }?>


<!--------------------MODAL----------------- -->
<?php
//pour afficher par défaut la modale du formulaire quand le formulaire est en cour de soumission
//en cas d'erreur

if(isset($_GET['action']) && $_GET['action']=='form_agence' ){
?> 

  <script type="text/javascript">
  $('#myModal_agence').modal('show');
  </script>
<?php 
}

?>

<?php if($page=="index.php"){
  ?>
<script>
$(document).ready(function(){
  /*
$.validator.addMethod("requiredIfChecked", function (val, ele, arg) {
    if ($("#Autres").is(":checked") && ($.trim(val) == '')) 
  { return false; }
    return true;
}, "Ce champs est obligatoire");


$.validator.addMethod("maxfilesize", function(value, element, params) {
    var elementsize;
    try{
        elementsize = element.files[0].size;
    }catch(e){
        var browserInfo = navigator.userAgent.toLowerCase();
        if(browserInfo.indexOf("msie") > -1){
            var fso = new ActiveXObject("Scripting.FileSystemObject");
            elementsize = fso.getFile(element.value).size;
        }else{
            return true;
        }
    }
    var size = params[0], typesize = params[1];
    if( typesize == "Ko" ){
        size *= 1024;
    }else if(typesize == "Mo"){
        size *= 1024 * 1024;
    }else if(typesize == "Go"){
        size *= 1024 * 1024 * 1024;
    }
return this.optional(element) || elementsize < size;
}, $.validator.format("le fichier ne doit pas dépasser {0}{1} "));


*/

$("#candidaturesForm").validate({
  
  
  groups: {
        nameGroup: "cd_CA_2014 cd_CA_2013 cd_CA_2012 cd_EBE_2012 cd_EBE_2013 cd_EBE_2014 cd_CAE_2012 cd_CAE_2013 cd_CAE_2014"
    },
        
  rules: {
    cd_CA_2012:"required",
    cd_CA_2013:"required",
    cd_CA_2014:"required",
    cd_EBE_2012:"required",
    cd_EBE_2013:"required",
    cd_EBE_2014:"required",
    cd_CAE_2012:"required",
    cd_CAE_2013:"required",
    cd_CAE_2014:"required",
    cd_contact_email: "email",

     

    cd_contact_email: {
      required: true,
      email: true
    },
  
  cd_CG:{
    required: true
    },
  
  cd_domaine:{ 
    required: true,
    maxlength: 3
  },
  
  cd_cp:{
    digits: true,
        minlength: 5,
        maxlength: 5
  },
  
  cd_site:{
      required: true,
      url: true
    },
  
  cd_siret:{
    digits: true,
    minlength: 14,
    maxlength: 14    
    },

  cd_effectif:{
    digits: true,
    }, 
    
   cd_domaine_autre:{
  requiredIfChecked :true
       },
       
  cd_logo:{
    extension: "jpg|jpeg|gif|png|pdf",
    maxfilesize: [2, "Mo"]
    
    },
  
  cd_video:{
    maxfilesize: [20, "Mo"],
    extension:"pdf|doc|docx|txt|rtf|html|zip|mp3|wma|mpg|flv|avi|jpg|jpeg|png|gif|m4v|mov|mp4|wma|swf|wav|wmv|ogg|mp4",
  },

  messages: {
    cd_CA_2012:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_CA_2013:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_CA_2014:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_EBE_2012:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_EBE_2013:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_EBE_2014:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_CAE_2012:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_CAE_2013:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    cd_CAE_2014:"Merci de remplir tous les champs Elements business , indiquez NR si  vous ne connaissez pas le chiffre",
    
    cd_CG:{
       required:"Veuillez accepter les conditions de participation"
      },
     
      
    cd_domaine:{   
        maxlength: "Ne pas cocher plus de {0} case",
        required: "Cochez au moins une case"
    }

    }

  });

});

</script>
 <?php }?>

 <!--------------------MODAL----------------- -->
<?php
//pour afficher par défaut la modale du formulaire quand le formulaire est en cour de soumission
//en cas d'erreur

if(isset($_GET['action']) && $_GET['action']=='form' ){
?> 
  <script type="text/javascript">
  $('#myModal').modal('show');
  </script>

<?php 
}

?>
