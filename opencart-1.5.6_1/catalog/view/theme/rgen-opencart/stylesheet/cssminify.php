<?php 
header('Content-type: text/css; charset: UTF-8');
function RGen_compress_fun($RGen_compress) {
$RGen_compress = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $RGen_compress);
$RGen_compress = str_replace(': ', ':', $RGen_compress);
$RGen_compress = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $RGen_compress);
return $RGen_compress;
}
ob_start("RGen_compress_fun");
$offset = 60 * 60 ;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);
?>