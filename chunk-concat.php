<?php

function pr($arr) {
  print "<pre>";
  print_r($arr);
  print "</pre>";
}

// get variables
$fileId = $_GET['dzuuid'];
$chunkTotal = $_GET['dztotalchunkcount'];

// file path variables
$ds = DIRECTORY_SEPARATOR;
$targetPath = dirname( __FILE__ ) . "{$ds}uploads{$ds}";
$fileType = $_GET['fileName'];
$fileOrigName = $_GET['dzorizName'];
$pathInforFileName = pathinfo($fileOrigName);


$targetFileName = $pathInforFileName['filename'] . '-' . date("H-i-s") . '.' . $pathInforFileName['extension'];


$returnResponse = function ($info = null, $filelink = null, $status = "error") {
  die (json_encode( array(
    "status" => $status,
    "info" => $info,
    "file_link" => $filelink
  )));
};


// loop through temp files and grab the content
for ($i = 1; $i <= $chunkTotal; $i++) {

  // target temp file
  $temp_file_path = realpath("{$targetPath}{$fileId}-{$i}.{$fileType}") or $returnResponse("Your chunk was lost mid-upload.");
  
  // copy chunk
  $chunk = file_get_contents($temp_file_path);
  if ( empty($chunk) ) $returnResponse("Chunks are uploading as empty strings.");

  // add chunk to main file
  file_put_contents("{$targetPath}{$targetFileName}", $chunk, FILE_APPEND | LOCK_EX);

  // delete chunk
  unlink($temp_file_path);
  if ( file_exists($temp_file_path) ) $returnResponse("Your temp files could not be deleted.");

}