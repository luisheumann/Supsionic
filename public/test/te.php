<?php




include_once('tbszip.php');

$zip = new clsTbsZip();


$archivo = $_GET['archivo'];
$sustitucion = $_GET['sustitucion'];
$palabra = $_GET['palabra'];
$link = $_GET['link'];



$sustitucion = "<a>google</a> ";


$zip->Open($archivo);
$content = $zip->FileRead('word/document.xml');
$p = strpos($content, $palabra);

$cuenta  = strlen($palabra);
$cuenta = $cuenta + 1;


if ($p===false) exit("Tag </w:body> not found in document.");

$content = substr_replace($content, '<w:p><w:r><w:t>'.$sustitucion.'</w:t></w:r></w:p>', $p, $cuenta);

$zip->FileReplace('word/document.xml', $content, TBSZIP_STRING);

$zip->Flush(TBSZIP_FILE, $link.'.docx');

?>

