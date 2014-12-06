<?php
/**
 * Transliteration (convert foreign and special characters to their ASCII equivalent)
 *
 * @access public static
 * @param string $string The to transliterate.
 * @return string The filtered text.
 */
function translit($string) {
  $search = array(
      'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ă', 'Ą',
      'Ç', 'Ć', 'Č',
      'Ď', 'Đ',
      'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ă', 'ą',
      'ç', 'ć', 'č',
      'ď', 'đ',
      'È', 'É', 'Ê', 'Ë', 'Ę', 'Ě',
      'Ğ',
      'Ì', 'Í', 'Î', 'Ï', 'İ',
      'Ĺ', 'Ľ', 'Ł',
      'è', 'é', 'ê', 'ë', 'ę', 'ě',
      'ğ',
      'ì', 'í', 'î', 'ï', 'ı',
      'ĺ', 'ľ', 'ł',
      'Ñ', 'Ń', 'Ň',
      'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ő', 'Œ',
      'Ŕ', 'Ř',
      'Ś', 'Ş', 'Š',
      'ñ', 'ń', 'ň',
      'ò', 'ó', 'ô', 'ö', 'ø', 'ő', 'œ',
      'ŕ', 'ř',
      'ś', 'ş', 'š',
      'Ţ', 'Ť',
      'Ù', 'Ú', 'Û', 'Ų', 'Ü', 'Ů', 'Ű',
      'Ý', 'ß',
      'Ź', 'Ż', 'Ž',
      'ţ', 'ť',
      'ù', 'ú', 'û', 'ų', 'ü', 'ů', 'ű',
      'ý', 'ÿ',
      'ź', 'ż', 'ž',
      'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р',
      'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'р',
      'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
      'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
      '$', '€', '£'
  );

  $replace = array(
      'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'A', 'A',
      'C', 'C', 'C',
      'D', 'D',
      'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'a', 'a',
      'c', 'c', 'c',
      'd', 'd',
      'E', 'E', 'E', 'E', 'E', 'E',
      'G',
      'I', 'I', 'I', 'I', 'I',
      'L', 'L', 'L',
      'e', 'e', 'e', 'e', 'e', 'e',
      'g',
      'i', 'i', 'i', 'i', 'i',
      'l', 'l', 'l',
      'N', 'N', 'N',
      'O', 'O', 'O', 'O', 'O', 'O', 'O', 'OE',
      'R', 'R',
      'S', 'S', 'S',
      'n', 'n', 'n',
      'o', 'o', 'o', 'o', 'o', 'o', 'oe',
      'r', 'r',
      's', 's', 's',
      'T', 'T',
      'U', 'U', 'U', 'U', 'U', 'U', 'U',
      'Y', 'Y',
      'Z', 'Z', 'Z',
      't', 't',
      'u', 'u', 'u', 'u', 'u', 'u', 'u',
      'y', 'y',
      'z', 'z', 'z',
      'A', 'B', 'B', 'r', 'A', 'E', 'E', 'X', '3', 'N', 'N', 'K', 'N', 'M', 'H', 'O', 'N', 'P',
      'a', 'b', 'b', 'r', 'a', 'e', 'e', 'x', '3', 'n', 'n', 'k', 'n', 'm', 'h', 'o', 'p',
      'C', 'T', 'Y', 'O', 'X', 'U', 'u', 'W', 'W', 'b', 'b', 'b', 'E', 'O', 'R',
      'c', 't', 'y', 'o', 'x', 'u', 'u', 'w', 'w', 'b', 'b', 'b', 'e', 'o', 'r',
      'USD', 'EUR', 'GBP'
  );

  return str_replace($search, $replace, $string);
}

/**
 * Rewrite a text to its URL compatible equivalent.
 *
 * @access public static
 * @param string $string The text to convert.
 * @return string The converted URL.
 */
