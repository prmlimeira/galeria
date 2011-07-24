<?php

  $nome_arquivo=$_FILES["ARQUIVO"]["tmp_name"];
  $nome_real_arquivo=$_FILES["ARQUIVO"]["name"];
  $tipo_arquivo=$_FILES["ARQUIVO"]["type"];
  $tamanho_arquivo=$_FILES["ARQUIVO"]["size"] / 1024; //Tamnho em Kb 
  $album_da_foto=$_POST["ALBUM"]; 

  $caminho="imagens/";

  //Verificacoes de seguranca
  if(!(stristr($tipo_arquivo, 'image'))  or $tamanho_arquivo >= 10000 or $tamanho_arquivo <= 1 or $album_da_foto == ""){
    echo "<script>alert('Arquivo invalido'); window.history.back()</script>";
    die(); 
  }

  if(move_uploaded_file($nome_arquivo, $caminho.$nome_real_arquivo)){
    echo "<script>alert('Imagem armazenada com sucesso'); window.history.back()</script>";
  }else{
    echo "<script>alert('Erro ao enviar arquivo'); window.history.back()</script>";
  }
?>
