$(function(){

    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'swing');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top'
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    $('#myModal').on('show.bs.modal', function(){
        $this = $(this)
        $this.find('#RS').val('SARL');
        $this.find('#nom_com').val('Dataveyes');
        $this.find('#date').val(Date.now());
        $this.find('#siret').val('24567890984432');
        $this.find('#nature').val('SA');
        $this.find('#site').val('http://www.dataveyes.com');
        $this.find('#description').val('C est nous les rois de la data');
        $this.find('#rep_prenom').val('Arnaud');
        $this.find('#rep_nom').val('Pichon');
        $this.find('#adresse').val('24 rue de la rue');
        $this.find('#ville').val('Pantin');
        $this.find('#cp').val(93290);
        $this.find('#contact_prenom').val('contact_prenom');
        $this.find('#contact_nom').val('contact_nom');
        $this.find('#contact_email').val('contact@ema.il');
        $this.find('#contact_tel').val(0855683910);
        $this.find('#techno').val('techno');
        $this.find('#innovation').val('innovation');
        $this.find('#atout').val('atout');
        $this.find('#domaine_autre').val('domaine_autre');
        $this.find('#marche').val('marche');
        $this.find('#buisnessplan').val('buisnessplan');
        $this.find('#equipe').val('equipe');
        $this.find('#effectif').val('effectif');
        $this.find('#CA_2012').val('CA_2012');
        $this.find('#CA_2013').val('CA_2013');
        $this.find('#CA_2014').val('CA_2014');
        $this.find('#CAE_2012').val('CAE_2012');
        $this.find('#CAE_2013').val('CAE_2013');
        $this.find('#CAE_2014').val('CAE_2014');
        $this.find('#EBE_2012').val('EBE_2012');
        $this.find('#EBE_2013').val('EBE_2013');
        $this.find('#EBE_2014').val('EBE_2014');
        $this.find('#description_GP').val('description_GP');
        $this.find('#link').val('http://www.dataveyes.com');
    });

    $('#myModal_agence').on('show.bs.modal', function(){
        $this = $(this)
        $this.find("#nom").val('nom');
        $this.find("#date").val(Date.now());
        $this.find("#effectif").val('effectif');
        $this.find("#RCS").val('RCS');
        $this.find("#site").val('site');
        $this.find("#email").val('contact@ema.il');
        $this.find("#adresse").val('adresse');
        $this.find("#adresse").val('adresse');
        $this.find("#ville").val('ville');
        $this.find("#cp").val('cp');
        $this.find("#dir_nom").val('dir_nom');
        $this.find("#dir_prenom").val('dir_prenom');
        $this.find("#dir_fonction").val('dir_fonction');
        $this.find("#dir_email").val('contact@ema.il');
        $this.find("#dir_tel").val(0855683910);
        $this.find("#mentor_nom").val('mentor_nom');
        $this.find("#mentor_prenom").val('mentor_prenom');
        $this.find("#mentor_fonction").val('mentor_fonction');
        $this.find("#mentor_email").val('contact@ema.il');
        $this.find("#mentor_tel").val(0855683910);
        $this.find("#nbre_places").val(132);
        $this.find("#dispo").val('04');
        $this.find("#secteur_1").val('secteur_1');
        $this.find("#secteur_1").val('secteur_1');
        $this.find("#secteur_1").val('secteur_1');
        $this.find("#secteur_1").val('secteur_1');
        $this.find("#secteur_1").val('secteur_1');
        $this.find("#secteur_1_autre").val('secteur_1_autre');
        $this.find("#secteur_2").val('secteur_2');
        $this.find("#secteur_2").val('secteur_2');
        $this.find("#secteur_2").val('secteur_2');
        $this.find("#secteur_2").val('secteur_2');
        $this.find("#secteur_2").val('secteur_2');
        $this.find("#secteur_2").val('secteur_2');
        $this.find("#secteur_2_autre").val('secteur_2_autre');
        $this.find("#secteur_3").val('secteur_3');
        $this.find("#interet").val('interet');
        $this.find("#CG").val('CG');
    });
    var cbpAnimatedHeader = (function() {

        var docElem = document.documentElement,
            header = $('.navbar-default'),
            didScroll = false,
            changeHeaderOn = 300;

        function init() {

            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }

        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                header.addClass('navbar-shrink')
            }
            else {
                header.removeClass('navbar-shrink')
            }
            didScroll = false;
        }

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        init();

    })();

    /*
     * Translated default messages for the jQuery validation plugin.
     * Locale: FR (French; français)
     */
    $.extend($.validator.messages, {
        required: "Ce champ est obligatoire.",
        remote: "Veuillez corriger ce champ.",
        email: "Veuillez fournir une adresse électronique valide.",
        url: "Veuillez fournir une adresse URL valide.",
        date: "Veuillez fournir une date valide.",
        dateISO: "Veuillez fournir une date valide (ISO).",
        number: "Veuillez fournir un numéro valide.",
        digits: "Veuillez fournir seulement des chiffres.",
        creditcard: "Veuillez fournir un numéro de carte de crédit valide.",
        equalTo: "Veuillez fournir encore la même valeur.",
        accept: "Veuillez fournir une valeur avec une extension valide.",
        maxlength: $.validator.format("Veuillez fournir au plus {0} caractères."),
        minlength: $.validator.format("Veuillez fournir au moins {0} caractères."),
        rangelength: $.validator.format("Veuillez fournir une valeur qui contient entre {0} et {1} caractères."),
        range: $.validator.format("Veuillez fournir une valeur entre {0} et {1}."),
        max: $.validator.format("Veuillez fournir une valeur inférieur ou égal à {0}."),
        min: $.validator.format("Veuillez fournir une valeur supérieur ou égal à {0}."),
        maxWords: $.validator.format("Veuillez fournir au plus {0} mots."),
        minWords: $.validator.format("Veuillez fournir au moins {0} mots."),
        rangeWords: $.validator.format("Veuillez fournir entre {0} et {1} mots."),
        letterswithbasicpunc: "Veuillez fournir seulement des lettres et des signes de ponctuation.",
        alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages",
        lettersonly: "Veuillez fournir seulement des lettres.",
        nowhitespace: "Veuillez ne pas inscrire d'espaces blancs.",
        ziprange: "Veuillez fournir un code postal entre 902xx-xxxx et 905-xx-xxxx.",
        integer: "Veuillez fournir un nombre non décimal qui est positif ou négatif.",
        vinUS: "Veuillez fournir un numéro d'identification du véhicule (VIN).",
        dateITA: "Veuillez fournir une date valide.",
        time: "Veuillez fournir une heure valide entre 00:00 et 23:59.",
        phoneUS: "Veuillez fournir un numéro de téléphone valide.",
        phoneUK: "Veuillez fournir un numéro de téléphone valide.",
        mobileUK: "Veuillez fournir un numéro de téléphone mobile valide.",
        strippedminlength: $.validator.format("Veuillez fournir au moins {0} caractères."),
        email2: "Veuillez fournir une adresse électronique valide.",
        url2: "Veuillez fournir une adresse URL valide.",
        creditcardtypes: "Veuillez fournir un numéro de carte de crédit valide.",
        ipv4: "Veuillez fournir une adresse IP v4 valide.",
        ipv6: "Veuillez fournir une adresse IP v6 valide.",
        require_from_group: "Veuillez fournir au moins {0} de ces champs."
    });

});