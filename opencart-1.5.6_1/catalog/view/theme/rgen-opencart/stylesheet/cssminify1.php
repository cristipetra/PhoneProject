<?php 
header('Content-type: text/css; charset: UTF-8');
function RGen_compress_function($RGen_compress) {
$RGen_compress = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $RGen_compress);
$RGen_compress = str_replace(': ', ':', $RGen_compress);
$RGen_compress = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $RGen_compress);
return $RGen_compress;
}
ob_start("RGen_compress_function");
$offset = 60 * 60 ;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);

if (isset($_GET['files'])){
	$files = explode(',', $_GET['files']);
	foreach ($files as $file)
	{
		# BEWARE!
		# What happens if the file is ../../../../../../../../etc/passwd?
		$file = str_replace('..', '', ltrim($file, '/'));
		include($file);
	}
}

ob_end_flush();
?>