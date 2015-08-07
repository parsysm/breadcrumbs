<?php
	function breadcrumbs($text = 'شما اینجایید : ', $sep = ' » ', $home = '{ttitle}') {
		$bc     =   '<div xmlns:v="http://rdf.data-vocabulary.org/#" id="crums">'.$text;
		$site   =   'http://'.$_SERVER['HTTP_HOST'];
		$crumbs =   array_filter( explode("/",$_SERVER["REQUEST_URI"]) );
		$bc    .=   '<span typeof="v:Breadcrumb"><a href="'.$site.'" rel="v:url" property="v:title">'.$home.'</a>'.$sep.'</span>'; 
		$nm     =   count($crumbs);
		$i      =   1;
		foreach($crumbs as $crumb){
			$link    =  ucfirst( str_replace( array(".php","-","_"), array(""," "," ") ,$crumb) );
			$sep     =  $i==$nm?'':$sep;
			$site   .=  '/'.$crumb;
			$bc     .=  '<span typeof="v:Breadcrumb"><a href="'.$site.'" rel="v:url" property="v:title">'.$link.'</a>'.$sep.'</span>';
			$i++;
		}
		
		$bc .=  '</div>';
		return $bc;
	}
?>