function slugify($string, $charset = 'UTF-8') {
  $string = htmlspecialchars_decode($string); // ie: &amp; to &
  $string = translit($string); // ie: é to e
  $string = preg_replace('/[^A-Za-z0-9]+/', '-', $string); // ie: _ to -
  $string = trim($string, '-'); // ie: -string- to string
  $string = mb_strtolower($string); // ie: E to e

  return $string;
  
  

}

		
	
//si le lien est un lien youtube ou vimeo affiche directement le player	
function parsevideolink ($url, $height, $width){	
	// verif youtube
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
		$video_id = $match[1];
		echo '<iframe width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'. $video_id.'?rel=0" frameborder="0" allowfullscreen></iframe>';
		// Sinon verif Vimeo
	}else if(preg_match('/^http(?s):\/\/(www\.)?vimeo\.com\/(clip\:)?(\d+).*$/', $url, $match))
	{
		 $video_id = $match[3];
		echo '<iframe src="http://player.vimeo.com/video/'.$video_id .'?title=0&amp;byline=0&amp;portrait=0&amp;color=cd0529" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}else{
		return 1;
		}
}


//pour afficher les erreurs
function alert($type, $message, $link){
	echo '<div class="alert alert-'.$type.'"><i class="icon-warning-sign icon-2x"></i><br>
';
	echo '<p>'.$message.'</p>';
	if(isset ($link)){
	echo '<br><a href="'.($link).'">Retour</a>';
	}
	echo '</div>';
	
	}
	
	

//Fonctions detect les liens dans un texte et raccourci l'urL

function ShortUrl($matches) {
	 $link_displayed = (strlen($matches[0]) > $limit) ? substr( $matches[0], 0, 10).'…'.substr($matches[0], -10) : $matches[0];
	 return '<a href="'.$matches[0].'" title="Se rendre à « '.$matches[0].' »">'.$link_displayed.'</a>';
}

function UrlToShortLink ($text) {
	//Pattern to retrieve the url in the comment
    	$pattern = '`((?:https?|ftp)://\S+?)(?=[[:punct:]]?(?:\s|\Z)|\Z)`'; 
	//Replacement of the pattern
	$text = preg_replace_callback($pattern, 'ShortUrl', $text);
	return $text;
}
	
	


//--------------------------------------fonctions specifiques-----------------------------

//paginations des fiches startups
function pagination($startup_id, $list_id, $page ){
	
	if(in_array($startup_id,$list_id)){
	
		$pointeur = array_search($startup_id,$list_id);
		
		
			if(isset($list_id[$pointeur-1])){
				$precedent= $list_id[$pointeur-1];
				echo '<div class="fleft"><a href="index.php?page='.$page.'&ID='.$precedent.'"> < Précédent   </a></div>';
			}
			if(isset($list_id[$pointeur+1])){
				$suivant = $list_id[$pointeur+1];
				echo '<div class="fright">   <a href="index.php?page='.$page.'&ID='.$suivant.'">  Suivant ></a></div>';
			};
			
			
		}else{echo 'probleme';}

	}
	
	
//fonctions getlogo et getfile pour les afficher 
//les logo et les pieces jointes du formulaire	
	
	function getlogo ($nomstartup,$nom_rep){
$extention_autorise=array('.jpg', '.jpeg', '.png', '.gif', '.pdf', '.zip', '.eps')	;	
$logo=slugify(($nomstartup)).'_'.substr(slugify(($nom_rep)),0,3);
	echo '<img src="../candidature/logo/';
	foreach ($extention_autorise as $values){
		if (file_exists('../candidature/logo/'.$logo.$values)){ $logo_ok=$logo.$values; echo $logo_ok; break; }
		}	
	echo '" >';
	}
	

	
