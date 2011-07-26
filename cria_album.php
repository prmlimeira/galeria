<?php

 $nome_do_album = $_POST["NOME"];
 $comentario = $_POST["COMENTARIO"];

 if($nome_do_album == "" or $nome_do_album == NULL){
   print "<script>window.alert('nome do album invalido');window.history.back();</script>";
   die();
 }

 if(!is_dir("imagens/$nome_do_album")){
   mkdir("imagens/$nome_do_album",0777);
   print "<script>window.alert('Album criado com sucesso!');window.close();</script>";
 }
 else{
   print "<script>window.alert('Album ja existe.');</script>";
 }
 

?>
