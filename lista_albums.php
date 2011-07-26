<?php


    $dir    = 'imagens';
    $saida  = "";
    $albums = array_slice(scandir($dir), 2);
    $ativa  = $_GET["listar"];
    
    if($ativa == 1){  
      $saida = implode(",",$albums);
      print $saida;
    }
?>
