<?php 


function pl ($link = '') {
	if(config('yorke.prefix') != '') return '/'.config('yorke.prefix').$link;
	else return $link;
	
}

function httpLinkBuilder($string) {
	if(strpos($string, "http://") !== false || strpos($string, "https://" !== false)) return $string;
	else return "http://".$string;
}
function rdph ($string) {
	$prefix = '';
	if(config('yorke.prefix') !=  '') {
		$prefix = '/'.config('yorke.prefix');
	}
	return redirect($prefix.$string);
}