function getfile($nomstartup,$nom_rep) {
	$video=slugify(($nomstartup)).'_'.substr(slugify(($nom_rep)),0,3);
	$extention_ok=array('.jpg', '.jpeg', 
	'.png', '.gif', '.pdf', '.zip', '.eps', 
	'.ppt' , '.mov', '.avi', '.mpeg', '.pptx', 
	'.csv', '.rtf', '.txt', '.xls','.doc','.docx',
	'.mp3', '.flv', '.m4v','.mp4','.wav','.wmv', '.swf', '.wma', '.ogg')	;
	foreach ($extention_ok as $values){
		 if (file_exists('../candidature/video/'.$video.$values)){
			 $file_ok=$video.$values; 
			 echo '<a href="../candidature/video/'.$file_ok.'" class="pagination"> <i class="icon-download"></i>Télécharger le fichier lié</a>'; 
			 break; 
			 }
		} 
	}
	



//affiche un bouton qui lance un popup qui affiche les commentaires
function popupComment($id, $comment){
	echo'  <a href="#myModal_comment'.$id.'" role="button" class="btn btn-mini" data-toggle="modal"><i class="icon-comments icon-large  red"></i> .</a>';
 
	echo'<div id="myModal_comment'.$id.'" class=" modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
	echo'<div class="modal-header">';
	echo'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
	echo'<h3 id="myModalLabel">Commentaires</h3>';
	echo' </div><div class="modal-body">';
   	echo nl2br($comment);
  	echo'</div><div class="modal-footer"> <button class="btn btn-mini" data-dismiss="modal" aria-hidden="true">Close</button>';
	echo'<a href="index.php?page=candidats&amp;action2=mod&amp;ID='.$id.'&amp;valid=0 " class="btn btn-mini">modifier</a>';
	echo'</div></div>';
	
	}


//affiche la liste des agences qui ont selectionné
// une startup en fonction de sa position 	
function agenceList($array_ag, $icon, $position){	
echo'<div class="span2">';

if(isset($array_ag) AND $array_ag[0]['choix_ag_id']>0){
	echo '<i class="'. $icon.' red">'.$position .'</i><br>';
	for ($i=0; $i<$array_ag['total_values']; $i++){
	echo $array_ag[$i]['ag_nom'];
	echo'<br>';
	};

}
echo'</div>';

}


//affiche un bouton qui lance un popup avec le détail de la position des agences
function popupAgence($id, $nom_startup){
	
	echo'  <a href="#myModal_ag'.$id.'" role="button" class="btn btn-mini pull-left" data-toggle="modal">+</i></a>  ';
 
	echo'<div id="myModal_ag'.$id.'" class=" modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
	echo'<div class="modal-header">';
	echo'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
	echo'<h3 id="myModalLabel">'. $nom_startup.' choisie par : </h3>';
	echo' </div><div class="modal-body">';
	$DB = new DB();
	include ('startup_detail.php'); 
	agenceList($RS_first, 'icon-star', 1);
	agenceList($RS_second, 'icon-star-half', 2);
	agenceList($RS_third, 'icon-star-empty', 3);
  	echo'</div></div>';
	
	}




//liste des domaines startup ...Patch...
$domain_list=array(	'communication digitale/web',
					'création de contenu/interactivité ',
					'événementiel',
					'marketing relationnel/CRM'
					,'mobile/applications',
					'Autre');




//fonction carousel 
function slider($chemin, $img, $name){
	echo'<div id="myCarousel_'.$name.'" class="carousel slide">'; 
	echo'<div class="carousel-inner">';
	echo'<div class="active item"><img src="'.$chemin.$img.'.jpg"></div>';
        
	//parcour le dossier choisi
	if($dossier = opendir($chemin))
		{
			while(false !== ($fichier = readdir($dossier)))
				{if($fichier != '.' && $fichier != '..' ){
					$pattern = '/\.(gif|png|jpg|jpeg)$/';
					   if (preg_match($pattern, $fichier, $matches)){
						echo '<div class="item"><img src="'.$chemin.$fichier.'"></div>';
					   }
					}
				}
			}
	
	 echo'</div>';
       
	echo'<a class="carousel-control left" href="#myCarousel_'.$name.'" data-slide="prev">&lsaquo;</a>';
	echo'<a class="carousel-control right" href="#myCarousel_'.$name.'" data-slide="next">&rsaquo;</a> </div>';
    
	
}


?>